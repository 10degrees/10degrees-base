<?php

namespace App\Support\Events;

use ReflectionFunction;
use ReflectionMethod;

class Dispatcher
{
    /**
     * Listen to events.
     *
     * @param string|array $action
     * @param callable|string $listener
     * @param integer $priority
     * @return void
     */
    public function listen($action, $listener, int $priority = 10): void
    {
        $listener = $this->resolveListener($listener);
        $parameterCount = $this->getParameterCount($listener);
        
        foreach ((array) $action as $a) {
            add_action($a, $listener, $priority, $parameterCount);
        }
    }

    /**
     * Subscribe to events.
     *
     * @param object $subscriber
     * @return void
     */
    public function subscribe($subscriber)
    {
        (new $subscriber())->subscribe($this);
    }
    
    /**
     * Resolve a listener.
     *
     * @param callable|string $listener
     * @return callable
     */
    protected function resolveListener($callback)
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
     * @return integer
     */
    protected function getParameterCount(callable $listener): int
    {
        $reflect = is_array($listener)
            ? new ReflectionMethod($listener[0], $listener[1])
            : new ReflectionFunction($listener);

        return $reflect->getNumberOfParameters();
    }
}
