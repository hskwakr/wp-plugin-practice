<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '-bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add our custom menu
	 *
	 * @since    1.0.0
	 */
	public function my_admin_menu() {
    add_menu_page(
      'New Plugin Title',
      'Plugin Sttings',
      'manage_options',
      'plugin-name-mainsettings.php',
      array( $this, 'myplugin_admin_page' ),
      'dashicons-tickets',
      250
    );

    add_submenu_page(
      'plugin-name-mainsettings.php',
      'My Sub Level Menu Example',
      'Sub Level Menu',
      'manage_options',
      'plugin-name-importer.php',
      array( $this, 'myplugin_admin_subpage' )
    );
  }

  /**
   * undocumented function
   *
   * @return result views
   */
  public function myplugin_admin_page()
  {
    require_once 'partials/plugin-name-admin-display.php';
  }
  
  /**
   * undocumented function
   *
   * @return result views
   */
  public function myplugin_admin_subpage()
  {
    require_once 'partials/plugin-name-admin-display-submenu.php';
  }

  /**
   * Register custom fields for plugin settings
   *
   * @return result views
   */
  public function register_plugin_name_general_settings()
  {
    // register all settings for general settings page
    register_setting( 'plugin_name_custom_settings', 'theemail' );
    register_setting( 'plugin_name_custom_settings', 'thedays' );
    register_setting( 'plugin_name_custom_settings', 'themultiselect' );
  }

}
