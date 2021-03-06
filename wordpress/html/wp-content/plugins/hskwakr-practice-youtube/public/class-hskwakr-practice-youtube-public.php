<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/hskwakr/wp-plugin-practice
 * @since      1.0.0
 *
 * @package    Hskwakr_Practice_Youtube
 * @subpackage Hskwakr_Practice_Youtube/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Hskwakr_Practice_Youtube
 * @subpackage Hskwakr_Practice_Youtube/public
 * @author     hskwakr <33633391+hskwakr@users.noreply.github.com>
 */
class Hskwakr_Practice_Youtube_Public
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
     * @param      string    $hskwakr_practice_youtube       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($hskwakr_practice_youtube, $version)
    {
        $this->hskwakr_practice_youtube = $hskwakr_practice_youtube;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
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

        wp_enqueue_style($this->hskwakr_practice_youtube, plugin_dir_url(__FILE__) . 'css/hskwakr-practice-youtube-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
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

        wp_enqueue_script($this->hskwakr_practice_youtube, plugin_dir_url(__FILE__) . 'js/hskwakr-practice-youtube-public.js', array( 'jquery' ), $this->version, false);
    }

    /**
     * Output video shortcode function
     *
     */
    public function hpy_display_videos()
    {
        $output = '';

        $the_post_count = get_option('hskwakr_post_count');
        $cpt_name = 'videos-hpy';
        $all_video_posts = get_posts(array(
            'post_type' => $cpt_name,
            'numberposts' => $the_post_count,
        ));

        foreach ($all_video_posts as $post) {
            $output = $output . '<div>';
            $output = $output .
                '<a target="_blank" href="https://www.youtube.com/watch/?v=' .
                $post->hpy_video_id .
                '"><img src="' .
                $post->hpy_img_res_med .
                '"></a>';
            //$output = $output . '<p>' . $post->hpy_y_title . '</p>';
            //$output = $output . '<p>' . $post->hpy_video_id . '</p>';
            $output = $output . '</div>';
        }

        return $output;
    }
}
