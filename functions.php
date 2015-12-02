<?php
/**
 * moxon2014 functions and definitions
 *
 * @package moxon2014
 */

//Set the content width based on the theme's design and stylesheet.

if ( ! isset( $content_width ) ) {
  $content_width = 640;
}

if ( ! function_exists( 'moxon2014_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function moxon2014_setup() {

    // add translater (where available)
    load_theme_textdomain( 'moxon2014', get_template_directory() . '/languages' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'moxon2014' ),
      ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'projectscat' => __( 'Project Category Menu', 'moxon2014' ),
      ) );

    // Enable support for Post Formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
  }
endif; // moxon2014_setup
add_action( 'after_setup_theme', 'moxon2014_setup' );


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function moxon2014_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Sidebar', 'moxon2014' ),
      'id'            => 'sidebar-1',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'moxon2014_widgets_init' );


// projects sidebar
if ( function_exists('register_sidebar') )
  register_sidebar(array(
      'name' => 'Projects Sidebar',
      'id' => 'projectsidebar',
      'description' => __('', 'moxon2014'),
      'before_widget' => '<div class="footer-widget clearfix">',
      'after_widget' => '</div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
    ));

// studio sidebar
if ( function_exists('register_sidebar') )
  register_sidebar(array(
      'name' => 'Studio Sidebar',
      'id' => 'studiosidebar',
      'description' => __('', 'moxon2014'),
      'before_widget' => '<div class="footer-widget clearfix">',
      'after_widget' => '</div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
    ));

// people sidebar
if ( function_exists('register_sidebar') )
  register_sidebar(array(
      'name' => 'People Sidebar',
      'id' => 'peoplesidebar',
      'description' => __('', 'moxon2014'),
      'before_widget' => '<div class="footer-widget clearfix">',
      'after_widget' => '</div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
    ));

function moxon2014_scripts() {

  wp_enqueue_style( 'moxon2014-style', get_template_directory_uri() . '/css/main.css' );

  // Pretty sure never actually used and pointless in the footer but whatever at least its only 1 file now lol
  wp_enqueue_script( 'mod', get_template_directory_uri() . '/js/modernizr.js', '', array(), false );

  // jQ
  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), '', false );

  // Scripts
  wp_enqueue_script( 'customglobal', get_template_directory_uri() . '/js/custom.min.js', '', array(), true );

  // News and Contact?
  wp_enqueue_script( 'library-news-contact', get_template_directory_uri() . '/js/lib-news-contact.min.js', '', array(), true );

  // General library
  wp_enqueue_script( 'library-general', get_template_directory_uri() . '/js/lib-general.min.js', '', array(), true );

  //nav
//  wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', '', array(), true );
//  wp_enqueue_script( 'sidebareffect', get_template_directory_uri() . '/js/sidebarEffects.js', '', array(), true );
  //other
//  wp_enqueue_script( 'moxon2014-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
  // scrollbar hack
//  wp_enqueue_script( 'mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js', array(), '', true );
  // infinite scroll
//  wp_enqueue_script( 'infinite_scroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array(), '20130115', true );

}
add_action( 'wp_enqueue_scripts', 'moxon2014_scripts' );

//Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';

/* Register Custom Post */
function projects_pt() {
  $labels = array(
    'name'                => _x( 'Projects', 'Post Type General Name' ),
    'singular_name'       => _x( 'Project', 'Post Type Singular Name' ),
    'menu_name'           => __( 'Projects', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Project:'),
    'all_items'           => __( 'All Projects' ),
    'view_item'           => __( 'View Project' ),
    'add_new_item'        => __( 'Add New Project' ),
    'add_new'             => __( 'New Project' ),
    'edit_item'           => __( 'Edit Project' ),
    'update_item'         => __( 'Update Project' ),
    'search_items'        => __( 'Search Project' ),
    'not_found'           => __( 'No projects found' ),
    'not_found_in_trash'  => __( 'No projects found in Trash' ),
  );

  $args = array(
    'label'     => __( 'projects', 'text_domain' ),
    'description'   => __( 'Project Information Entry', 'text_domain' ),
    'labels'    => $labels,
    'supports'    => array( 'title', 'editor', ),
    'hierarchical'   => true,
    'public'    => true,
    'show_ui'    => true,
    'show_in_menu'   => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'menu_position'   => 5,
    'menu_icon'    => 'http://moxonarchitects.com/newsite/wp-content/themes/moxon2014/images/admin/screen.png',
    'can_export'   => true,
    'has_archive'   => true,
    'exclude_from_search' => false,
    //'publicly_queryable' => true,
    'rewrite'    => array('slug' => 'projects/%type%', 'with_front' => false),
    'query_var'    => true,
  );
  register_post_type( 'projects', $args );
}
add_action( 'init', 'projects_pt' );

/*
add_action( 'init', 'register_cpt_projects' );
function register_cpt_projects() {

    $labels = array(
        'name' => _x( 'Projects', 'projects' ),
        'singular_name' => _x( 'Project', 'projects' ),
        'add_new' => _x( 'Add New', 'projects' ),
        'add_new_item' => _x( 'Add New Project', 'projects' ),
        'edit_item' => _x( 'Edit Project', 'projects' ),
        'new_item' => _x( 'New Project', 'projects' ),
        'view_item' => _x( 'View Project', 'projects' ),
        'search_items' => _x( 'Search Projects', 'projects' ),
        'not_found' => _x( 'No projects found', 'projects' ),
        'not_found_in_trash' => _x( 'No projects found in Trash', 'projects' ),
        'parent_item_colon' => _x( 'Parent Project:', 'projects' ),
        'menu_name' => _x( 'Projects', 'projects' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,

        'supports' => array( 'title', 'editor' ),
        'taxonomies' => array( 'type' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,

        'show_in_nav_menus' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite'    => array('slug' => 'projects/%type%', 'with_front' => false),
        'capability_type' => 'post'
    );

    register_post_type( 'projects', $args );
}
*/



/*create custom taxonomy Type*/
function my_taxonomies_project() {
  $labels = array(
    'name'              => _x( 'Type', 'taxonomy general name' ),
    'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Project Categories' ),
    'all_items'         => __( 'All Project Categories' ),
    'parent_item'       => __( 'Parent Project Category' ),
    'parent_item_colon' => __( 'Parent Project Category:' ),
    'edit_item'         => __( 'Edit Project Category' ),
    'update_item'       => __( 'Update Project Category' ),
    'add_new_item'      => __( 'Add New Project Category' ),
    'new_item_name'     => __( 'New Project Category' ),
    'menu_name'         => __( 'Project Type' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical'  => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'public'  => true,
    'query_var'  => 'type',
    'rewrite'  =>  array('slug' => 'projects' ),
    '_builtin'  => false,
  );
  register_taxonomy( 'type', 'projects', $args );
}
add_action( 'init', 'my_taxonomies_project', 0 );

/*
add_action( 'init', 'register_taxonomy_type' );
function register_taxonomy_type() {

    $labels = array(
        'name' => _x( 'Types', 'type' ),
        'singular_name' => _x( 'Type', 'type' ),
        'search_items' => _x( 'Search Types', 'type' ),
        'popular_items' => _x( 'Popular Types', 'type' ),
        'all_items' => _x( 'All Types', 'type' ),
        'parent_item' => _x( 'Parent Type', 'type' ),
        'parent_item_colon' => _x( 'Parent Type:', 'type' ),
        'edit_item' => _x( 'Edit Type', 'type' ),
        'update_item' => _x( 'Update Type', 'type' ),
        'add_new_item' => _x( 'Add New Type', 'type' ),
        'new_item_name' => _x( 'New Type', 'type' ),
        'separate_items_with_commas' => _x( 'Separate types with commas', 'type' ),
        'add_or_remove_items' => _x( 'Add or remove types', 'type' ),
        'choose_from_most_used' => _x( 'Choose from the most used types', 'type' ),
        'menu_name' => _x( 'Types', 'type' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => array(
            'slug' => 'project',
            'with_front' => true,
            'hierarchical' => true
        ),
        'query_var' => true
    );

    register_taxonomy( 'type', array('projects'), $args );
}
*/


/* Filter for modified permalink - it works ;) */
add_filter('post_link', 'type_permalink', 1, 3);
add_filter('post_type_link', 'type_permalink', 1, 3);

function type_permalink($permalink, $post_id, $leavename) {
  // add %type% tp URL permalink structure
  if (strpos($permalink, '%type%') === FALSE) return $permalink;
  // Get post
  $post = get_post($post_id);
  if (!$post) return $permalink;

  // Get taxonomy terms
  $terms = wp_get_object_terms($post->ID, 'type');
  if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
    $taxonomy_slug = $terms[0]->slug;
  else $taxonomy_slug = 'no-type';

  return str_replace('%type%', $taxonomy_slug, $permalink);
}
// end taxonomies

// Register Studio Custom Post Type
function studio_pt() {

  $labels = array(
    'name'                => _x( 'Studio Item', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Studio Item', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Studio Items', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Studio Item:', 'text_domain' ),
    'all_items'           => __( 'All Studio Items', 'text_domain' ),
    'view_item'           => __( 'View Studio Item', 'text_domain' ),
    'add_new_item'        => __( 'Add New Studio Item', 'text_domain' ),
    'add_new'             => __( 'New Studio Item', 'text_domain' ),
    'edit_item'           => __( 'Edit Studio Item', 'text_domain' ),
    'update_item'         => __( 'Update Studio', 'text_domain' ),
    'search_items'        => __( 'Search Studio', 'text_domain' ),
    'not_found'           => __( 'No Studio items found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No Studio items found in Trash', 'text_domain' ),
  );
  $rewrite = array(
    'slug'                => 'studio',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'studio', 'text_domain' ),
    'description'         => __( 'Studio Information Entry', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array('title', 'editor'),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 4,
    'menu_icon'           => 'http://moxonarchitects.com/newsite/wp-content/themes/moxon2014/images/admin/briefcase.png',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
  );
  register_post_type( 'studio', $args );

}
add_action( 'init', 'studio_pt', 0 );


// Register Custom Post Type
function hp_pt() {

  $labels = array(
    'name'                => _x( 'HP Slides', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'HP Slides', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Slide:', 'text_domain' ),
    'all_items'           => __( 'All Slides', 'text_domain' ),
    'view_item'           => __( 'View Slide', 'text_domain' ),
    'add_new_item'        => __( 'Add New Slide', 'text_domain' ),
    'add_new'             => __( 'New Slides', 'text_domain' ),
    'edit_item'           => __( 'Edit Slide', 'text_domain' ),
    'update_item'         => __( 'Update Homepage Slides', 'text_domain' ),
    'search_items'        => __( 'Search Homepage Slides', 'text_domain' ),
    'not_found'           => __( 'No Homepage Slides items found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No Homepage Slides items found in Trash', 'text_domain' ),
  );
  $rewrite = array(
    'slug'                => 'hp',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'Hp Slides', 'text_domain' ),
    'description'         => __( 'Hp Slides Information Entry', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array('title', 'thumbnail' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 4,
    'menu_icon'           => 'http://moxonarchitects.com/newsite/wp-content/themes/moxon2014/images/admin/configuration.png',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
  );
  register_post_type( 'hp_pt', $args );
}


// Register People Custom Post Type
function people_pt() {

  $labels = array(
    'name'                => _x( 'People', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'People', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'People', 'text_domain' ),
    'parent_item_colon'   => __( 'People:', 'text_domain' ),
    'all_items'           => __( 'All People', 'text_domain' ),
    'view_item'           => __( 'View Person', 'text_domain' ),
    'add_new_item'        => __( 'Add New Person', 'text_domain' ),
    'add_new'             => __( 'New Person', 'text_domain' ),
    'edit_item'           => __( 'Edit Person', 'text_domain' ),
    'update_item'         => __( 'Update People', 'text_domain' ),
    'search_items'        => __( 'Search People', 'text_domain' ),
    'not_found'           => __( 'No People found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No People found in Trash, phew!', 'text_domain' ),
  );

  $rewrite = array(
    'slug'                => 'people',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );

  $args = array(
    'label'               => __( 'people', 'text_domain' ),
    'description'         => __( 'People Information Entry', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array('title', 'editor'),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'http://moxonarchitects.com/newsite/wp-content/themes/moxon2014/images/admin/peoples.png',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
  );

  register_post_type( 'people', $args );
}
add_action( 'init', 'people_pt', 0 );



// Hook into the 'init' action
add_action( 'init', 'hp_pt', 0 );

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 650, 475, true );

// large images for bg post
add_image_size( 'homepage-thumb', 1920, 1200 );
add_image_size( 'hp-post-thumbnail', 1366, 768 );

// Slider images
add_image_size( 'slider-945', 945 );
add_image_size( 'slider-660', 660 );

/** Enqueue Scripts. */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {

  /** Enqueue JavaScript Functions File */
  wp_enqueue_script( 'functions-js' );

}

function extra_setup() {
  register_nav_menu ('primary mobile', __( 'Navigation Mobile', 'moxon2014_setup' ));
}

add_action( 'after_setup_theme', 'extra_setup' );

// more
function set_container_class($args) {
  $args['container_class'] = str_replace(' ', '-', $args['theme_location']).'-nav'; return $args;
}

add_filter ('wp_nav_menu_args', 'set_container_class');

// Custom admin logo
function custom_login_logo() {
  echo '<style type="text/css">'.
    'h1 a { background-image:url('.get_bloginfo( 'template_directory' ).'/images/login-logo.png) !important; background-size:300px auto !important; width:300px !important; }'.
    '</style>';
}
add_action( 'login_head', 'custom_login_logo' );

// Custom admin login header link
function custom_login_url() {
  return home_url( '/' );
}
add_filter( 'login_headerurl', 'custom_login_url' );

/**
 * Custom admin login header link alt text
 */
function custom_login_title() {
  return get_option( 'blogname' );
}
add_filter( 'login_headertitle', 'custom_login_title' );

//RESTRICTIONS
// (office)

function remove_menus() {
  global $menu;
  global $current_user;
  get_currentuserinfo();

  // user
  if ($current_user->user_login == 'ben') {
    $restricted = array(__('Media'),
      __('Links'),
      __('Comments'),
      __('Plugins'),
      __('Tools'),
      __('Settings')
    );

    end($menu);
    while (prev($menu)) {
      $value = explode(' ', $menu[key($menu)][0]);
      if (in_array($value[0] != NULL?$value[0]:"" , $restricted)) {unset($menu[key($menu)]);}
    }// end while
  }// end if

}
add_action('admin_menu', 'remove_menus');

function remove_theme_submenus() {
  global $submenu, $current_user;
  get_currentuserinfo();
  if ( !current_user_can( 'administrator' ) ) {
    // user menu
    unset($submenu['users.php'][10]); // Add new user
    unset($submenu['users.php'][5]); // Users list
    //Appearance Menu
    unset($submenu['themes.php'][5]); // Removes 'Themes'
    unset($submenu['themes.php'][15]); // Removes Theme Installer tab
    //dashboard
    unset($submenu['index.php'][10]); // Update
  }
}
add_action('admin_init', 'remove_theme_submenus');


function remove_acf_menu() {
  $admins = array(
    'dev'
  );

  // get the current user
  $current_user = wp_get_current_user();

  // match and remove if needed
  if ( !in_array( $current_user->user_login, $admins ) ) {
    remove_menu_page('edit.php?post_type=acf');
  }
}
add_action( 'admin_menu', 'remove_acf_menu', 999 );

//removing submenus for editors
add_action('_admin_menu', 'remove_editor_submenu', 1);
function remove_editor_submenu() {
  global $current_user;
  get_currentuserinfo();
  if ($current_user->user_login == 'office') {
    remove_action('admin_menu', '_add_themes_utility_last', 101);
  }
}


// 1 - Remove Menu Items
function my_remove_menu_pages() {
  if ( !current_user_can( 'administrator' ) ) {
    remove_menu_page('tools.php'); // Tools
    remove_menu_page('edit-comments.php');
    remove_menu_page('profile.php');
    remove_menu_page('upload.php');
  }
}
add_action( 'admin_init', 'my_remove_menu_pages' );

// change editor privileges for editing theme

// get the the role object
$role_object = get_role( 'editor' );

// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );

//

// custom excerpt length
function moxon_custom_excerpt_length( $length ) {
  return 45;
}
add_filter( 'excerpt_length', 'moxon_custom_excerpt_length', 999 );

/**
 * Infinite Scroll
 */
function custom_infinite_scroll_js() {
  if ( ! is_singular() ) { ?>
	<script>
	var infinite_scroll = {
		loading: {
			img: " ",
			msgText: " ",
			finishedMsg: " "
		},
		"nextSelector":".pagination a",
		"navSelector":".pagination",
		"itemSelector":".news-item",
		"contentSelector":"#cbp-rfgrid"
	};
	jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
	</script>
	<?php
  }
}
add_action( 'wp_footer', 'custom_infinite_scroll_js', 100 );

// dirty anti-width and height
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html ); return $html;
}


// menu main cat hack
/*
add_filter( 'nav_menu_css_class', 'add_parent_url_menu_class', 10, 2 );

function add_parent_url_menu_class( $classes = array(), $item = false ) {
  // Get current URL
  $current_url = current_url();

  // Get homepage URL
  $homepage_url = trailingslashit( get_bloginfo( 'url' ) );

  // Exclude 404 and homepage
  if ( is_404() or $item->url == $homepage_url ) return $classes;

  if ( strstr( $current_url, $item->url) ) {
    // Add the 'parent_url' class
    $classes[] = 'parent_url';
  }

  return $classes;
}

function current_url() {
  // Protocol
  $url = ( 'on' == $_SERVER['HTTPS'] ) ? 'https://' : 'http://';

  $url .= $_SERVER['SERVER_NAME'];

  // Port
  $url .= ( '80' == $_SERVER['SERVER_PORT'] ) ? '' : ':' . $_SERVER['SERVER_PORT'];

  $url .= $_SERVER['REQUEST_URI'];

  return trailingslashit( $url );
}
*/

// UTILITY

// Disable that freaking admin bar
add_filter('show_admin_bar', '__return_false');

// Turn off version in meta
function no_generator() { return ''; }
add_filter( 'the_generator', 'no_generator' );

/// MY FUNCTIONS

// is_single for custom post type
function is_single_type($type, $post) {
  if (get_post_type($post->ID) === $type) {
    return true;
  } else {
    return false;
  }
}

function menuActiveType($type, $postId) {

  if ($postId = null) {
    return;
  }

  if (has_term($type, 'type', $postId)) {
    return ' class="active"';
  }

  return;

}

function pr($variable, $die = false) {
  echo '<pre>';
  var_dump($variable);
  echo '</pre>';
  if( $die ) {
    die;
  }
}
