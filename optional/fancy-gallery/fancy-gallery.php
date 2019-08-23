<div class="page__builder__container fancy_gallery">

    <?php 
    $images = get_sub_field('images');

    if( $images ): ?>

        <div class="gallery-container js-thumbnails--active">
            <div class="gallery-slider">
                <ul class="slides">
                    <?php foreach($images as $img) {
                        echo "<li class='slide img' style='background-image: url(".$img["url"].");'>";

                        if ($img["caption"]) {
                            echo "<div class='gallery-caption'>".$img["caption"]."</div>";
                        }

                        echo "</li>";
                    } ?>
                </ul>
                <div class="gallery-thumbnails">
                    <a href="javascript:void(0)" id="scroll-thumbs-left"></a>
                    <div class="gallery-thumbnails__inner">
                        <div class="gallery-thumbnails__inner__overflow">
                            <?php foreach($images as $img) {
                                echo "<div class='thumb' style='background-image: url(".$img["sizes"]["thumbnail"].");'></div>";
                            } ?>
                        </div>
                    </div>
                    <a href="javascript:void(0)" id="scroll-thumbs-right"></a>
                </div>
                <div class="gallery-fullscreen">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                    <g>
                        <defs>
                            <rect id="SVGID_1_" width="40" height="40"/>
                        </defs>
                        <clipPath id="SVGID_2_">
                            <use xlink:href="#SVGID_1_"  overflow="visible"/>
                        </clipPath>
                        <polyline clip-path="url(#SVGID_2_)" fill="none" stroke="#ffffff" stroke-width="4" stroke-miterlimit="10" points="38,14 38,2 
                            26,2    "/>
                        
                            <line clip-path="url(#SVGID_2_)" fill="none" stroke="#ffffff" stroke-width="4" stroke-miterlimit="10" x1="24" y1="16" x2="37" y2="3"/>
                        <polyline clip-path="url(#SVGID_2_)" fill="none" stroke="#ffffff" stroke-width="4" stroke-miterlimit="10" points="2,27 2,38 
                            14,38   "/>
                        
                            <line clip-path="url(#SVGID_2_)" fill="none" stroke="#ffffff" stroke-width="4" stroke-miterlimit="10" x1="16" y1="24" x2="3" y2="37"/>
                        <polyline clip-path="url(#SVGID_2_)" fill="none" stroke="#ffffff" stroke-width="4" stroke-miterlimit="10" points="27,38 38,38 
                            38,26   "/>
                        
                            <line clip-path="url(#SVGID_2_)" fill="none" stroke="#ffffff" stroke-width="4" stroke-miterlimit="10" x1="24" y1="24" x2="37" y2="37"/>
                        <polyline clip-path="url(#SVGID_2_)" fill="none" stroke="#ffffff" stroke-width="4" stroke-miterlimit="10" points="13,2 2,2 
                            2,14    "/>
                        
                            <line clip-path="url(#SVGID_2_)" fill="none" stroke="#ffffff" stroke-width="4" stroke-miterlimit="10" x1="16" y1="16" x2="3" y2="3"/>
                    </g>
                    </svg>
                </div>
                <div class="gallery-thumbs">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="40px" height="30px" viewBox="0 0 40 30" enable-background="new 0 0 40 30" xml:space="preserve">
                    <rect fill="#ffffff" width="18" height="13"/>
                    <rect x="22" fill="#ffffff" width="18" height="13"/>
                    <rect y="17" fill="#ffffff" width="18" height="13"/>
                    <rect x="22" y="17" fill="#ffffff" width="18" height="13"/>
                    </svg>
                </div>
            </div>
        </div>
         
    <?php endif; ?>

</div>   