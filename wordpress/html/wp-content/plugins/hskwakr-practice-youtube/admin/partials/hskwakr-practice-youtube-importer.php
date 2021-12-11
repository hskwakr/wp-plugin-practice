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

<?php
if (isset($_GET['var1'])) {
    $new_var1 = $_GET['var1'];
}

if ($new_var1 == 'yes') {
    ?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
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
    do_settings_sections('hskwakr-practice-youtube-custom-settings'); ?>

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
}
?>

<?php

/*
$cpt_name = 'videos-hpy';

$youtube_api_url = 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=';
$youtube_api_max = '1';
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

// loop through the videos
foreach ($video_list->items as $item) {
    // add videos as custom post type

    // insert a new post type
    $data = array(
      'post_title' => $item->snippet->title,
      'post_content' => $item->snippet->description,
      'post_status' => 'publish',
      'post_type' => $cpt_name
    );

    // insert into DB
    $result = wp_insert_post($data);

    // capture the ID of the post
    if ($result && ! is_wp_error($result)) {
        $new_post_id = $result;

        // add youtube meta data
        add_post_meta($new_post_id, 'hpy_video_id', $item->id);
        add_post_meta($new_post_id, 'hpy_published_at', $item->snippet->publishedAt);
        add_post_meta($new_post_id, 'hpy_channel_id', $item->snippet->channelId);
        add_post_meta($new_post_id, 'hpy_y_title', $item->snippet->title);
        add_post_meta($new_post_id, 'hpy_y_description', $item->snippet->description);
        add_post_meta($new_post_id, 'hpy_img_res_med', $item->snippet->thumbnails->medium->url);
        add_post_meta($new_post_id, 'hpy_img_res_high', $item->snippet->thumbnails->high->url);

        // DEBUG: output the med res img
        echo '<img src="' . get_post_meta($new_post_id, 'hpy_img_res_med', true) . '">';
    }
}
*/
?>
