<?php
//phpcs:ignore
// only add the page builder if ACF is enabled 

require_once ABSPATH.'wp-admin/includes/plugin.php';

if (is_plugin_active('advanced-custom-fields-pro/acf.php')) {
    if (have_rows('page_builder')) : ?>
        <div class="page-builder">
            <?php while (have_rows('page_builder')) :
                the_row();
                get_template_part('partials/page-builder/content', get_row_layout());
            endwhile; ?>
        </div>
        <?php
    endif; // end of if content_row ?>
<?php } // end "is ACF enabled?"
