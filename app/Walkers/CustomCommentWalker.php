<?php

namespace App\Walkers;

/**
 * Use Bootstrap's media object for listing comments
 *
 * @link http://getbootstrap.com/components/#media
 */
class CustomCommentWalker extends \Walker_Comment {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1; ?>
			<ul <?php comment_class( 'media list-unstyled comment-' . get_comment_ID() ); ?>>
	<?php
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$GLOBALS['comment_depth'] = $depth + 1;
		echo '</ul>';
	}

	public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;

		if ( ! empty( $args['callback'] ) ) {
			call_user_func( $args['callback'], $comment, $args, $depth );
			return;
		}

		extract( $args, EXTR_SKIP );
	?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media comment-' . get_comment_ID() ); ?>>
	<?php include( locate_template( 'partials/comment.php' ) ); ?>
	<?php
	}

	public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
		if ( ! empty( $args['end-callback'] ) ) {
			call_user_func( $args['end-callback'], $comment, $args, $depth );
			return;
		}
		// Close ".media-body" <div> located in templates/comment.php, and then the comment's <li>
		echo "</div></li>\n";
	}
}