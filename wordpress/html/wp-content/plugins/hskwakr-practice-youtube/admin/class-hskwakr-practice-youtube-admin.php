<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/hskwakr/wp-plugin-practice
 * @since      1.0.0
 *
 * @package    Hskwakr_Practice_Youtube
 * @subpackage Hskwakr_Practice_Youtube/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hskwakr_Practice_Youtube
 * @subpackage Hskwakr_Practice_Youtube/admin
 * @author     hskwakr <33633391+hskwakr@users.noreply.github.com>
 */
class Hskwakr_Practice_Youtube_Admin
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $hskwakr_practice_youtube    The ID of this plugin.
     */
    private $hskwakr_practice_youtube;

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
     * @param      string    $hskwakr_practice_youtube       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($hskwakr_practice_youtube, $version)
    {
        $this->hskwakr_practice_youtube = $hskwakr_practice_youtube;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Hskwakr_Practice_Youtube_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Hskwakr_Practice_Youtube_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->hskwakr_practice_youtube, plugin_dir_url(__FILE__) . 'css/hskwakr-practice-youtube-admin.css', array(), $this->version, 'all');

        // bootstrap
        wp_enqueue_style($this->hskwakr_practice_youtube . '-bootstrap-css', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Hskwakr_Practice_Youtube_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Hskwakr_Practice_Youtube_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->hskwakr_practice_youtube, plugin_dir_url(__FILE__) . 'js/hskwakr-practice-youtube-admin.js', array( 'jquery' ), $this->version, false);

        // bootstrap
        wp_enqueue_script($this->hskwakr_practice_youtube . '-bootstrap-js', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false);
    }

    /**
     * Add our custom menu.
     *
     * @since    1.0.0
     */
    public function my_admin_menu()
    {
        add_menu_page(
            'hskwakr Youtube General Settings',
            'Settings',
            'manage_options',
            'hskwakr-practice-youtube-general-settings.php',
            array( $this, 'my_plugin_admin_page' ),
            'dashicons-tickets',
            250
        );

        add_submenu_page(
            'hskwakr-practice-youtube-general-settings.php',
            'hskwakr Youtube Importer',
            'Importer',
            'manage_options',
            'hskwakr-practice-youtube-importer.php',
            array( $this, 'my_plugin_youtube_importer' )
        );
    }

    public function my_plugin_admin_page()
    {
        require_once 'partials/hskwakr-practice-youtube-admin-display.php';
    }

    public function my_plugin_youtube_importer()
    {
        require_once 'partials/hskwakr-practice-youtube-importer.php';
    }

    /**
     * Add our custom menu.
     *
     * @since    1.0.0
     */
    public function register_my_plugin_general_settings()
    {
        // registers all settings
        register_setting('hskwakr-practice-youtube-custom-settings', 'hskwakrYoutubeAPIKey');
        register_setting('hskwakr-practice-youtube-custom-settings', 'hskwakrYoutubeChannelId');
    }
}
