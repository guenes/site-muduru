<?php
/**
 * Fired during plugin deactivation
 *
 * @link       http://wordpress.org/plugins/site-muduru/
 * @since      1.0.0
 *
 * @package    site_mudur
 * @subpackage site_mudur/includes
 **/

class Site_Muduru_Site_Collection {

	private $site_muduru;
	private $version;

	/**
	 * @param $site_muduru
	 * @param $version
	 */
	public function __construct( $site_muduru, $version ) {
		$this->site_muduru = $site_muduru;
		$this->version     = $version;
	}

	/**************************************************************************************
	* Eneble short code        supoort Register Theme Features
	 ***********************************************************************************/

	function site_muduru_theme_support() {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside' ) );
		add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
		set_post_thumbnail_size( 160, 222, true );

		$background_args = array(
			'default-color'          => 'efefef',
			'default-image'          => '',
			'default-repeat'         => '',
			'default-position-x'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $background_args );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery' ) );
		add_theme_support( 'title-tag' );
		add_editor_style( 'tiny.css' );
		load_theme_textdomain( 'sitemudur', get_template_directory() . '/language' );
	}


	/***********************************************************************************
	 * Register Nav Menu
	 ***********************************************************************************/

	function site_muduru_register_custom_nav() {

		$locations = array(
			'haupt-nav' => __( 'Haupt-Navi', 'sitemudur' ),
			'top-nav'   => __( 'Top-Navi', 'sitemudur' ),
		);
		register_nav_menus( $locations );
	}



	/***********************************************************************************
	 * Show Custom Pages on front Page
	 ***********************************************************************************/

	function site_muduru_add_post_types_to_query( $query ) {
		if ( is_home() && $query->is_main_query() ) {
			$query->set( 'post_type', array( 'post', 'buch', 'heft' ) );
		}
		return $query;
	}


	/***********************************************************************************
	 *  Add image sizes
	 ***********************************************************************************/

	function site_muduru_add_image_size() {
		add_image_size( 'thumbnail', 140, 185, false );
		add_image_size( 'medium', 242, 336, true );
		add_image_size( 'large', 384, 524, true );
		add_image_size( 'feature-image', 394, 540, true );
		set_post_thumbnail_size( 242, 336, true );
	}


	/***********************************************************************************
	 * Add Categories for Attachments
	 **********************************************************************************
	 */

	function site_muduru_add_categories_for_attachments() {
		register_taxonomy_for_object_type( 'category', 'attachment' );

	}


}
