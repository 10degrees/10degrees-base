<?php

namespace App\Boot;

use App\Walkers\CustomMenuWalker;

/**
 * Register the menus custom walker.
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @since    2.0.0
 */
class CustomMenuWalkerRegister
{
    /**
     * Constrctor
     */
    public function __construct()
    {
        add_filter('wp_nav_menu_args', [$this, 'addMenuArgs']);
        add_filter('nav_menu_css_class', [$this, 'rootsNavMenuCssClass'], 10, 2);
        add_filter('nav_menu_item_id', '__return_null');
    }

    /**
     * Clean up wp_nav_menu_args
     *
     * @param array $args Menu args
     *
     * @return array $menu_args
     */
    public function addMenuArgs($args = '')
    {
        //@TODO * Remove the container
        //@TODO Use CustomMenuWalker() by default
        //$roots_nav_menu_args['container'] = false;

        if (!$args['items_wrap']) {
            $roots_nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
        }

        if (!$args['depth']) {
            $roots_nav_menu_args['depth'] = 2;
        }

        if (!$args['walker']) {
            $roots_nav_menu_args['walker'] = new CustomMenuWalker();
        }

        return array_merge($args, $roots_nav_menu_args);
    }

    /**
     * Filter menu CSS classes
     *
     * @param array $classes Array of menu classes
     * @param mixed $item    @TODO add correct info
     *
     * @return array $new_classes Filtered menu classes
     */
    public function rootsNavMenuCssClass($classes, $item)
    {
        //@TODO Remove the id="" on nav menu items
        //@TODO Return 'menu-slug' for nav menu classes
    
        $slug = sanitize_title($item->title);
        /*$classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
        $classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);
        */
        $classes[] = 'menu-' . $slug;
        $classes = array_unique($classes);
        return array_filter($classes, 'is_element_empty');
    }
}
