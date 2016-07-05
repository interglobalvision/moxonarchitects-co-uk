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

}
?>
