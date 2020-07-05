<?php

/**
 * Define the internationalization functionality for translations
 *
 * @link       http://wordpress.org/plugins/site-muduru/
 * @since      1.0.0
 *
 * @package    site_muduru
 * @subpackage site_muduru/includes
 */

class Site_Muduru_i18n
{

	public function load_plugin_textdomain()
	{

		load_plugin_textdomain(
			'site-muduru',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}
}
