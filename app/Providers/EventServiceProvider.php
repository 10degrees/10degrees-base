<?php

namespace App\Providers;

use App\Support\Events\EventServiceProvider as ServiceProvider;

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
    protected $actions = [
        'admin_menu' => [
            \App\Listeners\Admin\RegisterReusableBlockMenu::class,
        ],
        'after_setup_theme' => [
            \App\Listeners\RegisterMenus::class,
        ],
        'allowed_block_types_all' => [
            \App\Listeners\Admin\SetAllowedBlocks::class,
        ],
        'widgets_init' => [
            \App\Listeners\RegisterWidgets::class,
        ],
    ];

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
    protected $subscribers = [
        \App\Listeners\Admin\Login::class,
    ];
}
