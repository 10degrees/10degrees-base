<?php

$size = get_field('size');

$classes = ['clear-both'];

if ($size === 'medium') {
    $classes = array_merge($classes, ['h-6', 'md:h-12']);
} else if ($size === 'large') {
    $classes = array_merge($classes, ['h-12', 'md-h-24']);
} else {
    $classes = array_merge($classes, ['h-3', 'md:h-6']);
}

?>

<div <?php td_block_class($block, implode(' ', $classes)); ?>>
</div>