<?php

// create a post type

function post_type_agenda() {

    $labels = array(
        'name'                => _x( 'Agenda', 'Post Type General Name', 'post_types' ),
        'singular_name'       => _x( 'Agenda', 'Post Type Singular Name', 'post_types' ),
        'menu_name'           => __( 'Agenda', 'post_types' ),
        'parent_item_colon'   => __( 'Parent Item:', 'post_types' ),
        'all_items'           => __( 'All Items', 'post_types' ),
        'view_item'           => __( 'View Item', 'post_types' ),
        'add_new_item'        => __( 'Add New Item', 'post_types' ),
        'add_new'             => __( 'Add New', 'post_types' ),
        'edit_item'           => __( 'Edit Item', 'post_types' ),
        'update_item'         => __( 'Update Item', 'post_types' ),
        'search_items'        => __( 'Search Item', 'post_types' ),
        'not_found'           => __( 'Not found', 'post_types' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'post_types' ),
    );
    $args = array(
        'label'               => __( 'Agenda', 'post_types' ),
        'description'         => __( 'Custom post type.', 'post_types' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 11,
        'menu_icon'           => 'dashicons-admin-appearance',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'agenda', $args );

}
add_action( 'init', 'post_type_agenda', 0 );


function post_type_activity() {

    $labels = array(
        'name'                => _x( 'Activity', 'Post Type General Name', 'post_types' ),
        'singular_name'       => _x( 'Activity', 'Post Type Singular Name', 'post_types' ),
        'menu_name'           => __( 'Activity', 'post_types' ),
        'parent_item_colon'   => __( 'Parent Item:', 'post_types' ),
        'all_items'           => __( 'All Items', 'post_types' ),
        'view_item'           => __( 'View Item', 'post_types' ),
        'add_new_item'        => __( 'Add New Item', 'post_types' ),
        'add_new'             => __( 'Add New', 'post_types' ),
        'edit_item'           => __( 'Edit Item', 'post_types' ),
        'update_item'         => __( 'Update Item', 'post_types' ),
        'search_items'        => __( 'Search Item', 'post_types' ),
        'not_found'           => __( 'Not found', 'post_types' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'post_types' ),
    );
    $args = array(
        'label'               => __( 'Activity', 'post_types' ),
        'description'         => __( 'Custom post type.', 'post_types' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 11,
        'menu_icon'           => 'dashicons-admin-appearance',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'activity', $args );

}
add_action( 'init', 'post_type_activity', 0 );


function months_taxonomy_custom()  {
    $labels = array(
        'name'                       => 'Months',
        'singular_name'              => 'Month',
        'menu_name'                  => 'Months',
        'all_items'                  => 'All Months',
        'parent_item'                => 'Parent Month',
        'parent_item_colon'          => 'Parent Month:',
        'new_item_name'              => 'New Month Name',
        'add_new_item'               => 'Add New Month',
        'edit_item'                  => 'Edit Month',
        'update_item'                => 'Update Month',
        'separate_items_with_commas' => 'Separate Categories with commas',
        'search_items'               => 'Search Categories',
        'add_or_remove_items'        => 'Add or remove Categories',
        'choose_from_most_used'      => 'Choose from the most used Categories',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'agenda_months', 'agenda', $args );
    register_taxonomy_for_object_type( 'agenda_months', 'agenda' );
}
add_action( 'init', 'months_taxonomy_custom' );







