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
            settings_fields('hskwakr-practice-youtube-custom-settings');
            do_settings_sections('hskwakr-practice-youtube-custom-settings');
          ?>

          <div class="mb-3">
            <label for="hskwakrYoutubeAPIKey">YouTube API Key</label>
            <input type="text" name="hskwakrYoutubeAPIKey" value="<?php echo get_option('hskwakrYoutubeAPIKey'); ?>" class="form-control" id="youtubeapikey" placeholder="Your YouTube API Key">
          </div>

          <div class="mb-3">
            <label for="hskwakrYoutubeChannelId">YouTube Channel ID</label>
            <input type="text" name="hskwakrYoutubeChannelId" value="<?php echo get_option('hskwakrYoutubeChannelId'); ?>" class="form-control" id="youtubechannelid" placeholder="Your YouTube Channel ID">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div> 

<?php

$youtube_api_url = 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=';
$youtube_api_max = '5';
$youtube_api_key = get_option('hskwakrYoutubeAPIKey');

$youtube_channel_id = get_option('hskwakrYoutubeChannelId');

$youtube_api_query =
  $youtube_api_url .
  $youtube_channel_id .
  '&maxResults=' .
  $youtube_api_max .
  '&key=' .
  $youtube_api_key .
  '';

$video_list = json_decode(file_get_contents($youtube_api_query));

// sort through the items and output
foreach ($video_list->items as $item) {
    echo '<div style="border:2px solid black;">';
    echo $item->snippet->title . '<br>';
    echo $item->snippet->description . '<br>';
    echo '<img src="' . $item->snippet->thumbnails->medium->url . '"><br>';
    echo '</div><br>';
}

?>
