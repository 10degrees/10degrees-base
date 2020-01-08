<div <?php td_block_class($block, 'social-share-block'); ?>>

    <span class="screen-reader-text"><?php esc_html_e('Share this page', '@textdomain'); ?></span>

    <a href="#after-share-links" class="screen-reader-text screen-reader-text--display-on-focus screen-reader-text--skiplink"><?php esc_html_e('Skip sharing options', '@textdomain'); ?></a>

    <div class="container">

        <ul class="share-links">

            <li class="webshare-list-item">
                <button class="webshare-button">
                    <?php echo td_get_svg('social-icons/share.svg'); ?>
                    <p><?php _e('Share', '@textdomain'); ?></p>
                </button>
            </li>

            <?php 
            foreach ($socialNetworks as $network => $options) : ?>
                <li>
                    <a href="<?php echo $options['url']; ?>">
                        <?php echo td_get_svg($options['icon']); ?>
                        <span class="screen-reader-text"><?php _e('Share on ', '@textdomain'); echo ucwords($network); ?></span>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>

    </div>

    <div id="after-share-links"></div>

</div>
