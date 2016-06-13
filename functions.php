<?php

// Enqueue

function scripts_and_styles_method() {

  $templateuri = get_template_directory_uri() . '/js/';

  // library.js is to bundle plugins. my.js is your scripts. enqueue more files as needed
  $jslib = $templateuri . 'library.js';
  wp_enqueue_script( 'jslib', $jslib,'','',true);

  $myscripts = $templateuri . 'main.js';
  wp_register_script( 'myscripts', $myscripts );

  $is_admin = current_user_can('administrator') ? 1 : 0;

  if (is_page('Contact')) {
    $map_data = array();
    $contact_page = get_page_by_title('Contact');
    $meta = get_post_meta($contact_page->ID);

    if (!empty($meta['_igv_map_london'])) {
      $map_data['London'] = wpautop($meta['_igv_map_london'][0]);
    } else {
      $map_data['London'] = '';
    }

    if (!empty($meta['_igv_map_scotland'])) {
      $map_data['Scotland'] = wpautop($meta['_igv_map_scotland'][0]);
    } else {
      $map_data['Scotland'] = '';
    }
  } else {
    $map_data = null;
  }

  $jsVars = array(
    'siteUrl' => home_url(),
    'themeUrl' => get_template_directory_uri(),
    'isAdmin' => $is_admin,
    'mapData' => $map_data
  );

  wp_localize_script( 'myscripts', 'WP', $jsVars );
  wp_enqueue_script( 'myscripts', $myscripts,'','',true);

  // enqueue stylesheet here. file does not exist until stylus file is processed
  wp_enqueue_style( 'site', get_stylesheet_directory_uri() . '/css/site.css' );

  // dashicons for admin
  if(is_admin()){
    wp_enqueue_style( 'dashicons' );
  }

}
add_action('wp_enqueue_scripts', 'scripts_and_styles_method');


// Declare thumbnail sizes

get_template_part( 'lib/thumbnail-sizes' );


// Register Nav Menus
/*
register_nav_menus( array(
  'menu_location' => 'Location Name',
) );
*/

get_template_part( 'lib/custom-gallery' );
get_template_part( 'lib/post-types' );
get_template_part( 'lib/meta-boxes' );
get_template_part( 'lib/theme-options' );


// Add third party PHP libs

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
function cmb_initialize_cmb_meta_boxes() {
  // Add CMB2 plugin
  if( ! class_exists( 'cmb2_bootstrap_202' ) )
    require_once 'lib/CMB2/init.php';

  // Add CMB2 Gallery field
  if ( ! function_exists( 'pw_gallery_field' ) ) {
    define( 'PW_GALLERY_URL', get_stylesheet_directory_uri() . '/lib/cmb-field-gallery/' );
    require_once 'lib/cmb-field-gallery/cmb-field-gallery.php';
  }

  // Add CMB2 Post Search field
  require_once 'lib/CMB2-Post-Search-field/lib/init.php';

}


// Add custom functions

get_template_part( 'lib/functions-misc' );
get_template_part( 'lib/functions-custom' );
get_template_part( 'lib/functions-filters' );
get_template_part( 'lib/functions-hooks' );
get_template_part( 'lib/functions-utility' );

?>
