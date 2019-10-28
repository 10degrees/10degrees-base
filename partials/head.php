<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link rel="alternate" type="application/rss+xml" title="<?php esc_html_e(get_bloginfo('name')); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>
