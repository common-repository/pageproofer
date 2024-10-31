<?php

/**
 * Fired during plugin activation
 *
 * @link       https://pageproofer.com
 * @since      1.0.0
 *
 * @package    Pageproofer
 * @subpackage Pageproofer/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Pageproofer
 * @subpackage Pageproofer/includes
 * @author     Derrick Grigg <derrick@pageproofer.com>
 */
class Pageproofer_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
  public static function activate()
  {
    add_option('pageproofer_settings', ['pageproofer_site_token' => '', 'pageproofer_enabled' => '1']);
	}

}
