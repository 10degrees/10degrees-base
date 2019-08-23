<div 
	class="page-builder__item form_embed" 
	style="background-color: <?php the_sub_field('background_colour');?>; color: <?php the_sub_field('text_colour');?>">
	<div class="container">
    
		<h2><?php the_sub_field('form_title'); ?></h2>

	    <?php if(get_sub_field('gravity_form_shortcode')) : ?>
	        
	        <div class="form_embed__inner">
				<?php echo do_shortcode(get_sub_field('gravity_form_shortcode'));?>
	        </div>

	    <?php endif; ?>

	</div>
</div>