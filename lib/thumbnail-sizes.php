<?php

if( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}

if( function_exists( 'add_image_size' ) ) {
  add_image_size( 'admin-thumb', 150, 150, false );
  add_image_size( 'opengraph', 1200, 630, true );

  add_image_size( 'gallery', 1200, 9999, false );
  add_image_size( 'mobile-project-image', 800, 9999, false );
  add_image_size( 'project-type-archive', 483, 278, true );

  add_image_size( 'news-thumb', 1000, 9999, false );
}
