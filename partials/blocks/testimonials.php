<section class="testimonials">
    <div class="container">
        <?php
        $number_to_show = get_field('number_of_testimonials');
        $category = get_field('category');
        ?>
        <div class="grid" style="--columns: <?php echo $number_to_show; ?>;">
            <?php

            $tax_query = array();
            if ($category) {
                $tax_query = array(
                    array(
                        'taxonomy' => 'testimonial-categories',
                        'field' => 'slug',
                        'terms' => $category->slug
                    )
                );
            }

            $testimonials = new WP_Query(array(
                'post_type' => 'testimonial',
                'posts_per_page' => $number_to_show,
                'tax_query' => $tax_query
            ));

            while ($testimonials->have_posts()) {
                $testimonials->the_post();
                get_template_part('partials/content', 'testimonial');
            }

            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>