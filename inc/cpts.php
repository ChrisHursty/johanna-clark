<?php
/**
 * Chris Hurst Custom Post Types
 *
 * @package Chris Hurst WP
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
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'chris-hurst-wp' ),
		'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'chris-hurst-wp' ),
		'menu_name'             => __( 'Portfolio', 'chris-hurst-wp' ),
		'name_admin_bar'        => __( 'Portfolio', 'chris-hurst-wp' ),
		'archives'              => __( 'Portfolio Archives', 'chris-hurst-wp' ),
		'attributes'            => __( 'Item Attributes', 'chris-hurst-wp' ),
		'parent_item_colon'     => __( 'Parent Item:', 'chris-hurst-wp' ),
		'all_items'             => __( 'All Portfolio Items', 'chris-hurst-wp' ),
		'add_new_item'          => __( 'Add New Portfolio Item', 'chris-hurst-wp' ),
		'add_new'               => __( 'Add New Portfolio Item', 'chris-hurst-wp' ),
		'new_item'              => __( 'New Item', 'chris-hurst-wp' ),
		'edit_item'             => __( 'Edit Item', 'chris-hurst-wp' ),
		'update_item'           => __( 'Update Item', 'chris-hurst-wp' ),
		'view_item'             => __( 'View Item', 'chris-hurst-wp' ),
		'view_items'            => __( 'View Items', 'chris-hurst-wp' ),
		'search_items'          => __( 'Search Item', 'chris-hurst-wp' ),
		'not_found'             => __( 'Not found', 'chris-hurst-wp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'chris-hurst-wp' ),
		'featured_image'        => __( 'Featured Image', 'chris-hurst-wp' ),
		'set_featured_image'    => __( 'Set featured image', 'chris-hurst-wp' ),
		'remove_featured_image' => __( 'Remove featured image', 'chris-hurst-wp' ),
		'use_featured_image'    => __( 'Use as featured image', 'chris-hurst-wp' ),
		'insert_into_item'      => __( 'Insert into item', 'chris-hurst-wp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'chris-hurst-wp' ),
		'items_list'            => __( 'Items list', 'chris-hurst-wp' ),
		'items_list_navigation' => __( 'Items list navigation', 'chris-hurst-wp' ),
		'filter_items_list'     => __( 'Filter items list', 'chris-hurst-wp' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio Item', 'chris-hurst-wp' ),
		'description'           => __( 'Post Type Description', 'chris-hurst-wp' ),
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
function chris_hurst_create_genre_taxonomy() {
    $labels = array(
        'name'          => _x('Genres', 'Taxonomy General Name', 'chris-hurst-wp'),
        'singular_name' => _x('Genre', 'Taxonomy Singular Name', 'chris-hurst-wp'),
    );

    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
        'public'       => true,
        'show_in_rest' => true,
    );

    register_taxonomy('genre', array('portfolio'), $args);
}

add_action('init', 'chris_hurst_create_genre_taxonomy');

function company_post_type() {
    $labels = array(
        'name'                  => _x('Companies', 'Post Type General Name', 'chris-hurst-wp'),
        'singular_name'         => _x('Company', 'Post Type Singular Name', 'chris-hurst-wp'),
        'menu_name'             => __('Companies', 'chris-hurst-wp'),
        'name_admin_bar'        => __('Company', 'chris-hurst-wp'),
        'archives'              => __('Company Archives', 'chris-hurst-wp'),
        'attributes'            => __('Company Attributes', 'chris-hurst-wp'),
        'parent_item_colon'     => __('Parent Company:', 'chris-hurst-wp'),
        'all_items'             => __('All Companies', 'chris-hurst-wp'),
        'add_new_item'          => __('Add New Company', 'chris-hurst-wp'),
        'add_new'               => __('Add New', 'chris-hurst-wp'),
        'new_item'              => __('New Company', 'chris-hurst-wp'),
        'edit_item'             => __('Edit Company', 'chris-hurst-wp'),
        'update_item'           => __('Update Company', 'chris-hurst-wp'),
        'view_item'             => __('View Company', 'chris-hurst-wp'),
        'view_items'            => __('View Companies', 'chris-hurst-wp'),
        'search_items'          => __('Search Company', 'chris-hurst-wp'),
        'not_found'             => __('Not found', 'chris-hurst-wp'),
        'not_found_in_trash'    => __('Not found in Trash', 'chris-hurst-wp'),
        'featured_image'        => __('Featured Image', 'chris-hurst-wp'),
        'set_featured_image'    => __('Set featured image', 'chris-hurst-wp'),
        'remove_featured_image' => __('Remove featured image', 'chris-hurst-wp'),
        'use_featured_image'    => __('Use as featured image', 'chris-hurst-wp'),
        'insert_into_item'      => __('Insert into company', 'chris-hurst-wp'),
        'uploaded_to_this_item' => __('Uploaded to this company', 'chris-hurst-wp'),
        'items_list'            => __('Companies list', 'chris-hurst-wp'),
        'items_list_navigation' => __('Companies list navigation', 'chris-hurst-wp'),
        'filter_items_list'     => __('Filter companies list', 'chris-hurst-wp'),
    );

    $args = array(
        'label'               => __('Company', 'chris-hurst-wp'),
        'description'         => __('Post Type Description', 'chris-hurst-wp'),
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

