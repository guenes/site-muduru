<?php

/**
 * Fired on plugins loaded
 *
 * @link       http://wordpress.org/plugins/site-muduru/
 * @since      1.0.0
 *
 * @package    site_muduru
 * @subpackage site_muduru/includes
 */


class site_muduru_Updater
{
  //Runs on activation
  public static function update()
  {
    if (site_muduru_VERSION !== get_option('site_muduru_version')) {
      //update_option( 'site_muduru_version', site_muduru_VERSION );
      //do stuff on plugin update
    }
  }
}
