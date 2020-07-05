<?php
/**
 * Fired during plugin deactivation
 *
 * @link       http://wordpress.org/plugins/site-muduru/
 * @since      1.0.0
 *
 * @package    site_muduru
 * @subpackage site_muduru/includes
 */

class Site_Muduru_Register_Post_Types {
	private $site_muduru;
	private $version;

	public function site_muduru_register_publikation_post_type() {
    $singular = 'Publikation';
	$plural = 'Publikationen';
	$slug = str_replace( ' ', '_', strtolower( $singular ) );

	$labels = array(
		'name'                  => _x( 'Publikationen', 'Publikation General Name', 'sitemuduru' ),
		'singular_name'         => _x( 'Publikation', 'Publikation Singular Name', 'sitemuduru' ),
		'menu_name'             => _x( 'Publikationen', 'sitemuduru' ),
		'name_admin_bar'        => _x( 'Publikation', 'sitemuduru' ),
		'archives'              => __( 'Item Archives', 'sitemuduru' ),
		'attributes'            => __( 'Item Attributes', 'sitemuduru' ),
		'parent_item_colon'     => __( 'Parent Item:', 'sitemuduru' ),
		'all_items'             => __( 'All Items', 'sitemuduru' ),
		'add_new_item'          => __( 'Add New Item', 'sitemuduru' ),
		'add_new'               => _x( 'Add New', 'sitemuduru' ),
		'new_item'              => __( 'New Item', 'sitemuduru' ),
		'edit_item'             => __( 'Edit Item', 'sitemuduru' ),
		'update_item'           => __( 'Update Item', 'sitemuduru' ),
		'view_item'             => __( 'View Item', 'sitemuduru' ),
		'view_items'            => __( 'View Items', 'sitemuduru' ),
		'search_items'          => __( 'Search Item', 'sitemuduru' ),
		'not_found'             => __( 'Not found', 'sitemuduru' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sitemuduru' ),
		'featured_image'        => __( 'Featured Image', 'sitemuduru' ),
		'set_featured_image'    => __( 'Set featured image', 'sitemuduru' ),
		'remove_featured_image' => __( 'Remove featured image', 'sitemuduru' ),
		'use_featured_image'    => __( 'Use as featured image', 'sitemuduru' ),
		'insert_into_item'      => __( 'Insert into item', 'sitemuduru' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'sitemuduru' ),
		'items_list'            => __( 'Items list', 'sitemuduru' ),
		'items_list_navigation' => __( 'Items list navigation', 'sitemuduru' ),
		'filter_items_list'     => __( 'Filter items list', 'sitemuduru' ),
	);
	$args = array(
		'labels'                => $labels,
		'description'           => __( 'Publikation Posts', 'sitemuduru' ),
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


	public function site_muduru_taxs(){

  $labels2 = array(
		'name'              => _x( 'Begriffe', 'sitemuduru' ),
		'singular_name'     => _x( 'Begriff', 'sitemuduru' ),
		'search_items'      => __( 'Search Begriffe', 'sitemuduru' ),
		'all_items'         => __( 'Alle Begriffe', 'sitemuduru' ),
		'edit_item'         => __( 'Edit Begriffe', 'sitemuduru' ),
		'update_item'       => __( 'Update Begriffe', 'sitemuduru' ),
		'add_new_item'      => __( 'Add New Begriffe', 'sitemuduru' ),
		'new_item_name'     => __( 'New Begriff Name', 'sitemuduru' ),
		'menu_name'         => __( 'Begriffe', 'sitemuduru' ),
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
