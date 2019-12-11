<!DOCTYPE html><html><body><div style='
    background: #f5f5f5; 
    padding: 70px 0 70px 0;
'>
    <div style='
        box-sizing: border-box;
        margin: auto;
        width: 100%; 
        max-width: 600px; 
        padding: 50px; 
        font-family: serif;
        box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important;
        background-color: #fdfdfd;
        border: 1px solid #dcdcdc;
        border-radius: 3px !important;
    '>

        <?php if ($img = get_option('woocommerce_email_header_image')) : ?>
            <div style='padding: 30px;'>
                <img style='width: 130px; margin: auto; display: block;' src='<?php echo esc_url($img); ?>' alt='<?php echo get_bloginfo('name', 'display'); ?>' />
            </div>
        <?php endif ?>

    