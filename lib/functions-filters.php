<?php

// Custom filters (like pre_get_posts etc)

// Page Slug Body Class
function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// Remove <p> tags around images and embeds in wp_content
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

function filter_ptags_on_iframes($content){
   return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_iframes');

/* 
 * Custom img attributes to be compatible with lazysize
 */
function add_lazysize_on_srcset($attr) {
  // Add lazysize class
  $attr['class'] .= ' lazyload';

  // Add lazysize data-srcset
  $attr['data-srcset'] = $attr['srcset'];

  // Remove default srcset
  unset($attr['srcset']);

  // Remove default src
  unset($attr['src']);

  return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'add_lazysize_on_srcset');
