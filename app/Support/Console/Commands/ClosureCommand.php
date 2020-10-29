<?php

namespace App\Support\Console\Commands;

use App\Support\Console\Command;
use Closure;
use ReflectionFunction;

class ClosureCommand extends Command
{
    /**
     * The command callback
     *
     * @var \Closure
     */
    protected $callback;

    /**
     * Construct the command instance
     *
     * @param string   $signature
     * @param \Closure $callback
     *
     * @return void
     */
    public function __construct(string $signature, Closure $callback)
    {
        $this->signature = $signature;
        $this->callback = $callback;

        parent::__construct();
    }

    /**
     * Handle the command call.
     *
     * @return void
     */
    protected function handle(): void
    {
        $inputs = array_merge($this->arguments(), $this->options());

        $parameters = [];

        foreach ((new ReflectionFunction($this->callback))->getParameters() as $parameter) {
            if (isset($inputs[$parameter->getName()])) {
                $parameters[$parameter->getName()] = $inputs[$parameter->getName()];
            }
        }

        $callback = $this->callback->bindTo($this, $this);

        call_user_func_array($callback, $parameters);
    }
}
