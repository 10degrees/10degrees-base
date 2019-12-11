<?php

namespace App\Walkers;

 /**
  * Cleaner walker for wp_nav_menu()
  *
  * Walker_Nav_Menu (WordPress default) example output:
  *
  * <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
  * <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></li>
  *
  * CustomMenuWalker example output:
  *   <li class="menu-home"><a href="/">Home</a></li>
  *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
  *
  * @category Theme
  * @package  TenDegrees/10degrees-base
  * @author   10 Degrees <wordpress@10degrees.uk>
  * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
  * @link     https://github.com/10degrees/10degrees-base
  * @see      https://codex.wordpress.org/Function_Reference/Walker_Comment
  * @since    2.0.0
  */
class CustomMenuWalker extends \Walker_Nav_Menu
{
    /*public function check_current($classes) {
    return preg_match('/(current[-_])|active|dropdown/', $classes);
    }*/

    /**
     * Starts the list before the elements are added.
     *
     * @param string   $output Passed by reference. Used to append additional content
     * @param int      $depth  Depth of menu item. Used for padding
     * @param stdClass $args   An object of wp_nav_menu() arguments
     *
     * @since 3.0.0
     * @see   Walker::start_lvl()
     *
     * @return void
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= "\n<ul class=\"dropdown-menu\">\n";
    }

     /**
      * Starts the element output.
      *
      * @param string   $output Passed by reference. Used to append additional content
      * @param WP_Post  $item   Menu item data object.
      * @param int      $depth  Depth of menu item. Used for padding.
      * @param stdClass $args   An object of wp_nav_menu() arguments.
      * @param int      $id     Current item ID.
      *
      * @since 3.0.0
      * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
      * @see   Walker::start_el()
      *
      * @return void
      */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);

        if ($item->is_dropdown && ($depth === 0)) {
            // $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html);
            // $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
        } elseif (stristr($item_html, 'li class="divider')) {
            $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
        } elseif (stristr($item_html, 'li class="dropdown-header')) {
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

    /**
     * //@TODO document this function
     * Undocumented function
     *
     * @param [type] $element           Comment
     * @param [type] $children_elements Comment
     * @param [type] $max_depth         Comment
     * @param int    $depth             Comment
     * @param [type] $args              Comment
     * @param [type] $output            Comment
     *
     * @return void
     */
    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

        if ($element->is_dropdown) {
            $element->classes[] = 'dropdown';
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}
