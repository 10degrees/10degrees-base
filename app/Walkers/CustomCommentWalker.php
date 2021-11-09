<?php

namespace App\Walkers;

/**
 * Comment walker
 *
 * @category Theme
 * @package  TenDegrees/10degrees-base
 * @author   10 Degrees <wordpress@10degrees.uk>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html GPL-2.0+
 * @link     https://github.com/10degrees/10degrees-base
 * @see      https://codex.wordpress.org/Function_Reference/Walker_Comment
 * @since    2.0.0
 */
class CustomCommentWalker extends \Walker_Comment
{
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
        $GLOBALS['comment_depth'] = $depth + 1; ?>
            <ul <?php comment_class('media list-unstyled comment-' . get_comment_ID()); ?>>
        <?php
    }

     /**
      * Ends the list of after the elements are added.
      *
      * @param string   $output Passed by reference. Used to append additional content.
      * @param int      $depth  Depth of menu item. Used for padding.
      * @param stdClass $args   An object of wp_nav_menu() arguments.
      *
      * @since 3.0.0
      * @see   Walker::end_lvl()
      *
      * @return void
      */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1;
        echo '</ul>';
    }

    /**
     * Starts the element output.
     *
     * @param string   $output  Passed by reference. Used to append additional content
     * @param WP_Post  $comment A comment
     * @param int      $depth   Depth of menu item. Used for padding.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $id      Current item ID.
     *
     * @since 3.0.0
     * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
     * @see   Walker::start_el()
     *
     * @return void
     */
    public function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0)
    {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;

        if (!empty($args['callback'])) {
            call_user_func($args['callback'], $comment, $args, $depth);
            return;
        }

        extract($args, EXTR_SKIP);
        ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media comment-' . get_comment_ID()); ?>>
        <?php include locate_template('partials/comment.php'); ?>
        <?php
    }

    /**
     * Ends the element output, if needed.
     *
     * @param string   $output  Passed by reference. Used to append additional content
     * @param WP_Post  $comment Comment
     * @param int      $depth   Depth of page. Not Used
     * @param stdClass $args    An object of wp_nav_menu() arguments
     *
     * @since 3.0.0
     * @see   Walker::end_el()
     *
     * @return void
     */
    public function end_el(&$output, $comment, $depth = 0, $args = array())
    {
        if (!empty($args['end-callback'])) {
            call_user_func($args['end-callback'], $comment, $args, $depth);
            return;
        }
        // Close ".media-body" <div> located in templates/comment.php, and then the comment's <li>
        echo "</li>\n";
    }
}
