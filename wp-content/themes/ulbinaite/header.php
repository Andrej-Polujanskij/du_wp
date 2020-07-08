<!DOCTYPE html>
<html lang="lt" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=9;IE=10;IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/icons/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/icons/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/icons/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/icons/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/icons/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <meta property="fb:app_id"        content="APPID"/>
    <meta property="og:url"           content="<?php echo get_permalink(); ?>" />
    <meta property="og:type"          content="website" />

    <meta property="og:title"         content="Daiva Ulbinaitė - Imuosi atsakomybės" />
<?php if( !is_page() ){ ?>
    <meta property="og:image"         content="" />
<?php }elseif(  is_page() && get_field('facebook_image') ){ ?>
    <meta property="og:image"         content="<?php echo get_correct_image_link_thumb(get_field('facebook_image'), 'main_section_image'); ?>" />
<?php }else { ?>
    <meta property="og:image"         content="<?php echo get_correct_image_link_thumb(get_field('share_image', 'options'), 'full'); ?>" />
<?php } ?>



    <title><?php if ( is_front_page() ) { echo get_bloginfo( 'name' ); } else { echo get_bloginfo( 'name' ); echo ' | '; wp_title( '', true, 'right' ); } ?></title>

    

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
 <header>
    <div class="container">
        <div class="header">
            <div class="head-logo">
                <a href="<?php echo get_option("siteurl"); ?>">
                    <img src=" <?php echo get_correct_image_link_thumb(get_field('logo_img', 'options'), 'logo'); ?>" alt="">
                </a>    
            </div>
            <div class="head-menu">
                <nav>
                    <?php wp_nav_menu(array( 
                        'container'  => '<ul></ul>',
                        'menu_class' => 'meniuitem menu-menu ',
                        'theme_location' => 'pagrindinis-menu'
                    )); ?>
                </nav>
            </div>
            <div class="head-btn">
                <a data-fancybox data-animation-duration="700" data-options='{"src": "#hidden-content", "touch": false, "smallBtn" : false}'  href="javascript:;" class="section-btn">Parama</a>
            </div>

            <div class="modal-wnd" style="display: none;" id="hidden-content">
                <div class="modal-title"><?php the_field('text_title', 'options'); ?></div>
                <div class="modal-text"><?php the_field('text_content', 'options') ?></div>

                <div class="modal-details">
                    <div class="detail-icon"></div>
                    <div class="detail-all-items">
                        <div class="detail-item">
                            <div class="item-title">Banko sąskaitos numeris:</div>
                            <div id="bill" class="item-content bill-number"><?php the_field('bill_number', 'options') ?></div>
                        </div>
                        <div class="detail-item">
                            <div class="item-title">Gavėjas:</div>
                            <div class="item-content"><?php the_field('account_name', 'options') ?></div>
                        </div>
                    </div>
                </div>

                <div class="head-btn">
                    <div class="post-copy-mess display-none"><?php the_field('text_after_button_press', 'options'); ?></div>
                    <a class="section-btn copy-btn"><?php the_field('button_text', 'options'); ?></a>
                </div>

                <div data-fancybox-close  class="modal-close"></div>
                
            </div>

            <div class="mobile-menu">
                <input class="checkbox" type="checkbox" />

                <span></span>
                <span></span>
                <span></span>


                <div class="head-menu">

                    <nav>
                        <div class="head-logo">
                            <a href="<?php echo get_option("siteurl"); ?>">
                                <img src=" <?php echo get_correct_image_link_thumb(get_field('logo_img', 'options'), 'logo'); ?>" alt="">
                            </a>    
                        </div>

                        <?php wp_nav_menu(array( 
                            'container'  => '<ul></ul>',
                            'menu_class' => 'meniuitem menu-menu',
                            'theme_location' => 'pagrindinis-menu'
                        )); ?>

                        <div class="head-btn">
                            <a data-fancybox data-src="#hidden-content" data-modal="true" href="javascript:;" class="section-btn">Parama</a>
                        </div>

                        <div class="soc-net">

                            <ul>
                            <?php 
                                $instagram = get_field('instagram', 'options');
                                $linkedin = get_field('linkedin', 'options');
                                $facebook = get_field('facebook', 'options');
                            ?>
                            <?php if($instagram){ ?>
                            <li><a href="<?php the_field('instagram', 'options') ?>" target="_blank"><span class="soc-net-icon ista-icon-b"></span></a></li>
                            <?php } ?>
                            <?php if($linkedin){ ?>
                            <li><a href="<?php the_field('linkedin', 'options') ?>" target="_blank"><span class="soc-net-icon linked-icon-b"></span></a></li>
                            <?php } ?>
                            <?php if($facebook){ ?>
                            <li><a href="<?php the_field('facebook', 'options') ?>" target="_blank"><span class="soc-net-icon fb-icon-b"></span></a></li>
                            <?php } ?>  
                            </ul>
                                
                        </div>

                        <div class="dots-decor"></div>
                    </nav>
                </div>

            </div>

        </div>
    </div>
 
 </header>
 <main>
 