<?php get_header(); ?>
<div class="post-header" style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('header_image'), 'full'); ?>);">
    <div class="container">
        <div class="dots-decor possition-1"></div>
        <div class="post-title #">
            <?php $date = ( new \DateTime($post->post_date))->format("Y m d"); ?>
            <div class="post-date"><?php echo $date ?></div>
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="dots-decor possition-2"></div>
    </div>
</div>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

<div class="container flex">
    <div class="post-content_left">
        <img class="alignleft" src="<?php  echo get_the_post_thumbnail_url($post->ID, 'inner_news_image' ); ?>" alt="">

        <?php the_content(); ?>

        <div class="clear"></div>
        <?php the_field('text'); ?>
        <?php 
            $notes = get_field('notes'); 
            if($notes): 
        ?>

        <div><?php echo $notes['notes_title']; ?></div>

        <?php  $repeater = $notes['note'];
            if($repeater) { ?>
        <ul>
            <?php  foreach($repeater as $row) { 
                echo '<li>' .$row['single_note']. '</li>';
              } ?>
        </ul>

        <?php } 
         endif; ?>

            <div class="share-fb fb-share-button" data-href="https://www.your-domain.com/your-page.html" >
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
                    <div>
                        <span></span>
                    </div>
                    Dalintis
                </a>
            </div>

    </div>

    <div class="post-content_right">
        <div class="content_right-title">Tai pat skaitykite</div>

        <?php

            $post = array('post_type' => 'post', 
                          'posts_per_page' => 4,
                          'post__not_in' => array($post->ID) 
                        );
            $news = new WP_Query($post);

            if($news->have_posts()) : 
            while($news->have_posts()) : 
                $news->the_post();
                
                $date = ( new \DateTime($post->post_date))->format("Y m d");
        ?>

            <div class="single-news">
                <a href="<?php the_permalink(); ?>">
                    <div class="single-news_img" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'homepage_news_image'); ?>)"></div>
                    <div class="single-news_content">
                        <div class="news-date"><?php echo $date ?></div>
                        <div class="news-title"><?php the_title(); ?></div>
                    </div>
                </a>
            </div>

            <?php
                endwhile;
                endif;
                wp_reset_query();
            ?>

    </div>


</div>


<?php endwhile; endif; ?>

<?php get_footer(); ?>