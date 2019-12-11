<div class="page-builder__item page-slideshow">
    <div class="page-slideshow__inner">
        <div class="container">
            <?php
            $images = get_sub_field('images');
            if ($images) : ?>
                <div class="page-slideshow__slick">
                    <?php foreach ($images as $image) : ?>
                        <div class="page-slideshow__item" style="background-image: url('<?php echo $image['sizes']['large']; ?>');">
                            <?php if ($image['caption']) {
                                echo '<p>'.$image['caption'].'</p>';
                            } ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
       </div>
    </div>
</div>
