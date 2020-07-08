<?php
/* Template name: Naujienos */
get_header();
include('includes/page_header.php');
?>


<div class="inner-all-news">
    <div class="container">
    <?php
  
     if(!$_GET['/paged']){ 
         ?>
        <div class="head-news">
            <?php
             
            $post = array('post_type' => 'post', 'posts_per_page' => 1);
            $news = new WP_Query($post);

            if($news->have_posts()) : 
            while($news->have_posts()) : 
                $news->the_post();
                
                $date = ( new \DateTime($post->post_date))->format("Y m d");
            ?>

            <div class="single-news">
                <a href="<?php echo the_permalink(); ?>">
                    <div class="single-news_img" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'news_page_main_image'); ?>)">
                        <div class="dots-decor"></div>  
                    </div>
                </a>
                <div class="single-news_content">
                    <div class="news-date"><?php echo $date ?></div>
                    <a href="<?php echo the_permalink(); ?>">
                        <div class="news-title"><?php the_title(); ?></div>
                    </a>
                    <div class="news-content"><?php echo excerpt(32); ?></div>

                    <div class="more-news">
                        <a href="<?php echo the_permalink(); ?>" class="section-btn">Skaityti</a>
                    </div>   
                </div>
            </div>
            

            <?php
                endwhile;
                endif;
                wp_reset_query();
            ?>
        </div>
            <?php } ?>
    </div>

    <div class="all-news-cont">
            <div class="container">
            <?php
            
            
            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

            $post = array('post_type' => 'post',
                          'posts_per_page' => 6,
                          'offset' => 1,
                          'paged' => $paged
                        );
            $news = new WP_Query($post);
              
            $total = $news->post_count;
           
            if($news->have_posts()) : 
            while($news->have_posts()) : 
                $news->the_post(); 
                    
                $date = ( new \DateTime($post->post_date))->format("Y m d");
            ?>
            
  
            <div class="single-news">
                <a href="<?php echo the_permalink(); ?>">
                    <div class="single-news_img">
                        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'news_page_single_image'); ?>" alt="">
                    </div>
                </a>
                <div class="single-news_content">
                    <div class="news-date"><?php echo $date ?></div>
                    <a href="<?php echo the_permalink(); ?>">
                        <div class="news-title"><?php the_title(); ?></div>
                    </a>
                    <div class="news-content"><?php echo excerpt(22); ?></div>

                    <div class="more-news">
                        <a href="<?php echo the_permalink(); ?>" class="section-btn">Skaityti</a>
                    </div>   
                </div>
            </div>

        
            <?php
                endwhile;
            ?>

            </div>

                <div class="pagination">
                    <div class="container">
                    <?php

                    wp_reset_postdata( );
                    
                    $big = 9;99999999;
                    echo paginate_links( array(
                        // 'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'  => '?/paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total'   => $news->max_num_pages,
                        'show_all'     => true,
                        'end_size'     => 5,
                        'mid_size'     => 2,
                        'prev_next'    => True,
                        'prev_text'    => __('<span class="page-prev"></span>'),
                        'next_text'    => __('<span class="page-next"></span>'),
                        
                        
                    ) );
                    ?>
                    </div>
                </div>
            <?php
                endif;
                wp_reset_query();
            ?>
           
          
        
           
        </div>       
    
    </div>

            </div>

<?php get_footer(); ?>