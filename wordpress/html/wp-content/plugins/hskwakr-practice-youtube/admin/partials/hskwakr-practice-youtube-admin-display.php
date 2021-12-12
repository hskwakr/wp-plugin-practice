<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/hskwakr/wp-plugin-practice
 * @since      1.0.0
 *
 * @package    Hskwakr_Practice_Youtube
 * @subpackage Hskwakr_Practice_Youtube/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1 class="m-3">General Settings</h1><br><hr>

<div class="container" style="max-width:100%;">
  <div class="row">
    <div class="col">
      <div class="alert alert-warning">
        <h1>YouTube API Importer</h1>
        <p class="lead">Use this section to save your API key and channel ID for video imports.</p> 
        <hr class="my-4">
        <form method="POST" action="options.php">

<?php
settings_fields('hskwakr_practice_youtube_custom_settings');
do_settings_sections('hskwakr_practice_youtube_custom_settings');
?>

          <div class="mb-3">
            <label for="hskwakr_youtube_apikey">YouTube API Key</label>
            <input type="text" name="hskwakr_youtube_apikey" value="<?php echo get_option('hskwakr_youtube_apikey'); ?>" class="form-control" id="youtubeapikey" placeholder="Your YouTube API Key">
          </div>

          <div class="mb-3">
            <label for="hskwakr_youtube_channelid">YouTube Channel ID</label>
            <input type="text" name="hskwakr_youtube_channelid" value="<?php echo get_option('hskwakr_youtube_channelid'); ?>" class="form-control" id="youtubechannelid" placeholder="Your YouTube Channel ID">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

    <div class="col">
      <div class="alert alert-success">
        <h1>ShortCode Imformation</h1>
        <p class="lead">To output videos simply use this shortcode: " [wp10yvidsout] "</p> 
        <hr class="my-4">
        <form method="POST" action="options.php">

<?php
settings_fields('hskwakr_practice_youtube_shortcode_settings');
do_settings_sections('hskwakr_practice_youtube_shortcode_settings');
?>

          <div class="mb-3">
            <label for="hskwakr_youtube_apikey">YouTube API Key</label>
            <input type="text" name="hskwakr_youtube_apikey" value="<?php echo get_option('hskwakr_youtube_apikey'); ?>" class="form-control" id="youtubeapikey" placeholder="Your YouTube API Key">
          </div>

          <div class="mb-3">
            <label for="hskwakr_youtube_apikey">YouTube API Key</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
