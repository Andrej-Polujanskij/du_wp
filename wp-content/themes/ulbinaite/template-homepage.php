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
                 <div class="signature"></div>
   
                  <?php the_field('section_title'); ?>
                  
                  <?php the_field('section_text'); ?>
                      

             </div>

         </div>

     </div>
 </section>

 <section class="agenda">
     <div class="container">
         <div class="agenda-content">
             <div class="agenda-left">
                 <div class="section-title">
                     <h3> <?php the_field('agenda_section_title'); ?></h3>
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

                            <a href="<?php echo get_all_agenda_url(); ?>#<?php echo $post->ID ?>">
                                <div class="work-title"><?php echo wp_trim_words(get_the_title(), 12) ; ?></div>
                            </a>    
                        </li>
                  
                    <?php
                        endwhile;
                        endif;
                        wp_reset_query();
                    ?>
                    </ul>
                </div>
                <a href="<?php echo get_all_agenda_url(); ?>" class="section-btn"><?php the_field('agenda_section_button'); ?></a>
                
               <div class="dots-decor"></div>

             </div>
             <?php 
                    if( get_field('choose_field_type') == 'Image') {
                        ?>
                        <div class="agenda-right img-right">

                                <img src="<?php echo get_correct_image_link_thumb(get_field('image'), 'agenda_image_size'); ?>" alt="">

                        </div>

                        <?php
                    }elseif(get_field('choose_field_type') == 'Video'){
                       $group = get_field('video');

                        ?>
                        <div class="agenda-right agenda-right-video">

                            <a class="video-bg" data-fancybox href="#myVideo" style="background-image: url(<?php echo get_correct_image_link_thumb($group['video_top_image'], 'agenda_image_size' ); ?>)">

                            <video class="video" id="myVideo" style="display: none">
                                <source src="<?php echo $group['video']; ?>" type="video/mp4">
                                Your browser does not support HTML video.
                            </video>

                            <div class="play">
                                <div class="play-inner">
                                    <button class="play-btn"></button>
                                    <div class="text">Žiūrėti video</div>
                                </div>
                            </div> 

                            </a>

                        </div>
                        
                        <?php
                    }
                 ?>
           

         </div>
     </div>
 </section>

 <section class="news">
     <div class="container">
        <div class="section-title">
            <h3><?php the_field('news_section_title'); ?></h3>
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
                <a href="<?php echo get_all_news_url(); ?>" class="section-btn"><?php the_field('news_section_button'); ?></a>
            </div>            
     </div>
 </section>

 <section class="activities">
    <div class="container">
        <div class="section-title">
            <h3><?php the_field('gallery_section_title'); ?></h3>
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
            <a href="<?php echo get_all_activities_url(); ?>" class="section-btn"><?php the_field('gallery_section_button'); ?> </a>
        </div> 

    </div>
 </section>

 <section class="write-us">
     <div class="container">
         <div class="write-us_container">
             <div class="write-us_img" style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('registration_section_image'), 'form_image'); ?>)">
                 <div class="write-us_img-logo"></div>
             </div>

             <div class="write-us_form">
                 <h3><?php the_field('registration_section_title'); ?></h3>

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
                            <button type="submit"> <span></span><?php the_field('registration_section_button'); ?> </button>
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
             <div class="search-country-title"><?php the_field('map_section_title'); ?></div>


             <div class="search">
                <div class="search-country-icon"></div>
                <?php
                
                $countries = [  'Pirmas Alytus' => 'Pirmo Alytaus',
                                'Šaltiniai' => 'Šaltinių',
                                'Pramonės g. Alytus' => 'Pramonės',
                                'Gulbyne' => 'Gulbynės',
                                'Daugai' => 'Daugų',
                                'Rodžia' => 'Rodžios',
                                'Vaikantonys' => 'Vaikantonių',
                                'Rimėnai' => 'Rimėnų',
                                'Meškučiai' => 'Meškučių',
                                'Pocelonys' => 'Pocelonių',
                                'Alytus' => 'Alytaus',	
                                'Venciūnai' => 'Venciūnų',
                                'Alovė' => 'Alovės',
                                'Ilgai' => 'Ilgų',
                                'Makniūnai' => 'Makniūnų',
                                'Ryliškiai' => 'Ryliškių',
                                'Nemunaitis' => 'Nemunaičio',
                                'Puodžiai' => 'Puodžių',
                                'Žilinai' => 'Žilinų',
                                'Dubičiai' => 'Dubičių',
                                'Panočiai' => 'Panočių',
                                'Kabeliai' => 'Kabelių',
                                'Marcinkonys' => 'Marcinkonių',
                                'Puvočiai' => 'Puvočių',
                                'Krūminiai' => 'Krūminių',
                                'Matuizos' => 'Matuizų',
                                'Gudakiemis' => 'Gudakiemio',
                                'Kibyšiai' => 'Kibyšių',
                                'Merkinė' => 'Merkinės',
                                'Panara' => 'Panaros',
                                'Vilkiautinis' => 'Vilkiautinio',
                                'Pilvingiai' => 'Pilvingių',
                                'Daržininkai' => 'Daržininkų',
                                'Dargužiai' => 'Dargužių',
                                'Valkininkai' => 'Valkininkų',
                                'Nemunaičio kaimas' => 'Pušelės',
                                'Gudžiai' => 'Gudžių',
                                'Nedzingė' => 'Nedzingės',
                                'Perloja' => 'Perlojos',
                                'Sarapiniškės' => 'Sarapiniškių',
                                'Tolkūnai' => 'Tolkūnų',
                                'Kriviliai' => 'Krivilių', 
                                'Vydeniai' => 'Vydenių',
                                'Kazlų Rūda' => 'Rudios',
                                'Alytaus pramonės parkas' => 'Parko',
                                ' Medukšta 64464' => 'Dzūkų',//
                                'Šilo g. 3, Alytaus m' => 'Šilo',
                                'Senoji Varėna' => 'Senosios Varėnos'
                            ];
                ?>
                 
            <div class="select-side">
                <div class="display-none search-result">
                    <div class="result-icon"></div>
                    <div class="result-text">Jūsų apygarda priklauso</div>
                </div>

               
                
                <select class="search-item"  name="search-country" id="select">
                    <option></option>
                    

                    <?php foreach($countries as $item => $value){ ?>
                    <option value="<?php echo $item ?>" ><?php echo $value; ?></option>
                    <?php } ?>

                </select>

            </div>

        </div>
        </div>

        </div>

     <div class="map-cont-inner">   
        <div class="map-location "></div>
        <div class="map">   
        </div>
    </div>
</div>



<?php get_footer(); ?>