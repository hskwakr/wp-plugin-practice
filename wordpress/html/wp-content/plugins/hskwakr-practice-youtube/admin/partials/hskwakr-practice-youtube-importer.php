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
