</main>
<footer>
  <div class="container">
    <div class="footer">

      <div class="footer-logo">
        <a href="<?php echo get_option("siteurl"); ?>">
          <img src=" <?php echo get_correct_image_link_thumb(get_field('footer-logo', 'options'), 'logo'); ?>" alt="">
        </a>  

      </div>
        
      <div class="footer-menu">
          <nav>
       
            <?php wp_nav_menu(array( 
                        'container'  => '<ul></ul>',
                        'menu_class' => 'meniuitem menu-menu',
                        'theme_location' => 'apatinis-menu'
              )); ?>
          </nav>
      </div>
          
      <div class="soc-net">
        <ul>
        <?php 
            $instagram = get_field('instagram', 'options');
            $linkedin = get_field('linkedin', 'options');
            $facebook = get_field('facebook', 'options');
        ?>
        <?php if($instagram){ ?>
          <li><a href="<?php the_field('instagram', 'options') ?>" target="_blank"><span class="soc-net-icon ista-icon"></span></a></li>
        <?php } ?>
        <?php if($linkedin){ ?>
          <li><a href="<?php the_field('linkedin', 'options') ?>" target="_blank"><span class="soc-net-icon linked-icon"></span></a></li>
        <?php } ?>
        <?php if($facebook){ ?>
          <li><a href="<?php the_field('facebook', 'options') ?>" target="_blank"><span class="soc-net-icon fb-icon"></span></a></li>
        <?php } ?>  
        </ul>
            
      </div>
            
    </div>
  </div>
</footer>

    <?php wp_footer(); ?>
    <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  </body>
</html>