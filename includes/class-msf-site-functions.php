<?php
/**
 * GW Site functions collections
 * @link       http://g.minas.org/contact
 * @since      1.0.0
 * @package    msf
 * @subpackage msf/includes
 */

class msf_site_collection {

	private $plugin_name;
	private $version;


	/**
	 * @param $plugin_name
	 * @param $version
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/***********************************************************************************
	 *  Add image sizes
	 ***********************************************************************************/
	public function msf_add_image_size() {
		add_image_size( 'thumbnail', 140, 185, false );
		add_image_size( 'medium', 242, 336, true );
		add_image_size( 'large', 384, 524, true );
		add_image_size( 'feature-image', 394, 540, true );
		set_post_thumbnail_size( 242, 336, true );
	}


	/***********************************************************************************
	 * Add nav Menu area
	 **********************************************************************************
	 */

	public function msf_menu() {

		$locations = array(
			'unten' => __( 'unten', 'text_domain' )
		);
		register_nav_menus( $locations );

	}

	/***********************************************************************************
	 * Add Categories for Attachments
	 **********************************************************************************
	 */

	public function msf_add_categories_for_attachments() {
	register_taxonomy_for_object_type( 'category', 'attachment' );
	}

	/***********************************************************************************
	 * add_post_type_support Class name of the subtitle plugin
	 **********************************************************************************
	 */
	public function msf_wp_subtitle_page_part_support() {
	add_post_type_support( 'publikation', 'gw-subtitel' );
	}

	/***********************************************************************************
	* Register footer area
	***********************************************************************************/


/*


	/***********************************************************************************
	 * subtitel
	 **********************************************************************************
	 */


	/**
	 * Get the Subtitle
	 *
	 * @uses  apply_filters( 'gw-titel' )
	 *
	 * @param array|string $args Display parameters.
	96 *
	 * @return string The filtered subtitle meta value.

	public function get_gwsubtitel( $args = '' ) {

		if ( $post_id  ) {

			$args = wp_parse_args( $args, array(
				'before' => '',
				'after'  => ''
			) );

			$gwsubtitel = apply_filters( 'gw-titel', $this->get_raw_gwsubtitel(), get_post( $this->post_id ) );

			if ( ! empty( $gwsubtitel ) ) {
				$gwsubtitel = $args['before'] . $gwsubtitel . $args['after'];
			}

			return $gwsubtitel;

		}

		return '';

	}

	/**
	 * Get Raw Subtitle
	 *
	 * @return  string  The subtitle meta value.

	public function get_raw_gwsubtitel() {

		return get_post_meta( $this->post_id, $this->get_post_meta_key(), true );

	}

	/**
	 * Get Default Subtitle
	 *
	 * @since  2.8
	 *
	 * @return  string  Default title.

	public function get_default_gwsubtitel() {

		return apply_filters( 'msf_default_gwsubtitel', '', $this->post_id );

	}


	private function get_post_meta_key() {

		return apply_filters( 'msf_gwsubtitel_key', 'gw-titel', $this->post_id );

	}

	public static function _get_post_meta_key( $post_id = 0 ) {

		return apply_filters( 'msf_gwsubtitel_key', 'gw-titel', $post_id );

	}
*/

} // class
