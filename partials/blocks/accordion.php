<?php
$toggle_id = uniqid('accordion-toggle-');
$content_id = uniqid('accordion-content-');

$heading = get_field('heading');

if (!$heading) { 
    if (is_admin()) { ?>
        <p><?php _e('Heading is required. Nothing will be shown on the frontend.', '@textdomain'); ?></p>
    <?php }
    return;
} ?>

<div
    x-data="{open : false}"
    :class="{'-open' : open}"
    <?php td_block_class($block, 'td-accordion'); ?>>
    <div class="container">
        <p>
            <button
                @click="open = !open"
                :aria-expanded="open.toString()"
                class="w-full text-left py-3 px-5 bg-red text-white flex items-center justify-between cursor-pointer"
                id="<?php echo $toggle_id; ?>"
                aria-controls="<?php echo $content_id; ?>">
                <?php esc_html_e($heading); ?>

                <span
                    class="toggle p-1 inline-block border-solid border-white border-r-2 border-b-2 ml-5 transform rotate-45 transition-transform"
                    :class="{'rotate-225': open}"></span>
            </button>
        </p>
        <?php if ($content = get_field('content')): ?>
            <div
                x-show="open"
                class="px-5"
                id="<?php echo $content_id; ?>"
                aria-labelledby="<?php echo $toggle_id; ?>">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>
    </div>
</div>