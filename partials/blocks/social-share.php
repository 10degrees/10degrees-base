<?php
$url = urlencode(rtrim($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], '/'));
$title = urlencode(get_the_title());
$excerpt = urlencode(get_the_excerpt());
$featured_image_url = get_the_post_thumbnail_url();//Fallback to site logo
if (!$featured_image_url && $logo = get_field('site_logo', 'option')) {
    $featured_image_url =  wp_get_attachment_image_src($logo['id']);
}

$socialNetworks = [];
if (get_field('show_facebook')) {
    $socialNetworks['facebook'] = [
        'url' =>  'https://www.facebook.com/sharer/sharer.php?u='.$url.'&t='.$title,
        'icon' => 'social-icons/facebook.svg'
    ];
}

//NB. LinkedIn share throws an error for any URL with the .local TLD
if (get_field('show_linkedin')) {
    $socialNetworks['linkedin'] = [
        'url' =>  'https://www.linkedin.com/sharing/share-offsite/?url='.$url,
        'icon' => 'social-icons/linkedin.svg'
    ];
}

if (get_field('show_twitter')) {
    $socialNetworks['twitter'] = [
        'url' =>  'http://twitter.com/share?text='.$title.'+'.$url.'&url='.$url,
        'icon' => 'social-icons/twitter.svg'
    ];
}

if (get_field('show_pinterest')) {
    $socialNetworks['pinterest'] = [
        'url' => 'http://pinterest.com/pin/create/button/?url='.$url.'&media='.$featured_image_url.'&description='.$excerpt,
        'icon' => 'social-icons/pinterest.svg'
    ];
}

if (count($socialNetworks)) :?>
<div <?php td_block_class($block, 'relative d-social-share'); ?>>

    <span class="screen-reader-text"><?php esc_html_e('Share this page', '@textdomain'); ?></span>

    <a href="#after-share-links" class="screen-reader-text screen-reader-text--display-on-focus screen-reader-text--skiplink"><?php esc_html_e('Skip sharing options', '@textdomain'); ?></a>

    <div x-data="td_social_share()" x-init="init" class="container">

        <ul class="share-links flex list-none space-x-2">

            <li x-show="shareSupported" class="webshare-list-item">
                <button @click="sharePage" class="webshare-button">
                    <?php echo td_get_svg('social-icons/share.svg'); ?>
                    <p><?php _e('Share', '@textdomain'); ?></p>
                </button>
            </li>

            <?php
            foreach ($socialNetworks as $network => $options) : ?>
                <li x-show="!shareSupported">
                    <a class="block" href="<?php echo $options['url']; ?>">
                        <?php echo td_get_svg($options['icon']); ?>
                        <span class="screen-reader-text">
                            <?php
                            _e('Share on ', '@textdomain');
                            echo ucwords($network); ?>
                        </span>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>

    </div>

    <div id="after-share-links"></div>

</div>

<?php endif; ?>