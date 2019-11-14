<footer class="footer -primary" role="contentinfo">
    <?php if (has_nav_menu('footer_navigation')) {
        wp_nav_menu(
            [
            'container'      => 'nav',
            'container_class'      => 'nav -footer container',
            'container_id'   => 'nav-footer',
            'theme_location' => 'footer_navigation',
            'depth' => 1
            ]
        );
    } ?>
    <div class="copyright">
        <p><?php echo '&copy;&nbsp2009 - ' . date('Y') . '&nbsp;' . get_bloginfo('name'); ?>.</p>
        <p><?php esc_html_e('WordPress by', '@textdomain'); ?>&nbsp;<a href="https://www.10degrees.uk" rel="nofollow"><?php esc_html_e('10 Degrees', '@textdomain'); ?></a></p>
    </div>
</footer>

<?php wp_footer();
