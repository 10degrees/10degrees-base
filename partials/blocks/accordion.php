<?php
$toggle_id = uniqid('accordion-toggle-');
$content_id = uniqid('accordion-content-');
?>

<div <?php td_block_class($block, 'accordion'); ?>>
    <div class="container">
        <p><button class="toggle" aria-expanded="false" id="<?php echo $toggle_id; ?>" aria-controls="<?php echo $content_id; ?>"><?php the_field('heading'); ?></button></p>
        <div class="content" id="<?php echo $content_id; ?>" aria-labelledby="<?php echo $toggle_id; ?>">
            <?php the_field('content'); ?>
        </div>
    </div>
</div>