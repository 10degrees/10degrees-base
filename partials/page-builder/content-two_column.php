<div 
    class="page-builder__item" 
    style="background-color: <?php the_sub_field('background_colour');?>; color: <?php the_sub_field('text_colour');?>">

    <?php 

    $column_widths = get_sub_field('column_widths');

    if( $column_widths == '25 / 75' ) {

        $class_1 = "col-md-3";
        $class_2 = "col-md-9";

    } elseif( $column_widths == '75 / 25' ) {

        $class_1 = "col-md-9";
        $class_2 = "col-md-3";

    } elseif( $column_widths == '33 / 66' ) {

        $class_1 = "col-md-4";
        $class_2 = "col-md-8";

    } elseif( $column_widths == '66 / 33' ) {

        $class_1 = "col-md-8";
        $class_2 = "col-md-4";

    } else {

        $class_1 = "col-md-6";
        $class_2 = "col-md-6";

    }

    ?>

    <div class="container">
        <div class="row">
            <?php if(get_sub_field('wysiwyg_editor')) : ?>
                <div class="<?php echo $class_1; ?>">
                    <div class="inner">
                        <?php the_sub_field('wysiwyg_editor'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(get_sub_field('wysiwyg_editor_two')) : ?>
                <div class="<?php echo $class_2; ?>">
                    <div class="inner">
                        <?php the_sub_field('wysiwyg_editor_two'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>