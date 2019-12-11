<?php
if (post_password_required()) {
    return;
}
?>
<section id="comments">
<?php if (have_comments()) { ?>
    <h3><?php printf(_n('One Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'jobseeker'), number_format_i18n(get_comments_number()), get_the_title()); ?></h3>

    <ol class="media-list">
        <?php wp_list_comments(array( 'walker' => new \Tend_Degrees\Lib\Walkers\CustomCommentWalker)); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { ?>
        <nav>
            <ul class="pager">
            <?php if (get_previous_comments_link()) { ?>
                <li class="previous"><?php previous_comments_link(__('&larr; Older comments', '@textdomain')); ?></li>
            <?php } ?>
            <?php if (get_next_comments_link()) { ?>
                <li class="next"><?php next_comments_link(__('Newer comments &rarr;', '@textdomain')); ?></li>
            <?php } ?>
            </ul>
        </nav>
    <?php } ?>

    <?php if (!comments_open() && ! is_page() && post_type_supports(get_post_type(), 'comments')) { ?>
        <div class="alert alert-warning">
            <?php _e('Comments are closed.', '@textdomain'); ?>
        </div>
    <?php } elseif (!comments_open() && ! is_page() && post_type_supports(get_post_type(), 'comments')) { ?>
        <div class="alert alert-warning">
            <?php _e('Comments are closed.', '@textdomain'); ?>
        </div>
    <?php } ?>
<?php } ?>
</section>
