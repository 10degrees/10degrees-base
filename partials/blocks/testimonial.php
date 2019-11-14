<div class="testimonials">
    <div class="container">
        <?php
            $number_to_show = get_field('number_of_testimonials');
            $category = get_field('category');

            $testimonials = new WP_Query(array(
                'post_type' => 'testimonial',
                'posts_per_page' => $number_to_show
            ));

            while ($testimonials->have_posts()) {
                $testimonials->the_post();
                get_template_part('partials/content', 'testimonial');
            }

            wp_reset_postdata();
        ?>
    </div>
</div>