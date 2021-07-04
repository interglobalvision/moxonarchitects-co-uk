<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
$args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
) );
$posts = get_posts( $args );
$post_options = array();
if ( $posts ) {
    foreach ( $posts as $post ) {
        $post_options [ $post->ID ] = $post->post_title;
    }
}
return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
   */

  $news_meta = new_cmb2_box( array(
    'id'            => $prefix . 'news_metabox',
    'title'         => __( 'News Metabox', 'cmb2' ),
    'object_types'  => array( 'post', ), // Post type
  ) );

  $news_meta->add_field( array(
    'name'       => __( 'Show content in draw not popup', 'cmb2' ),
    'desc'       => __( '...', 'cmb2' ),
    'id'         => $prefix . 'draw_post',
    'type'       => 'checkbox',
  ) );

  $contact_page = get_page_by_title('Contact');
  if ($contact_page) {
    $contact_page_id = $contact_page->ID;
  } else {
    $contact_page_id = null;
  }

  $project_meta = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Project Metabox', 'cmb2' ),
    'object_types'  => array( 'project', ), // Post type
    // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );

  $project_meta->add_field( array(
    'name'       => __( 'Project Gallery', 'cmb2' ),
    'desc'       => __( '...', 'cmb2' ),
    'id'         => $prefix . 'gallery',
    'type'       => 'pw_gallery',
    'sanitization_cb' => 'pw_gallery_field_sanitise',
    'preview_size' => array( 150, 150 ),
  ) );
  
  $project_videos = $project_meta->add_field( array(
    'id'          => $prefix . 'project_videos',
    'type'        => 'group',
    'description' => __( 'Adds videos to the gallery at the specified index', 'cmb2' ),
    'options'     => array(
      'group_title'       => __( 'Video {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
      'add_button'        => __( 'Add Another Video', 'cmb2' ),
      'remove_button'     => __( 'Remove Video', 'cmb2' ),
      'sortable'          => false,
    ),
  ) );

  // Id's for group's fields only need to be unique for the group. Prefix is not needed.
  $project_meta->add_group_field( $project_videos, array(
    'name' => 'Video Index',
    'description' => 'The position relative to the gallery images to show the video. 1 is before any images. 3 is after the 2nd image. etc',
    'id'   => 'index',
    'type' => 'text',
  ) );
  
  $project_meta->add_group_field( $project_videos, array(
    'name' => 'Video',
    'id'   => 'video',
    'type' => 'file',
  ) );

  $contact_page_meta = new_cmb2_box( array(
    'id'            => $prefix . 'contact_page_metabox',
    'title'         => __( 'Contact Page Metabox', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    'show_on'      => array( 'key' => 'id', 'value' => $contact_page_id),
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );

  $contact_page_meta->add_field( array(
    'name'       => __( 'Map popup for London', 'cmb2' ),
    'desc'       => __( '...', 'cmb2' ),
    'id'         => $prefix . 'map_london',
    'type'       => 'wysiwyg',
  ) );

  $contact_page_meta->add_field( array(
    'name'       => __( 'Map popup for Scotland', 'cmb2' ),
    'desc'       => __( '...', 'cmb2' ),
    'id'         => $prefix . 'map_scotland',
    'type'       => 'wysiwyg',
  ) );


  $people_meta = new_cmb2_box( array(
		'id'            => $prefix . 'people_metabox',
		'title'         => __( 'People Metabox', 'cmb2' ),
		'object_types'  => array( 'people', ), // Post type
	) );

	$people_meta->add_field( array(
		'name'       => __( 'Title', 'cmb2' ),
		'desc'       => __( '', 'cmb2' ),
		'id'         => $prefix . 'title',
		'type'       => 'text',
	) );

	$people_meta->add_field( array(
		'name'       => __( 'Subline', 'cmb2' ),
		'desc'       => __( 'shows on People page', 'cmb2' ),
		'id'         => $prefix . 'subline',
		'type'       => 'text',
	) );

  $page_meta = new_cmb2_box( array(
		'id'            => $prefix . 'page_metabox',
		'title'         => __( 'Page Metabox', 'cmb2' ),
		'object_types'  => array( 'page', ), // Post type
	) );

	$page_meta->add_field( array(
		'name'       => __( 'Front Page video (webm)', 'cmb2' ),
		'desc'       => __( 'webm compressed front page video. Better encoded without any audio. No size restriction but aim for smallest file size possible', 'cmb2' ),
		'id'         => $prefix . 'video_webm',
		'type'       => 'file',
	) );

	$page_meta->add_field( array(
		'name'       => __( 'Front Page video (mp4)', 'cmb2' ),
		'desc'       => __( 'mp4 compressed front page video. This file is required for Safari', 'cmb2' ),
		'id'         => $prefix . 'video_mp4',
		'type'       => 'file',
	) );

}
?>
