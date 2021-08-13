<div x-cloak x-data="td_ie_modal()" x-init="init" x-show="showModal" class="modal-overlay">
    <div class="modal">
        <h1><?php _e('IE Support', '@textdomain'); ?></h1>
        <p><?php _e("This site doesn't support Internet Explorer, so some pages might not look correct and some functionality might not work as expected.", '@textdomain'); ?></p>

        <div class="modal-footer">
            <button @click.prevent="showModal = false" class="td-button confirm"><?php _e('Understood, please continue', '@textdomain'); ?></button>
        </div>
    </div>
</div>