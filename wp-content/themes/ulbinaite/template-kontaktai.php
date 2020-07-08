<?php
/* Template name: Kontaktai */
get_header();
?>
<section class="kontaktai-page">
    <div class="container">

        <div class="dots-decor position-7"></div>

        <div class="kontaktai-bg-decor"></div>

        <div class="kontaktai-container">

            <div class="kontaktai-header">
                <h1><?php the_field('kontaktai_title'); ?></h1>
                <?php the_field('kontaktai_text'); ?>
            </div>

            <div class="kontaktai-email">
                <span></span>
                <a href="mailto:<?php the_field('kontaktai_email'); ?>">
                    <?php the_field('kontaktai_email'); ?>
                </a>    
            </div>

            <div class="kontaktai-forma">

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
                            <button type="submit"> <span></span><?php the_field('kontaktai_button'); ?> </button>
                        </div>

                        <div class="post-send-mess display-none">Ačiū - Jūsų žinutė buvo sėkmingai išsiūsta.</div>

                    </form>
                 </div>

                 <div class="spinner display-none">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>

                 <div class="on-top-bg display-none"></div>

            </div>


        </div>
    </div>
</section>
<?php get_footer(); ?>