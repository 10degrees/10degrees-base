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
     * The actions to "listen" to.
     *
     * @var array
     */
    protected $actions = [];

    /**
     * The filters to "listen" to. Filters and actions use the same API under
     * the hood so they are seperated purely for readablilty.
     *
     * @var array
     */
    protected $filters = [];

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
        foreach ($this->actions as $action => $listeners) {
            foreach ($listeners as $listener) {
                Event::listen($action, $listener, $listener::$priority ?? 10);
            }
        }
        foreach ($this->filters as $filter => $listeners) {
            foreach ($listeners as $listener) {
                Event::listen($filter, $listener, $listener::$priority ?? 10);
            }
        }
        foreach ($this->subscribers as $subscriber) {
            Event::subscribe($subscriber);
        }
    }
}
