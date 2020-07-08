<?php
/* Template name: Programa */
get_header();
include('includes/page_header.php');
?>

    <?php
        if( have_rows('programa_content') ):

            while ( have_rows('programa_content') ) : the_row();
            
                if( get_row_layout() == 'short_description' ):

                    if( have_rows('short_content') ):

                        while ( have_rows('short_content') ) : the_row();
    ?>

    <div class="single-short-content">

        <div class="container">
            <div class="short-content">
                <ul>
                    <li>
                        <div class="dot">
                            <div class="inner-dot"></div>
                        </div>    

                        <div class="short-content-title"><?php the_sub_field('short_content_title'); ?></div>

                        <div class="short-content-description">
                            <ul>
                                <?php
                                if( have_rows('short_content_description') ):

                                    while ( have_rows('short_content_description') ) : the_row();
                                ?>
                                <li>
                                    <?php the_sub_field('description_field_text'); ?>
                                </li>
                      
                                <?php
                                        endwhile;
                                    
                                    endif;
                                
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
                    <?php
                            endwhile;
                        
                        endif;
                    
                    ?>

<?php 

            elseif( get_row_layout() == 'big_content' ):
                $file = get_sub_field('big_content_title');
                
?>
  <div class="container">
    <div class="big-content">
        <div class="big-content-title"><?php the_sub_field('big_content_title'); ?></div>
        <div class="big-content-descroption"><?php the_sub_field('big_content_description'); ?></div>
    </div>
  </div>
<?php
            endif;

        endwhile;

    endif;

?>
</div>

<?php get_footer(); ?>