<?php

namespace App\Support\Events;

use ReflectionFunction;
use ReflectionMethod;

class Dispatcher
{
    public function listen($action, $listener, $priority = 10)
    {
        $listener = $this->makeListener($listener);

        add_action($action, $listener, $priority, $this->getParameterCount($listener));
    }

    public function subscribe($subscriber)
    {
        (new $subscriber())->subscribe($this);
    }
    protected function makeListener($callback)
    {
        if (is_string($callback) && class_exists($callback)) {
            return [new $callback, 'handle'];
        }
        return $callback;
    }

    /**
     * Return the callable argument count.
     *
     * @param callable $listener
     *
     * @return int
     */
    protected function getParameterCount(callable $listener): int
    {
        $reflect = is_array($listener)
            ? new ReflectionMethod($listener[0], $listener[1])
            : new ReflectionFunction($listener);

        return $reflect->getNumberOfParameters();
    }
}
