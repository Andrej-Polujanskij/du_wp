<?php
/* Template name: Veikla apygardoje */
get_header();
include('includes/page_header.php');
?>


<div class="inner-page-cntr">

            <?php

                $post = array('post_type' => 'activity');
                $event = new WP_Query($post);

                if($event->have_posts()) : 
                while($event->have_posts()) : 
                $event->the_post();       
            ?>

        <div class="event-container">
            <div class="container">

            <div class="event-title">
                <h2><?php the_title(); ?></h2>
                <span><?php the_field('event_date'); ?></span>
            </div>
            <div class="event-gallery" data-post-id="<?php echo $post->ID ?>">

            <?php 
                $images = get_field('event_gallery');
           
                if( $images ): 
               
                $i = 0; ?>
                    <?php foreach( $images as $image_id ): ?>
                        <?php $i++; 
                            $show_counter = 3;

            		        if( $i > $show_counter ): 
            			    break; 
                            endif; ?>
                        <div class="activities-img alignleft ">
                            <a data-fancybox="gallery" href="<?php echo get_correct_image_link_thumb($image_id, 'full'); ?>">
                                <img src="<?php echo get_correct_image_link_thumb($image_id, 'homepage_gallery_image'); ?>" alt="">
                            </a>
                        </div>
                    <?php endforeach; ?>
                
            <?php endif; ?>
               
            </div>

           
            <div class="spinner display-none" load-data-post-id="<?php echo $post->ID ?>">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>

            <div class="on-top-bg display-none" load-data-post-id="<?php echo $post->ID ?>"></div>

        <?php if(count($images) > 3) {?>
            <div class="more-news">
                <button class="section-btn event-btn" data-post-id="<?php echo $post->ID ?>"><span></span> išskleisti daugiau</button>
            </div>   
        <?php } ?>
        
            </div>
        </div>
            <?php
                endwhile;
                endif;
                wp_reset_query();
            ?>

        
    
    
</div>


<?php get_footer(); ?>