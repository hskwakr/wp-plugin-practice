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

// get this page
$the_current_page = $_GET['page'];
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container" style="max-width:100%; text-align:center;">
  <div class="m-3 row alert alert-primary">
    <div class="col">
      <div style="height:5rem;">
        <h4>Import all YouTube videos</h4>
      </div>

      <form method="GET" action="">
        <input type="hidden" name="page" value="<?php echo $the_current_page; ?>">
        <input type="hidden" name="action" value="import">
        <button type="submit" class="btn btn-lg btn-success">Import</button>
      </form>
    </div>

    <div class="col">
      <div style="height:5rem;">
        <h4>Renew / Update YouTube videos</h4>
      </div>

      <form method="GET" action="">
        <input type="hidden" name="page" value="<?php echo $the_current_page; ?>">
        <input type="hidden" name="action" value="renew">
        <button type="submit" class="btn btn-lg btn-warning">Renew</button>
      </form>
    </div>

    <div class="col">
      <div style="height:5rem;">
        <h4>Delete all YouTube videos</h4>
      </div>

      <form method="GET" action="">
        <input type="hidden" name="page" value="<?php echo $the_current_page; ?>">
        <input type="hidden" name="action" value="delete">
        <button type="submit" class="btn btn-lg btn-danger">Delete All</button>
      </form>
    </div>
  </div>
</div>

<?php

//=====================================
// GET & POST
//=====================================
// get the action
$the_action = isset($_GET['action']) ? $_GET['action'] : '';  // initialize variable

//=====================================
// Variables
//=====================================
// flag
$is_imported = false;       // determine if the user imported
$is_deleted = false;        // determine if the user deleted
$is_renewed = false;        // determine if the user renewed
$is_failed = false;         // determine if the action failed

$cpt_name = 'videos-hpy';

//=====================================
// Functions
//=====================================
function get_video_list()
{
    $youtube_api_url = 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=';
    $youtube_api_max = '5';
    $youtube_api_key = get_option('hskwakr_youtube_apikey');

    $youtube_channel_id = get_option('hskwakr_youtube_channelid');

    $youtube_api_query =
        $youtube_api_url .
        $youtube_channel_id .
        '&maxResults=' .
        $youtube_api_max .
        '&key=' .
        $youtube_api_key .
        '';

    $return = json_decode(file_get_contents($youtube_api_query));
    return $return;
}

// add videos as custom post type
function register_youtube_video($item, $cpt_name)
{
    $return = false;

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
        add_post_meta($new_post_id, 'hpy_video_id', $item->id->videoId);
        add_post_meta($new_post_id, 'hpy_published_at', $item->snippet->publishedAt);
        add_post_meta($new_post_id, 'hpy_channel_id', $item->snippet->channelId);
        add_post_meta($new_post_id, 'hpy_y_title', $item->snippet->title);
        add_post_meta($new_post_id, 'hpy_y_description', $item->snippet->description);
        add_post_meta($new_post_id, 'hpy_img_res_med', $item->snippet->thumbnails->medium->url);
        add_post_meta($new_post_id, 'hpy_img_res_high', $item->snippet->thumbnails->high->url);

        $return = true;

        // DEBUG: output the med res img
            //echo '<img src="' . get_post_meta($new_post_id, 'hpy_img_res_med', true) . '">';
    }

    return $return;
}


//=====================================
// Start IMPORT action
//=====================================
if ($the_action == 'import') {
    $video_list = get_video_list();

    // loop through the videos
    foreach ($video_list->items as $item) {
        $is_imported = register_youtube_video($item, $cpt_name);
    }
}
//=====================================
// End IMPORT action
//=====================================

//=====================================
// Start RENEW action
//=====================================
if ($the_action == 'renew') {
    // get all video posts
    $cpt_name = 'videos-hpy';
    $all_video_posts = get_posts(array(
        'post_type' => $cpt_name,
        'numberposts' => 2500,
    ));

    $old_video_list = ',';   // the group of video id to compare old and new

    // check if there are any videos to update
    if (count($all_video_posts) > 0) {
        foreach ($all_video_posts as $post) {
            if ($post->hpy_video_id != '') {
                $old_video_list = $old_video_list . $post->hpy_video_id . ',';
            }
        }

        // get new videos to compare
        $new_video_list = get_video_list();
        foreach ($new_video_list->items as $item) {
            // determine if we already have the video
            $is_exist = strpos($old_video_list, $item->id->videoId);
        }

        if ($is_exist === false) {
            // add the video because it was not found in our database
            $result = register_youtube_video($item, $cpt_name);
            if ($result == false) {
                $is_renewed = true;
                $is_failed = true;
            } else {
                $is_renewed = true;
            }
        }
    } else {
        $is_failed = true;
    }
}
//=====================================
// End RENEW action
//=====================================

//=====================================
// Start DELETE action
//=====================================
if ($the_action == 'delete') {
    // delete all videos with our custom post type
    $all_video_posts = get_posts(array(
      'post_type' => $cpt_name,
      'numberposts' => 100,
    ));

    if (count($all_video_posts) > 0) {
        // loop through and delete all posts
        foreach ($all_video_posts as $post) {
            $result = wp_delete_post($post->ID, true);

            if ($result != false) {
                $is_deleted = true;
            } else {
                $is_deleted = true;
                $is_failed = true;
            }
        }
    } else {
        $is_failed = true;
    }
}
//=====================================
// End DELETE action
//=====================================

?>

<!-- output user action complete -->
<div class="container" style="max-width:100%; text-align:center;">
<?php if ($is_imported) : ?>

<br><br>
<div class="alert alert-success">
  <h2>You have successfully imported YouTube videos!</h2>
</div>

<?php elseif ($is_renewed && !$is_failed) : ?>

<br><br>
<div class="alert alert-success">
  <h2>You have successfully renewed YouTube videos from database!</h2>
</div>

<?php elseif ($is_renewed && $is_failed) : ?>

<br><br>
<div class="alert alert-danger">
  <h2>Failed to renew...</h2>
</div>

<?php elseif ($is_deleted && !$is_failed) : ?>

<br><br>
<div class="alert alert-success">
  <h2>You have successfully deleted YouTube videos from database!</h2>
</div>

<?php elseif ($is_deleted && $is_failed) : ?>

<br><br>
<div class="alert alert-danger">
  <h2>Failed to delete...</h2>
</div>

<?php endif ?>

<?php if (!$is_renewed && !$is_deleted && $is_failed) : ?>

<br><br>
<div class="alert alert-warning">
  <h2>You need to click import first!</h2>
</div>

<?php endif ?>
</div>
