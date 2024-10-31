<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://pageproofer.com
 * @since      1.0.0
 *
 * @package    Pageproofer
 * @subpackage Pageproofer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pageproofer
 * @subpackage Pageproofer/admin
 * @author     Derrick Grigg <derrick@pageproofer.com>
 */
class Pageproofer_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
  }

  /**
   * Add to the admin settings menu
   */

  public function add_admin_menu()
  {
    add_options_page( 'PageProofer', 'PageProofer', 'manage_options', $this->plugin_name, array($this, 'options_page') );
  }

  /**
   * output the options page
   */

  public function options_page()
  {
    ?>
    <form action='options.php' method='post'>

      <div>&nbsp;</div>
      <img src="<?php echo plugins_url( './static/pageproofer-logo.svg', __FILE__ ); ?>" alt="PageProofer" height="50px">
      <h2>The easiest way to add feedback and track issues on your website.</h2>    
      <p>You need a PageProofer subscription to use this plugin. <a href="https://pageproofer.com/sign-up" target="_blank">Sign up </a> for a free trial if you do not have a subscription.</p>

      <?php
      settings_fields( 'pluginPage' );
      do_settings_sections( 'pluginPage' );
      submit_button();
      ?>
          
    </form>
    <?php
  }

  /**
   * options
   */

  public function settings_init()
  {
    register_setting( 'pluginPage', 'pageproofer_settings' );

    add_settings_section(
      'pageproofer_pluginPage_section',
      __( '', 'pageproofer' ),
      '',
      'pluginPage'
    );

    add_settings_field(
      'pageproofer_site_token',
      __( 'Api Key', 'pageproofer' ),
      array($this, 'pageproofer_site_token_render'),
      'pluginPage',
      'pageproofer_pluginPage_section'
    );

    add_settings_field(
      'pageproofer_checkbox_field_1',
      __( 'Enabled?', 'pageproofer' ),
      array($this, 'pageproofer_enabled_render'),
      'pluginPage',
      'pageproofer_pluginPage_section'
    );

  }

  /**
   * api key field
   */

  public function pageproofer_site_token_render(  ) {

    $options = get_option( 'pageproofer_settings' );
    ?>
    <input type='text' name='pageproofer_settings[pageproofer_site_key]' value='<?php echo isset($options['pageproofer_site_key']) ? $options['pageproofer_site_key'] : '' ; ?>' size="40">
    <p class="description">Visit <a href="https://app.pageproofer.com" target="_blank">https://app.pageproofer.com</a>, go to the site settings, click on the "javascript embed" to get your unique site api key.<br/>If you need additional help visit our <a href="https://pageproofer.com/help/how-can-i-add-pageproofer-to-my-wordpress-site" target="_blank">WordPress setup guide.</a></p>

    <?php

  }

  /**
   * enabled field
   */

  public function pageproofer_enabled_render(  ) {
    $options = get_option( 'pageproofer_settings' );
    $enabled = array_key_exists("pageproofer_enabled", $options) ? $options["pageproofer_enabled"] : 0;
    ?>
    <input type='checkbox' name='pageproofer_settings[pageproofer_enabled]' <?php checked( $enabled, 1 ); ?> value='1'>
    <?php
  }

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pageproofer-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pageproofer-admin.js', array( 'jquery' ), $this->version, false );

	}

}
