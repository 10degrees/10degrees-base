<div class="page-builder__item">
	<div class="container">
		<div class="page-slideshow__slick">

			<?php 
			$number_of_posts = get_sub_field('max_number_of_testimonials_to_show');
			$tax = get_sub_field('choose_which_category_you_would_like_to_display');
			
			td_post_loop(
				'testimonials', 
				$number_of_posts, 
				'partials/content-testimonial',
				array(
					'taxonomy_slug' => 'testimonial-categories',
					'term_slug' => $tax->slug,
				)
			); ?>

		</div>
	</div>
</div>