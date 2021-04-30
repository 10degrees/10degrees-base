<?php

namespace App\Support;

use Closure;

/**
 * Pipe an object through an array of classes
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Pipeline
{
    /**
     * The object to pass through the pipeline
     *
     * @var mixed
     */
    protected $passable;

    /**
     * The metho to call on the pipes
     *
     * @var string
     */
    protected $method = 'handle';

    /**
     * The pipes to pass through
     *
     * @var array
     */
    protected $pipes = [];

    /**
     * Send an object through the pipeline
     *
     * @param mixed $passable The object to pass through
     *
     * @return self
     */
    public function send($passable): self
    {
        $this->passable = $passable;

        return $this;
    }

    /**
     * Pass the pipes through to the pipeline
     *
     * @param array $pipes The pipes to send through
     *
     * @return self
     */
    public function through(array $pipes): self
    {
        $this->pipes = $pipes;

        return $this;
    }

    /**
     * Change the method to call on each pipe
     *
     * @param string $method The method to call
     *
     * @return self
     */
    public function via(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * The closure to call once the pipes have been run
     *
     * @param \Closure $destination The destination closure
     *
     * @return mixed
     */
    public function then(Closure $destination)
    {
        $pipeline = array_reduce(
            array_reverse($this->pipes),
            $this->carry(),
            $destination
        );
        return $pipeline($this->passable);
    }

    /**
     * Resolve the pipes and pass it to the next pipe
     *
     * @return \Closure
     */
    protected function carry(): Closure
    {
        return function (Closure $stack, $pipe) {
            return function ($passable) use ($stack, $pipe) {

                if (is_callable($pipe)) {
                    return $pipe($passable, $stack);
                }
                if (!is_object($pipe)) {
                    $pipe = new $pipe;
                }
                return method_exists($pipe, $this->method)
                    ? $pipe->{$this->method}($passable, $stack)
                    : $pipe($passable, $stack);
            };
        };
    }
}
