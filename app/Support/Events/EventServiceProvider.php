<?php

namespace App\Support\Events;

use App\Support\Events\Event;
use App\Support\ServiceProvider;

/**
 * Register the event listeners
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The events to "listen" to.
     *
     * @var array
     */
    protected $listeners = [];

    /**
     * The subscribers. These are passed the event dispatcher instance.
     *
     * @var array
     */
    protected $subscribers = [];

    /**
     * Apply the event listeners
     *
     * @return void
     */
    public function call()
    {
        foreach ($this->listeners as $event => $listeners) {
            foreach ($listeners as $listener) {
                if (is_string($listener) && class_exists($listener)) {
                    $priority = $listener::$priority ?? 10;
                } else {
                    $priority = 10;
                }

                Event::listen($event, $listener, $priority);
            }
        }

        foreach ($this->subscribers as $subscriber) {
            Event::subscribe($subscriber);
        }
    }
}
