<?php
/* Template name: Savanorio registracija */
get_header();
include('includes/page_header.php');
?>

<div class="registr-page-text">
    <div class="container">
        <div class="page-text-cont">
            <?php the_field('registration_page_text'); ?>
        </div>
    </div>
</div>

<div class="registr-page">

         <div class="write-us_container">
             
             <div class="write-us_img" style="background-image: url(<?php echo get_correct_image_link_thumb(get_field('registration_form_image'), 'form_image'); ?>)">
                <div class="write-us_img-cont">
                    <div class="write-us_img-logo"></div>
                </div>
                <div class="clear"></div>
             </div>

             <div class="write-us_form">
                 <h3><?php the_field('registration_form_title'); ?></h3>

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
                            <button type="submit"> <span></span> <?php the_field('registration_form_button'); ?></button>
                        </div>

                        <div class="post-send-mess display-none">Ačiū - Jūsų žinutė buvo sėkmingai išsiūsta.</div>

                    </form>
                 </div>
                 <div class="clear"></div>
             </div>

                 <div class="spinner display-none">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>

                 <div class="on-top-bg display-none"></div>

         </div>
     
</div>
<?php get_footer(); ?>