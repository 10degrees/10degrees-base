<?php 

$link = get_field('link');
$style = get_field('style');
$colour = get_field('colour');
$alignment = get_field('alignment');

if (!$link) {
    if (is_admin()) { ?>
        <p><?php _e('Please provide a link for the button to go to.', '@textdomain'); ?></p>
    <?php }
    return;
}

[$url, $title, $target] = td_get_link_attributes($link);

$buttonClasses = ['td-button', "is-style-{$style}", "has-{$colour}-button-color"];
?>

<div <?php td_block_class($block, "has-text-align-{$alignment}"); ?>>
    <a class="<?php echo implode(' ', $buttonClasses); ?>" href="<?php echo esc_url($url); ?>" target="<?php esc_attr_e($target); ?>"><?php esc_html_e($title); ?></a>
</div>
