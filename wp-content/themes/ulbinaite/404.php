<?php get_header(); ?>
    <div class="title-row">
        <div class="center"><h1>Error 404</h1></div>
    </div>
    <div class="inside-holder">
        <div class="center">
            <div class="content-block">
                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>