<?php
/* Template name: Biografija */
get_header();
?>

<div class="biografija">
    <div class="cont-left">
        <div class="biografija-left">
            <div class="dots-decor possition-3"></div>
            <h1>Biografija</h1>
            <?php the_field('main_biografy'); ?>
            <div class="dots-decor possition-4"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="cont-right">
        <div class="biografija-right">

            <div class="big-gallery slider-for">

            <?php

            $bio_gallery = get_field('bio_image_gallery');

            if($bio_gallery):
                foreach( $bio_gallery as $image_id ): 
            ?>

                <div class="bio-img-big">
                    <a data-fancybox="gallery" href="<?php echo get_correct_image_link_thumb($image_id, 'full'); ?>">
                        <img src="<?php echo get_correct_image_link_thumb($image_id, 'bio_page_image'); ?>" alt="">
                    </a>
                </div>

            <?php 
                endforeach;
                endif;
                wp_reset_query();
            ?>

            </div>

           <div class="small-carousel ">

                <div class="carousel-btn">  
                    <button class="prev" ><span class="prev"></span></button>
                    <button class="next"><span class="next"></span></button>
                </div>

                <div class="gallery-small slider-nav">
                

                    <?php

                    $bio_gallery = get_field('bio_image_gallery');

                    if($bio_gallery):
                        foreach( $bio_gallery as $image_id ): 
                    ?>
            
                        <div class="bio-img-small">
                            <!-- <a data-fancybox="gallery" href="<?php // echo get_correct_image_link_thumb($image_id, 'full'); ?>"> -->
                                <img src="<?php echo get_correct_image_link_thumb($image_id, 'bio_page_gallery_small'); ?>" alt="">
                            <!-- </a> -->
                        </div>
                    
                    <?php 
                        endforeach;
                        endif;
                        wp_reset_query();
                    ?>
                </div>
            </div>

            <div class="merits">
                <?php the_field('merits_text'); ?>
            </div>

            <div class="bio-notes">
                <?php if( have_rows('bio_notes') ): ?>
                    <ul>
                        <?php  while ( have_rows('bio_notes') ) : the_row(); ?>
                        <li><?php the_sub_field('note'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>


        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>