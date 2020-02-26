<?php

use App\Models\Testimonial;

?>

<section <?php td_block_class($block, 'testimonials'); ?>>

    <div class="container">
        <div class="grid" style="--columns: <?php echo $number_to_show; ?>;">
            <?php

            $testimonials = new Testimonial;

            if ($category = get_field('category')) {
                $testimonials->whereCategory('testimonial-categories', $category->term_id);
            }

            $testimonials->paginate(get_field('number_of_testimonials'));

            while ($testimonials->havePosts()) {
                $testimonials->thePost();

                get_template_part('partials/content', 'testimonial');
            }

            $testimonials->paginationLinks();

            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>