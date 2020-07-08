<?php
// enquee scripts and styles
include('includes/scripts.php');
include('includes/disable_comments.php');

// create post types and taxonomies if needed
include('includes/post_types.php');

function mycustomfunc_remove_css_section( $wp_customize ) {
    $wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'mycustomfunc_remove_css_section', 15 );


// add post thumbnails with sizes
add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'thumbas', 500, 500, false );
    add_image_size( 'logo', 145, 44, false );
    add_image_size( 'main_section_image', 624, 416, false );
    add_image_size( 'homepage_news_image', 590, 352, false );
    add_image_size( 'homepage_gallery_image', 823, 518, true );
    add_image_size( 'inner_news_image', 380, 241, true );
    add_image_size( 'bio_page_image', 593, 360, false );
    add_image_size( 'bio_page_gallery_small', 160, 100, true );
    add_image_size( 'news_page_main_image', 623, 351, false );
    add_image_size( 'news_page_single_image', 407, 219, true );
    add_image_size( 'agenda_image_size', 623, 351, true );
    add_image_size( 'full', 1200, 1200, false );
    add_image_size( 'form_image', 450, 500, false );
    
}

// custom function for returning excerpt from post
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

// get image url from attachment id
function get_correct_image_link_thumb($thumb_id='', $size='large'){

    if ($thumb_id != '') {
        $imagepermalink = wp_get_attachment_image_src($thumb_id, $size, true);
    } else {
        $imagepermalink[0] =  get_stylesheet_directory_uri() . '/images/cover.jpg';
    }
    return $imagepermalink[0];
}

// disable admin bar if needed
show_admin_bar(false);

// get url by page template
function get_all_news_url(){
    $page_var = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-naujienos.php'
    ));
    return get_permalink($page_var[0]->ID);
}
function get_all_agenda_url(){
    $page_var = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-agenda.php'
    ));
    return get_permalink($page_var[0]->ID);
}
function get_all_activities_url(){
    $page_var = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-activities.php'
    ));
    return get_permalink($page_var[0]->ID);
}

// Create ACF options page
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page( 'Temos nustatymai' );
}

// Create wordpress menu locations
function register_theme_menus() {
    register_nav_menus(array(
        'pagrindinis-menu' => __( 'Pagrindinis meniu' ),
        'apatinis-menu' => __( 'Apatinis meniu' ),
    ));
}
add_action( 'init', 'register_theme_menus' );




// ajax function

add_action('wp_ajax_send_contact_form_message',        'send_contact_form_message');
add_action('wp_ajax_nopriv_send_contact_form_message', 'send_contact_form_message');
function send_contact_form_message(){
    $to = 'andrej@nextweb.lt';
    print_r($_POST);

    $message ='
        Vardas: '.$_POST['name'].'<br />
        El. paštas: '.$_POST['mail'].'<br />
        Tel. numeris: '.$_POST['tel'].'<br />
        Žinutė: '.$_POST['message'].'<br />
    ';

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From:  - ',
        'Reply-To: '.$_POST['name'].' <'.$_POST['email'].'>'
    );

    $subject = 'Savanorio registracijos žinutė';

    wp_mail($to, $subject, $message, $headers);
    die();
}

//Click buttom with ajax

add_action('wp_ajax_load_more_images',        'load_more_images');
add_action('wp_ajax_nopriv_load_more_images', 'load_more_images');
function load_more_images() {
//   echo "test ";

 $post = get_post(  
     $_POST['number']
 );

 if($post){

    $myArray =  get_post_meta($post->ID, 'event_gallery') ;

    if( $myArray ){ 
               
        foreach( $myArray as $itemArray ){ 
            // echo  $itemArray;
            for($i = 0; $i < count($itemArray); $i++ ){
                if($i >= 3){
        

        echo '<div class="activities-img alignleft ">
                <a data-fancybox="gallery" href="'.get_correct_image_link_thumb($itemArray[$i], "full").'">
                    <img src="'.get_correct_image_link_thumb($itemArray[$i], "homepage_gallery_image").' " alt="">
                </a>
            </div>';
                    };
                };
            };
        }; 
    };


  die();
}





















// function pagination($pages = '', $range = 4){
//     $showitems = ($range * 2)+1;

//     global  $paged;
//     if(empty($paged)) $paged = 1;

//     if($pages == '')
//     {
//         global $wp_query;
//         $pages = $wp_query->max_num_pages;
//         if(!$pages)
//         {
//             $pages = 1;
//         }
//     }

//     if(1 != $pages)
//     {
//         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
//         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
//         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

//         for ($i=1; $i <= $pages; $i++)
//         {
//             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
//             {
//                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
//             }
//         }

//         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
//         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
//         echo "</div>\n";
//     }
// }

