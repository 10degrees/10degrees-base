<div <?php td_block_class($block, 'relative td-social-links'); ?>>

    <span class="screen-reader-text"><?php esc_html_e('Find us on social media', '@textdomain'); ?></span>

    <a href="#after-social-links" class="screen-reader-text screen-reader-text--display-on-focus screen-reader-text--skiplink"><?php esc_html_e('Skip social media links', '@textdomain'); ?></a>

    <div class="container">

        <?php
        $output = array();
        
        foreach ($options as $social => $settings) {
            $url = !empty($seo_data[$settings['key']]) ? $seo_data[$settings['key']] : false;
            if (!empty($url) && !empty($settings['prepend'])) {
                $url = $settings['prepend'] . $url;
            }
            if ($url && !empty($settings['icon'])) {
                $output[] = '<li class="text-center leading-none"><a href="' . esc_url_raw($url) . '"  target="_blank" rel="noopener noreferrer">' . $settings['icon'] . '<span class="screen-reader-text">' . $social . '</span></a></li>';
            }
        }

        if (!empty($output)) { ?>
            <ul class="social-links list-none flex space-x-2">
                <?php echo join(' ', $output); ?>
            </ul>
        <?php } elseif (is_admin()) {
            //Prompt user to add links if none supplied ?>
            <a class="block" href="/wp-admin/admin.php?page=wpseo_social" target="__blank"> <?php __('Please add your social media links (opens in new tab)', '@textdomain') ?></a>
        <?php } ?>

    </div>

    <div id="after-social-links"></div>

</div>
