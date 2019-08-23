<div class="social-icons">
	<a href="javascript:void(0)">Share</a>
	<a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
    '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
		<?php td_get_svg( 'twitter.svg' ); ?>
	</a>
	<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
	'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
		<?php td_get_svg( 'linkedin.svg' ); ?>
	</a>
	<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
		<?php td_get_svg( 'facebook.svg' ); ?>
	</a>
</div>