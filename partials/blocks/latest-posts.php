<?php

if($posts->havePosts()) { ?>
    <div class="latest-posts">
        <?php while($posts->havePosts()){
            $posts->thePost(); ?>
            <div>
                <?php if(has_post_thumbnail()) {
                    the_post_thumbnail();
                } ?>
                <p><?php the_title(); ?></p>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink();?>">Read more</a>
            </div>
        <?php } ?>
    </div>
<?php }
