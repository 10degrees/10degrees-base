<?php
    $controller_id = uniqid('accordion-button-', true);
    $panel_id = uniqid('accordion-content-', true);
?>

<div <?php td_block_class($block, 'accordion'); ?>>
    <div class="container">
        <p><button class="toggle" aria-expanded="false" id="<?php echo $controller_id; ?>" aria-controls="<?php echo $panel_id; ?>"><?php the_field('heading'); ?></button></p>
        <div class="content" id="<?php echo $panel_id; ?>" aria-labelledby="<?php echo $controller_id; ?>">
            <?php the_field('content'); ?>
        </div>
    </div>
</div>