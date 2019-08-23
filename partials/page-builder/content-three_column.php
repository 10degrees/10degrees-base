<div 
    class="page-builder__item three_column <?php the_sub_field('additional_classes');?>" 
    style="background-color: <?php the_sub_field('background_colour');?>; color: <?php the_sub_field('text_colour');?>">

    <div class="container">
        <div class="row">
            <?php if(get_sub_field('wysiwyg_editor')) : ?>
                <div class="col-md-4">
                    <?php the_sub_field('wysiwyg_editor'); ?>
                </div>
            <?php endif; ?>
            <?php if(get_sub_field('wysiwyg_editor_two')) : ?>
                <div class="col-md-4">
                    <?php the_sub_field('wysiwyg_editor_two'); ?>
                </div>
            <?php endif; ?>            
            <?php if(get_sub_field('wysiwyg_editor_three')) : ?>
                <div class="col-md-4">
                    <?php the_sub_field('wysiwyg_editor_three'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>