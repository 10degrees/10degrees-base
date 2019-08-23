<?php

namespace App\Walkers;

/**
 * Cleaner walker for wp_nav_menu()
 *
 * Walker_Nav_Menu (WordPress default) example output:
 *   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
 *   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
 *
 * CustomMenuWalker example output:
 *   <li class="menu-home"><a href="/">Home</a></li>
 *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
 */
class CustomMenuWalker extends \Walker_Nav_Menu 
{
    /*public function check_current($classes) {
    return preg_match('/(current[-_])|active|dropdown/', $classes);
    }*/

    public function start_lvl(&$output, $depth = 0, $args = array()) 
    {
        $output .= "\n<ul class=\"dropdown-menu\">\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) 
    {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);

        if ($item->is_dropdown && ($depth === 0)) 
        {
            // $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html);
            // $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
        }
        elseif (stristr($item_html, 'li class="divider')) 
        {
            $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
        }
        elseif (stristr($item_html, 'li class="dropdown-header')) 
        {
            $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
        }

        /* add  images
        if($item->object=="subject") {
            $image = get_field('featured_image', "subject_".$item->object_id);
           // print_r($image);
            if(isset($image["sizes"]["thumbnail"])) {
                $item_html = preg_replace('/<a[^>]*>/iU', '$0<span>', $item_html); // add beginning span tag inside <a>
                $item_html = str_replace('</a>', '</span> <img src="'.$image["sizes"]["thumbnail"].'" alt=""/></a>', $item_html); // add ending span tag inside </a>
            }else{
                
                $item_html = preg_replace('/<a[^>]*>/iU', '$0<span>', $item_html); // add beginning span tag inside <a>
                $item_html = str_replace('</a>', '</span> <img src="http://placehold.it/200x120"/></a>', $item_html);
               
            }
        }
        */
       
        $item_html = apply_filters('roots/wp_nav_menu_item', $item_html);
       
        $output .= $item_html;
    }

    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) 
    {
        $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

        if ($element->is_dropdown) 
        {
            $element->classes[] = 'dropdown';
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
  
}
