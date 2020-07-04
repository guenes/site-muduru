<?php

/**
 * GW Site functions collections
 * @link       http://g.minas.org/contact
 * @since      1.0.0
 * @package    gwsf
 * @subpackage gwsf/includes
 */


/**********************************************************************************
 * Eneble short code        supoort
 ***********************************************************************************/
add_filter('the_content', 'do_shortcode', 15);
add_filter('widget_text', 'do_shortcode', 15);

// Register Theme Features
function gwsf_theme_support()
{
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats', array('status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside'));
	add_theme_support('post-thumbnails', array('post', 'page'));
	set_post_thumbnail_size(160, 222, true);
	$background_args = array(
		'default-color'          => 'efefef',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support('custom-background', $background_args);
	add_theme_support('html5', array('search-form', 'comment-form', 'gallery'));
	add_theme_support('title-tag');
	add_editor_style('tiny.css');
	load_theme_textdomain('gwsf', get_template_directory() . '/language');
}
add_action('after_setup_theme', 'gwsf_theme_support');


/***********************************************************************************
 * Add Lead Class to First Paragraph
 ***********************************************************************************/
function gwsf_first_paragraph($content)
{
	return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter('the_content', 'gwsf_first_paragraph');


/***********************************************************************************
 * Register Nav Menu
 ***********************************************************************************/

// Register Navigation Menus
function gwsf_register_custom_nav()
{

	$locations = array(
		'haupt-nav' => __('Haupt-Navi', 'gwsf'),
		'top-nav' => __('Top-Navi', 'gwsf'),
	);
	register_nav_menus($locations);
}
add_action('init', 'gwsf_register_custom_nav');


/***********************************************************************************
 * Register AFC
 ***********************************************************************************/

function msf_replace_featured_image_filter($html)
{
	// Try to find custom field value
	$walu = get_post_custom_values('gw-image');

	$image = wp_get_attachment_image_src($walu[0], 'medium');
	var_dump($image);

	// If it has a value, return it
	if ('' != $image) {
		return '<img src="' . $image[0] . '" />';
	}
	// otherwise, just return the original post thumbnail html
	else {
		return $html;
	}
}
//add_filter( 'post_thumbnail_html', 'gw_replace_featured_image_filter', 10, 2 );



/***********************************************************************************
 * Register SiteBar Widget
 ***********************************************************************************/



/***********************************************************************************
 * Show Custom Pages on front Page
 ***********************************************************************************/
add_action('pre_get_posts', 'gwsf_add_post_types_to_query');
function gwsf_add_post_types_to_query($query)
{
	if (is_home() && $query->is_main_query())
		$query->set('post_type', array('post', 'flugblatt', 'heft'));
	return $query;
}


/***********************************************************************************
 *  Add image sizes
 ***********************************************************************************/
function gwsf_add_image_size()
{
	add_image_size('thumbnail', 160, 225, false);
	add_image_size('medium', 222, 316, true);
	add_image_size('large', 344, 484, true);
	add_image_size('feature-image', 394, 534, true);
}
add_action('init', 'gwsf_add_image_size');
