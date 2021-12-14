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

$the_youtube_apikey = get_option('hskwakr_youtube_apikey');
$the_youtube_channelid = get_option('hskwakr_youtube_channelid');
?>

          <div class="mb-3">
            <label for="hskwakr_youtube_apikey">YouTube API Key</label>
            <input type="text" name="hskwakr_youtube_apikey" value="<?php echo $the_youtube_apikey; ?>" class="form-control" id="hskwakr_youtube_apikey" placeholder="Your YouTube API Key">
          </div>

          <div class="mb-3">
            <label for="hskwakr_youtube_channelid">YouTube Channel ID</label>
            <input type="text" name="hskwakr_youtube_channelid" value="<?php echo $the_youtube_channelid; ?>" class="form-control" id="hskwakr_youtube_channelid" placeholder="Your YouTube Channel ID">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

    <div class="col">
      <div class="alert alert-success">
        <h1>ShortCode Imformation</h1>
        <p class="lead">To output videos simply use this shortcode: " [hpy_display_videos] "</p>
        <hr class="my-4">
        <form method="POST" action="options.php">

<?php
settings_fields('hskwakr_practice_youtube_shortcode_settings');
do_settings_sections('hskwakr_practice_youtube_shortcode_settings');

$the_post_count = get_option('hskwakr_post_count');
$the_video_type = get_option('hskwakr_video_styletype');
?>

          <div class="mb-3">
            <label for="hskwakr_post_count">Number of videos to show</label>
            <input type="number" name="hskwakr_post_count" value="<?php echo $the_post_count; ?>" class="form-control" id="hskwakr_post_count" placeholder="">
          </div>

          <div class="mb-3">
            <label for="hskwakr_video_styletype">Display type</label>
            <select name="hskwakr_video_styletype" class="form-select" id="hskwakr_video_styletype">
              <option <?php if ($the_video_type == 'Image Center'): echo 'selected'; endif?>>
                Image Center
              </option>
              <option <?php if ($the_video_type == 'Image Left'): echo 'selected'; endif?>>
                Image Left
              </option>
              <option <?php if ($the_video_type == 'Image Right'): echo 'selected'; endif?>>
                Image Right
              </option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Save shortCode changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
