<?php
/**
 * Register custom post types
 * @link       http://g.minas.org/contact
 * @since      1.0.0
 * @package    msf
 * @subpackage msf/includes
 */

class Msf_Register_Post_Types {
	private $plugin_name;
	private $version;


	public function msf_register_publikation_post_type() {
    $singular = 'Publikation';
	$plural = 'Publikationen';
	$slug = str_replace( ' ', '_', strtolower( $singular ) );

	$labels = array(
		'name'                  => _x( 'Publikationen', 'Publikation General Name', 'msf' ),
		'singular_name'         => _x( 'Publikation', 'Publikation Singular Name', 'msf' ),
		'menu_name'             => _x( 'Publikationen', 'msf' ),
		'name_admin_bar'        => _x( 'Publikation', 'msf' ),
		'archives'              => __( 'Item Archives', 'msf' ),
		'attributes'            => __( 'Item Attributes', 'msf' ),
		'parent_item_colon'     => __( 'Parent Item:', 'msf' ),
		'all_items'             => __( 'All Items', 'msf' ),
		'add_new_item'          => __( 'Add New Item', 'msf' ),
		'add_new'               => _x( 'Add New', 'msf' ),
		'new_item'              => __( 'New Item', 'msf' ),
		'edit_item'             => __( 'Edit Item', 'msf' ),
		'update_item'           => __( 'Update Item', 'msf' ),
		'view_item'             => __( 'View Item', 'msf' ),
		'view_items'            => __( 'View Items', 'msf' ),
		'search_items'          => __( 'Search Item', 'msf' ),
		'not_found'             => __( 'Not found', 'msf' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'msf' ),
		'featured_image'        => __( 'Featured Image', 'msf' ),
		'set_featured_image'    => __( 'Set featured image', 'msf' ),
		'remove_featured_image' => __( 'Remove featured image', 'msf' ),
		'use_featured_image'    => __( 'Use as featured image', 'msf' ),
		'insert_into_item'      => __( 'Insert into item', 'msf' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'msf' ),
		'items_list'            => __( 'Items list', 'msf' ),
		'items_list_navigation' => __( 'Items list navigation', 'msf' ),
		'filter_items_list'     => __( 'Filter items list', 'msf' ),
	);
	$args = array(
		'labels'                => $labels,
		'description'           => __( 'Publikation Posts', 'msf' ),
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 	'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'begriff' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'           	=> 'dashicons-businessman',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'query_var'           	=> true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	    'rewrite'  				=> array('slug' => 'publikation' ),
	);
	register_post_type( 'Publikation', $args );

	}  //types


	public function msf_taxs(){

  $labels2 = array(
		'name'              => _x( 'Begriffe', 'msf' ),
		'singular_name'     => _x( 'Begriff', 'msf' ),
		'search_items'      => __( 'Search Begriffe', 'msf' ),
		'all_items'         => __( 'Alle Begriffe', 'msf' ),
		'edit_item'         => __( 'Edit Begriffe', 'msf' ),
		'update_item'       => __( 'Update Begriffe', 'msf' ),
		'add_new_item'      => __( 'Add New Begriffe', 'msf' ),
		'new_item_name'     => __( 'New Begriff Name', 'msf' ),
		'menu_name'         => __( 'Begriffe', 'msf' ),
	);

	$args2 = array(
		'labels' => $labels2,
		'hierarchical' 				 => true,
		'sort' 						 => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_nav_menus'          => true,
		'show_in_quick_edit'         => true,
		'query_var'			         => true,
		'rewrite' 					 => array( 'slug' => 'begriff' ),
		'show_admin_column' 		 => true
	);

	register_taxonomy( 'begriff', array( 'publikation' ), $args2);

	}

}
