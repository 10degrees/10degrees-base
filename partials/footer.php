<footer class="footer -primary bg-grey-200 py-6" role="contentinfo">
    <?php if (has_nav_menu('footer_navigation')) {
        wp_nav_menu(
            [
                'container'      => 'nav',
                'container_class'      => 'container mb-6',
                'container_id'   => 'nav-footer',
                'theme_location' => 'footer_navigation',
                'depth' => 1
            ]
        );
    } ?>
    <div id="footer" class="copyright md:flex md:justify-between md:items-end">
        <div class="mb-1 md:mb-0">
            <p class="mb-0"><?php echo '&copy;&nbsp;2009 - ' . date('Y') . '&nbsp;' . get_bloginfo('name'); ?>.</p>
            <?php the_privacy_policy_link(); ?>
        </div>
        <p class="mb-0"><?php esc_html_e('WordPress by', '@textdomain'); ?>&nbsp;<a href="https://www.10degrees.uk" rel="nofollow"><?php esc_html_e('10 Degrees', '@textdomain'); ?></a></p>
    </div>
</footer>

<?php wp_footer();
