<div <?php td_block_class($block, 'social-links-block'); ?>>

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
                $output[] = '<li><a href="' . esc_url_raw($url) . '" rel="noopener noreferrer">' . $settings['icon'] . '<span class="screen-reader-text">' . $social . '</span></a></li>';
            } elseif ($settings['key'] === 'webshare') {
                $output[] = '<li class="webshare-list-item"><button class="webshare-button" href="javascript:void(0)">' . $settings['icon'] . '<span class="screen-reader-text">' . __('Share', '@textdomain') . '</span></button></li>';
            }
        }

        if (!empty($output)) {
            echo  '<ul class="social-links">' . join(' ', $output) . '</ul>';
        }
        ?>

    </div>

    <div id="after-social-links"></div>

</div>
