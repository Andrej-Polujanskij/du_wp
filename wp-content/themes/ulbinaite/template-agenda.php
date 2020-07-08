<?php
/* Template name: Darbotvarkė */
get_header();
include('includes/page_header.php');
?>


<div class="agenda-page-cntr">
    <div class="container">
        <div class="timeline">

            <div class="agenda-filter">
               
                <form action="<?php echo get_all_agenda_url(); ?>" method="get" id="filter-form">
             
                    <select class="filter"  name="filter"  id="filter" >
                        <option></option>
                        
                        <?php
                             $parents = get_terms([
                                'taxonomy' => 'agenda_months',
                                'hide_empty' => true,
                                'parent' => 0
                            ]);
                            
                            foreach($parents as $parent){


                              $terms = get_terms([
                                'taxonomy' => 'agenda_months',
                                'hide_empty' => true,
                                'parent' => $parent->term_id
                            ]);
                           ?>
                           <option disabled value="<?php echo $parent->name; ?>"><?php echo $parent->name; ?></option>
                           <?php
                     
                            foreach( array_reverse($terms) as $term) {
                                if($term->parent){
                            
                                
                        ?>
                        
                        <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>


                        <?php }
                            }
                          }
                        ?>
                    </select>
                </form>
            </div>
           

            <div class="timeline-cntr">

            <?php
           

            if(!$_GET['filter']){

            $parents = get_terms([
                'taxonomy' => 'agenda_months',
                'hide_empty' => true,
                'parent' => 0
            ]);
            
            foreach($parents as $parent){
         

                    $terms = get_terms([
                        'taxonomy' => 'agenda_months',
                        'hide_empty' => true,
                        'parent' => $parent->term_id
                    ]);

                
                ?>

                <div class="timeline-years">
                   <h2><?php echo $parent->name; ?></h2>
                </div>

                <?php
                
                foreach(array_reverse($terms)  as $term ) {
                    if($term->parent){
                    
            ?>

                <div class="timeline-title">
                    <h2><?php echo $term->name; ?></h2>
                </div>

                <ul>

                    <?php

                        $post = array('post_type' => 'agenda',
                                      'tax_query' => array(
                                          array(
                                            'taxonomy' => 'agenda_months',
                                            'field'    => 'term_id',
                                            'terms'    => $term->term_id
                                            
                                          )
                                      )
                                    );
                                    
                        
                        $works = new WP_Query($post);

                        if($works->have_posts()) : 
                        while($works->have_posts()) : 
                        $works->the_post();
                        
                    ?>
                        <li id="<?php echo $post->ID ?>">
                            <div class="dot">
                                <div class="inner-dot"></div>
                            </div>
                            <div class="work-title"><?php the_title() ?></div>
                         

                            <div class="work-description short-descr" agenda-post-id="<?php echo $post->ID ?>"><?php echo wp_trim_words(get_field('work_description'), 10) ; ?></div>

                            <div class="work-description full-descr display-none" agenda-post-id="<?php echo $post->ID ?>"><?php the_field('work_description'); ?></div>
                    
                            
                            <div class="work-date"><?php the_field('work_date'); ?> <span><?php the_field('work_time'); ?></span></div>
                            
                            <?php
                        
                         if(!empty(get_field('work_description'))) { 
                             ?>

                            <div class="work-btn open-descr" agenda-post-id="<?php echo $post->ID ?>">
                                <span></span>
                            </div>

                            <div class="work-btn open-descr close-descr display-none" agenda-post-id="<?php echo $post->ID ?>">
                                <span></span>
                            </div>

                            <div class="more-news" agenda-post-id="<?php echo $post->ID ?>">
                                <a class="section-btn open-descr" agenda-post-id="<?php echo $post->ID ?>">Skaityti daugiau </a>
                            </div> 
                            <div class="more-news display-none" agenda-post-id="<?php echo $post->ID ?>">
                                <a class="section-btn open-descr" agenda-post-id="<?php echo $post->ID ?>">Suskleisti</a>
                            </div> 
                        <?php }  ?>

                        
                        </li>

                    <?php
                        endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                </ul>

                <?php 
                    }
                    }
                }
            }else{
                $filterValue = get_term_by('id', $_GET['filter'], 'agenda_months');

                $filterParent = get_term_by('id', $filterValue->parent, 'agenda_months')
                ?>
                <div class="timeline-years">
                   <h2><?php echo $filterParent->name; ?></h2>
                </div>
                 <div class="timeline-title">
                    <h2><?php echo $filterValue->name; ?></h2>
                </div>

                <ul>

                    <?php

                        $post = array('post_type' => 'agenda',
                                      'tax_query' => array(
                                          array(
                                            'taxonomy' => 'agenda_months',
                                            'field'    => 'term_id',
                                            'terms'    => $_GET['filter']
                                            
                                          )
                                      )
                                    );
                                    
                        
                        $works = new WP_Query($post);

                        if($works->have_posts()) : 
                        while($works->have_posts()) : 
                        $works->the_post();
                        
                        
                    ?>
                        <li id="<?php echo $post->ID ?>">
                            <div class="dot">
                                <div class="inner-dot"></div>
                            </div>
                            <div class="work-title"><?php the_title() ?></div>

                            <div class="work-description short-descr" agenda-post-id="<?php echo $post->ID ?>"><?php echo wp_trim_words(get_field('work_description'), 10) ; ?></div>

                            <div class="work-description full-descr display-none" agenda-post-id="<?php echo $post->ID ?>"><?php the_field('work_description'); ?></div>
                            
                            <div class="work-date"><?php the_field('work_date'); ?> <span><?php the_field('work_time'); ?></span></div>
                            
                           <?php if(!empty(get_field('work_description'))) { 
                             ?>

                            <div class="work-btn open-descr" agenda-post-id="<?php echo $post->ID ?>">
                                <span></span>
                            </div>

                            <div class="work-btn open-descr close-descr display-none" agenda-post-id="<?php echo $post->ID ?>">
                                <span></span>
                            </div>

                            <div class="more-news" agenda-post-id="<?php echo $post->ID ?>">
                                <a class="section-btn open-descr" agenda-post-id="<?php echo $post->ID ?>">Skaityti daugiau </a>
                            </div> 
                            <div class="more-news display-none" agenda-post-id="<?php echo $post->ID ?>">
                                <a class="section-btn open-descr" agenda-post-id="<?php echo $post->ID ?>">Suskleisti</a>
                            </div> 
                        <?php }  ?>
                            
                        </li>

                    <?php
                        endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                </ul>
                <?php

            }
                    ?>

            </div>

        </div>

    </div>
</div>

<?php get_footer(); ?>