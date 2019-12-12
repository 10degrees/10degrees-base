<?php

/**
 * Easily output the ajax url for the action input in forms
 *
 * @return string
 */
function td_form_action() {
    return admin_url('admin-ajax.php');
}

/**
 * Easily output the action and nonce field to hook into with out HandlesAjax class
 *
 * @param string $action The action in your ajax controller
 *
 * @return void
 */
function td_action($action)
{
    ?>
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <?php wp_nonce_field($action . '_nonce', $action . '_nonce', true, true); ?>

<?php }
