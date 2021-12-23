<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/hskwakr/wp-plugin-practice
 * @since      1.0.0
 *
 * @package    Hskwakr_Practice_Youtube
 * @subpackage Hskwakr_Practice_Youtube/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Hskwakr_Practice_Youtube
 * @subpackage Hskwakr_Practice_Youtube/includes
 * @author     hskwakr <33633391+hskwakr@users.noreply.github.com>
 */
class Hskwakr_Practice_Youtube_Activator
{
    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        // create a new cron job
        if (!wp_next_scheduled('hpy_video_updater')) {
            wp_schedule_event(time(), 'daily', 'hpy_video_update');
        }
    }
}
