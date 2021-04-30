<?php

namespace App\Support\Events;

use App\Support\Events\Dispatcher;

/**
 * The event static service provider
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class Event
{
    /**
     * The event dispatcher
     *
     * @var \App\Support\Events\Dispatcher
     */
    protected static $dispatcher = null;

    /**
     * Pass static calls to the event dispatcher
     *
     * @param string $method    The method
     * @param array  $arguments The arguments
     *
     * @return mixed
     */
    public static function __callStatic(string $method, array $arguments)
    {
        if (is_null(static::$dispatcher)) {
            static::$dispatcher = new Dispatcher;
        }
        return static::$dispatcher->$method(...$arguments);
    }
}
