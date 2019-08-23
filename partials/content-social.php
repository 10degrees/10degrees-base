<div class="social-icons">
	<?php if( get_field('twitter_link', 'option') ) { ?>
		<a target="_blank" href="<?php the_field('twitter_link', 'option'); ?>">
			<?php td_get_svg( 'twitter.svg' ); ?>
		</a>
	<?php } ?>
	<?php if( get_field('linkedin_link', 'option') ) { ?>
		<a target="_blank" href="<?php the_field('linkedin_link', 'option'); ?>">
			<?php td_get_svg( 'linkedin.svg' ); ?>
		</a>
	<?php } ?>
	<?php if( get_field('facebook_link', 'option') ) { ?>
		<a target="_blank" href="<?php the_field('facebook_link', 'option'); ?>">
			<?php td_get_svg( 'facebook.svg' ); ?>
		</a>
	<?php } ?>
	<?php if( get_field('youtube_link', 'option') ) { ?>
		<a target="_blank" href="<?php the_field('youtube_link', 'option'); ?>">
			<?php td_get_svg( 'youtube.svg' ); ?>
		</a>
	<?php } ?>
	<?php if( get_field('instagram_link', 'option') ) { ?>
		<a target="_blank" href="<?php the_field('instagram_link', 'option'); ?>">
			<?php td_get_svg( 'instagram.svg' ); ?>	
		</a>
	<?php } ?>
</div>