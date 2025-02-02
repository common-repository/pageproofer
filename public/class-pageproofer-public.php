<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://pageproofer.com
 * @since      1.0.0
 *
 * @package    Pageproofer
 * @subpackage Pageproofer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pageproofer
 * @subpackage Pageproofer/public
 * @author     Derrick Grigg <derrick@pageproofer.com>
 */
class Pageproofer_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pageproofer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pageproofer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
  public function enqueue_scripts()
  {
    add_action( 'wp_footer', array($this, 'pageproofer_script') );
  }

  public function pageproofer_script()
  {

	$is_admin = is_admin();

	if ( $is_admin ) {
	  return;
   }

   $options = get_option( 'pageproofer_settings');
   $enabled = isset($options['pageproofer_enabled']) ? ((int)$options['pageproofer_enabled'] == 1 ? true : false) : false;
   $apiKey = isset($options['pageproofer_site_key']) ? trim($options['pageproofer_site_key']) : false;

   if (!$enabled){
      return;
   }

	if (!$apiKey) {
		return;
	}

	echo "<script type=\"text/javascript\" src=\"//app.pageproofer.com/embed/" . $apiKey . "\" defer=\"true\"></script>";
  }

}
