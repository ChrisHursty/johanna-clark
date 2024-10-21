<?php
/**
 * JCH WP Custom Post Types
 *
 * @package JCH WP
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Testimonials CPT
function register_testimonial_post_type() {
    $args = array(
        'public'        => true,
        'label'         => 'Testimonials',
        'supports'      => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon'     => 'dashicons-groups',
        'menu_position' => 6,
    );
    register_post_type('testimonial', $args);
  }
  add_action('init', 'register_testimonial_post_type');

// Portfolio Custom Post Type
function portfolio() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'jch-wp' ),
		'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'jch-wp' ),
		'menu_name'             => __( 'Portfolio', 'jch-wp' ),
		'name_admin_bar'        => __( 'Portfolio', 'jch-wp' ),
		'archives'              => __( 'Portfolio Archives', 'jch-wp' ),
		'attributes'            => __( 'Item Attributes', 'jch-wp' ),
		'parent_item_colon'     => __( 'Parent Item:', 'jch-wp' ),
		'all_items'             => __( 'All Portfolio Items', 'jch-wp' ),
		'add_new_item'          => __( 'Add New Portfolio Item', 'jch-wp' ),
		'add_new'               => __( 'Add New Portfolio Item', 'jch-wp' ),
		'new_item'              => __( 'New Item', 'jch-wp' ),
		'edit_item'             => __( 'Edit Item', 'jch-wp' ),
		'update_item'           => __( 'Update Item', 'jch-wp' ),
		'view_item'             => __( 'View Item', 'jch-wp' ),
		'view_items'            => __( 'View Items', 'jch-wp' ),
		'search_items'          => __( 'Search Item', 'jch-wp' ),
		'not_found'             => __( 'Not found', 'jch-wp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'jch-wp' ),
		'featured_image'        => __( 'Featured Image', 'jch-wp' ),
		'set_featured_image'    => __( 'Set featured image', 'jch-wp' ),
		'remove_featured_image' => __( 'Remove featured image', 'jch-wp' ),
		'use_featured_image'    => __( 'Use as featured image', 'jch-wp' ),
		'insert_into_item'      => __( 'Insert into item', 'jch-wp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'jch-wp' ),
		'items_list'            => __( 'Items list', 'jch-wp' ),
		'items_list_navigation' => __( 'Items list navigation', 'jch-wp' ),
		'filter_items_list'     => __( 'Filter items list', 'jch-wp' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio Item', 'jch-wp' ),
		'description'           => __( 'Post Type Description', 'jch-wp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'post_tag', 'genres' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
        'menu_icon'             => 'dashicons-portfolio',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio', 0 );

// Genre Custom Taxonomy
function jch_create_genre_taxonomy() {
    $labels = array(
        'name'          => _x('Genres', 'Taxonomy General Name', 'jch-wp'),
        'singular_name' => _x('Genre', 'Taxonomy Singular Name', 'jch-wp'),
    );

    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
        'public'       => true,
        'show_in_rest' => true,
    );

    register_taxonomy('genre', array('portfolio'), $args);
}

add_action('init', 'jch_create_genre_taxonomy');

function company_post_type() {
    $labels = array(
        'name'                  => _x('Companies', 'Post Type General Name', 'jch-wp'),
        'singular_name'         => _x('Company', 'Post Type Singular Name', 'jch-wp'),
        'menu_name'             => __('Companies', 'jch-wp'),
        'name_admin_bar'        => __('Company', 'jch-wp'),
        'archives'              => __('Company Archives', 'jch-wp'),
        'attributes'            => __('Company Attributes', 'jch-wp'),
        'parent_item_colon'     => __('Parent Company:', 'jch-wp'),
        'all_items'             => __('All Companies', 'jch-wp'),
        'add_new_item'          => __('Add New Company', 'jch-wp'),
        'add_new'               => __('Add New', 'jch-wp'),
        'new_item'              => __('New Company', 'jch-wp'),
        'edit_item'             => __('Edit Company', 'jch-wp'),
        'update_item'           => __('Update Company', 'jch-wp'),
        'view_item'             => __('View Company', 'jch-wp'),
        'view_items'            => __('View Companies', 'jch-wp'),
        'search_items'          => __('Search Company', 'jch-wp'),
        'not_found'             => __('Not found', 'jch-wp'),
        'not_found_in_trash'    => __('Not found in Trash', 'jch-wp'),
        'featured_image'        => __('Featured Image', 'jch-wp'),
        'set_featured_image'    => __('Set featured image', 'jch-wp'),
        'remove_featured_image' => __('Remove featured image', 'jch-wp'),
        'use_featured_image'    => __('Use as featured image', 'jch-wp'),
        'insert_into_item'      => __('Insert into company', 'jch-wp'),
        'uploaded_to_this_item' => __('Uploaded to this company', 'jch-wp'),
        'items_list'            => __('Companies list', 'jch-wp'),
        'items_list_navigation' => __('Companies list navigation', 'jch-wp'),
        'filter_items_list'     => __('Filter companies list', 'jch-wp'),
    );

    $args = array(
        'label'               => __('Company', 'jch-wp'),
        'description'         => __('Post Type Description', 'jch-wp'),
        'labels'              => $labels,
        'supports'            => array('title', 'thumbnail'),
        'taxonomies'          => array('category', 'post_tag'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-building',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type('company', $args);
}

add_action('init', 'company_post_type');

// Register Custom Post Type for Hair Salon Services
function jch_wp_hair_salon_services_cpt() {

    $labels = array(
        'name'                  => _x( 'Hair Salon Services', 'Post Type General Name', 'jch-wp' ),
        'singular_name'         => _x( 'Hair Salon Service', 'Post Type Singular Name', 'jch-wp' ),
        'menu_name'             => __( 'Hair Salon Services', 'jch-wp' ),
        'name_admin_bar'        => __( 'Hair Salon Service', 'jch-wp' ),
        'archives'              => __( 'Service Archives', 'jch-wp' ),
        'attributes'            => __( 'Service Attributes', 'jch-wp' ),
        'parent_item_colon'     => __( 'Parent Service:', 'jch-wp' ),
        'all_items'             => __( 'All Services', 'jch-wp' ),
        'add_new_item'          => __( 'Add New Service', 'jch-wp' ),
        'add_new'               => __( 'Add New', 'jch-wp' ),
        'new_item'              => __( 'New Service', 'jch-wp' ),
        'edit_item'             => __( 'Edit Service', 'jch-wp' ),
        'update_item'           => __( 'Update Service', 'jch-wp' ),
        'view_item'             => __( 'View Service', 'jch-wp' ),
        'view_items'            => __( 'View Services', 'jch-wp' ),
        'search_items'          => __( 'Search Service', 'jch-wp' ),
        'not_found'             => __( 'Not found', 'jch-wp' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'jch-wp' ),
        'featured_image'        => __( 'Featured Image', 'jch-wp' ),
        'set_featured_image'    => __( 'Set featured image', 'jch-wp' ),
        'remove_featured_image' => __( 'Remove featured image', 'jch-wp' ),
        'use_featured_image'    => __( 'Use as featured image', 'jch-wp' ),
        'insert_into_item'      => __( 'Insert into service', 'jch-wp' ),
        'uploaded_to_this_item' => __( 'Uploaded to this service', 'jch-wp' ),
        'items_list'            => __( 'Services list', 'jch-wp' ),
        'items_list_navigation' => __( 'Services list navigation', 'jch-wp' ),
        'filter_items_list'     => __( 'Filter services list', 'jch-wp' ),
    );
    $args = array(
        'label'                 => __( 'Hair Salon Service', 'jch-wp' ),
        'description'           => __( 'Services offered by the salon', 'jch-wp' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-superhero', // Salon related icon
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'hair-salon-services', 'with_front' => false ),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'hair_salon_service', $args );

}
add_action( 'init', 'jch_wp_hair_salon_services_cpt', 0 );
