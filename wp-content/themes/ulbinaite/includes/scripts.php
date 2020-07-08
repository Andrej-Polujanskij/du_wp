<?php
function scripts_styles() {
    $ver = '1.04';
    $static_version = '1.01';

    // Loads our main stylesheet.
    wp_enqueue_style( 'nextweb-style', get_stylesheet_uri(), array(), $ver );
    wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap', array(), $static_version );
    wp_enqueue_style( 'fancyBox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', array(), $static_version );
    wp_enqueue_style( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), $static_version );
    wp_enqueue_style( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css', array(), $static_version );

    wp_enqueue_script( 'map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBm-sVievd4ulRLn_U7IppLyDLmksF08rw', array( ), $ver, true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), $ver, true );
    wp_enqueue_script( 'jQuery_validate', get_template_directory_uri() . '/js/jquery.validate.js', array( 'jquery' ), $ver, true );
    wp_enqueue_script( 'fancyBox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array( 'jquery' ), $ver, true );
    wp_enqueue_script( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), $ver, true );
    wp_enqueue_script( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js', array( 'jquery' ), $ver, true );
   
    

    wp_localize_script( 'custom', 'variables', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'scripts_styles' );
