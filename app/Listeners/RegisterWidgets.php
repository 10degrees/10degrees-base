<?php

namespace App\Listeners;

/**
 * Handle the event listener
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class RegisterWidgets
{
    /**
     * The event priority
     *
     * @var integer
     */
    public static $priority = 10;

    /**
     * The Widgets to register with the theme
     *
     * Example:
     *
     * 'widget-id' => 'Widget name'
     *
     * @var array
     */
    protected $widgets = [
        // 'blog-sidebar' => 'Blog sidebar',
    ];

    /**
     * Handle an event
     *
     * @return void
     */
    public function handle(): void
    {
        foreach ($this->widgets as $key => $label) {
            register_sidebar(
                [
                    'name'          => __($label, '@textdomain'),
                    'id'            => $key,
                    'before_widget' => '<section class="widget %1$s %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h3>',
                    'after_title'   => '</h3>',
                ]
            );
        }
    }
}
