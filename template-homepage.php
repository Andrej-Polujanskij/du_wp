<?php
/* Template name: Homepage */
get_header();
?>
 <section class="head-section">
     <div class="container">

         <div class="head-section_content">
             <div class="head-section_left">
                  <div class="head-section_img" style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('section_image'), 'main_section_image'); ?>)"></div>
                  <div class="dots-decor"></div>
             </div>

             <div class="head-section_right">
   
                  <?php the_field('section_title'); ?>
                  
                  <?php the_field('section_text'); ?>
                      

                  <div class="signature"></div>
             </div>

         </div>

     </div>
 </section>

 <section class="agenda">
     <div class="container">
         <div class="agenda-content">
             <div class="agenda-left">
                 <div class="section-title">
                     <h3>Darbotvarkė</h3>
                 </div>
                <div class="works">
                    <ul>

                    <?php

                        $post = array('post_type' => 'agenda', 'posts_per_page' => 4);
                        $news = new WP_Query($post);

                        if($news->have_posts()) : 
                        while($news->have_posts()) : 
                        $news->the_post();
                        
                        
                    ?>
                        <li>
                            <div class="work-date"><?php the_field('work_date'); ?> <span><?php the_field('work_time'); ?></span></div>
                            <div class="work-title"><?php echo wp_trim_words(get_the_title(), 12) ; ?></div>
                        </li>
                  
                    <?php
                        endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                    </ul>
                </div>
                <a href="<?php echo get_all_agenda_url(); ?>" class="section-btn">VISA Darbotvarkė</a>
                
               <div class="dots-decor"></div>

             </div>
             <div class="agenda-right">
                <video class="video">
                    <source src="<?php echo get_template_directory_uri(); ?>/video/polivektris.mov" type="video/mp4">
                    Your browser does not support HTML video.
                </video>
                <div class="play">
                    <button class="play-btn"></button>
                    <div class="text">Žiūrėti video</div>
                </div>

             </div>

         </div>
     </div>
 </section>

 <section class="news">
     <div class="container">
        <div class="section-title">
            <h3>Naujienos</h3>
        </div>
        
        <div class="news-container">

        <?php

            $post = array('post_type' => 'post', 'posts_per_page' => 2);
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
                        <div class="news-content"><?php echo excerpt(15); ?></div>
                    </div>
                </a>
            </div>

            <?php
                endwhile;
                endif;
                wp_reset_query();
            ?>

        </div>
            <div class="more-news">
                <a href="<?php echo get_all_news_url(); ?>" class="section-btn">Visos naujienos</a>
            </div>            
     </div>
 </section>

 <section class="activities">
    <div class="container">
        <div class="section-title">
            <h3>Veikla apygardoje</h3>
        </div>

        <div class="carousel-btn">  
            <button class="prev" ><span class="prev"></span></button>
            <button class="next"><span class="next"></span></button>
        </div>

        <div class="activities-container carousel">
        <?php        
            
            $images = get_field('small_gallery');

            if($images):
            foreach( $images as $image_id ): 
        ?>

            <div class="activities-img">
                <a data-fancybox="gallery" href="<?php echo get_correct_image_link_thumb($image_id, 'full'); ?>">
                    <img src="<?php echo get_correct_image_link_thumb($image_id, 'homepage_gallery_image'); ?>" alt="">
                </a>
            </div>
        
        <?php 
            endforeach;
            endif;
            wp_reset_query();
        ?>


        </div>        

        <div class="more-news">
            <a href="<?php echo get_all_activities_url(); ?>" class="section-btn">Daugiau </a>
        </div> 

    </div>
 </section>

 <section class="write-us">
     <div class="container">
         <div class="write-us_container">
             <div class="write-us_img">
                 <div class="write-us_img-logo"></div>
             </div>

             <div class="write-us_form">
                 <h3>Savanorio registracija</h3>

                 <div class="dots-decor"></div>

                 <div class="form">
                    <form id="form" action="POST">
                        <div class="form-item">
                            <label for="name">Vardas</label>
                            <input class="required" id="name" name="name" type="text" placeholder="Vardas">
                        </div>
                        <div class="form-item">
                            <label for="tel">Tel. numeris</label>
                            <input class="number" id="tel" name="tel" type="text" placeholder="Tel. numeris">
                        </div>
                        <div class="form-item">
                            <label for="mail">El. paštas</label>
                            <input class="requiredemail" id="mail" name="mail" type="text" placeholder="El. paštas">
                        </div>
                        
                        <div class="form-item">
                            <label for="message">Jūsų žinutė</label>
                            <textarea class="mintnine" name="message" id="message" cols="30" rows="7" placeholder="Jūsų žinutė"></textarea>
                        </div>

                        <div class="form-btn">
                            <button type="submit"> <span></span> siųsti</button>
                        </div>

                        <div class="post-send-mess display-none">Ačiū - Jūsų žinutė buvo sėkmingai išsiūsta.</div>

                    </form>
                 </div>

             </div>
       
             <div class="spinner display-none">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>

             <div class="on-top-bg display-none"></div>
         </div>

     </div>
 </section>
 <div class="map-container">
    <div class="container">
         <div class="search-country">
             <div class="search-country-title"><span>Pasitikrink</span> ar tavo apygarda priklauso </div>
             <div class="search">
                <div class="search-country-icon"></div>
                <select class="search-item" name="search-country" id="">
                    <option disabled selected>Pasirinkite</option>
                </select>
             </div>
         </div>

    </div>
    <div class="map">   
    </div>
</div>

<?php get_footer(); ?>