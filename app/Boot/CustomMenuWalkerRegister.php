<?php

namespace App\Boot;

use App\Walkers\CustomMenuWalker;

/**
 *
 *	Register the menus custom walker.
 * 
 */
class CustomMenuWalkerRegister
{
    public function __construct()
    {
		add_filter('wp_nav_menu_args', [$this, 'addMenuArgs']);
    
        add_filter('nav_menu_css_class', [$this, 'roots_nav_menu_css_class'], 10, 2);
        add_filter('nav_menu_item_id', '__return_null');
    }

    /**
     * Clean up wp_nav_menu_args
     *
     * Remove the container
     * Use CustomMenuWalker() by default
     */
    public function addMenuArgs($args = '') 
    {
		$roots_nav_menu_args['container'] = false;

		if (!$args['items_wrap']) 
		{
			$roots_nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
		}

		if (!$args['depth']) 
		{
			$roots_nav_menu_args['depth'] = 2;
		}

		if (!$args['walker']) 
		{
			$roots_nav_menu_args['walker'] = new CustomMenuWalker();
		}

		return array_merge($args, $roots_nav_menu_args);
    }

    /**
    * Remove the id="" on nav menu items
    * Return 'menu-slug' for nav menu classes
    */
    public function roots_nav_menu_css_class($classes, $item) 
    {
        $slug = sanitize_title($item->title);

        /*$classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
        $classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);
        */
       
        $classes[] = 'menu-' . $slug;

        $classes = array_unique($classes);

        return array_filter($classes, 'is_element_empty');
    }
}