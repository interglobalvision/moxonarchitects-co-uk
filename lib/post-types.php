<?php
// Menu icons for Custom Post Types
// https://developer.wordpress.org/resource/dashicons/
function add_menu_icons_styles(){
?>

<style>
#menu-posts-project .dashicons-admin-post:before {
    content: '\f319';
}
</style>

<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );

// Register Custom Post Type
function project_post_type() {

  $labels = array(
    'name'                  => 'Projects',
    'singular_name'         => 'Project',
    'menu_name'             => 'Projects',
    'name_admin_bar'        => 'Projects',
    'archives'              => 'Projects Archives',
    'parent_item_colon'     => 'Parent Project:',
    'all_items'             => 'All Projects',
    'add_new_item'          => 'Add New Project',
    'add_new'               => 'Add New',
    'new_item'              => 'New Project',
    'edit_item'             => 'Edit Project',
    'update_item'           => 'Update Project',
    'view_item'             => 'View Project',
    'search_items'          => 'Search Projects',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into item',
    'uploaded_to_this_item' => 'Uploaded to this item',
    'items_list'            => 'Items list',
    'items_list_navigation' => 'Items list navigation',
    'filter_items_list'     => 'Filter items list',
  );
  $args = array(
    'label'                 => 'Project',
    'description'           => 'Projects',
    'labels'                => $labels,
    'supports'              => array( ),
    'taxonomies'            => array( 'project_type' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => 'projects',
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'project', $args );

}
add_action( 'init', 'project_post_type', 0 );

// Register Custom Taxonomy
function project_type_taxonomy() {

	$labels = array(
		'name'                       => 'Project Types',
		'singular_name'              => 'Project Type',
		'menu_name'                  => 'Project Type',
		'all_items'                  => 'All Project Types',
		'parent_item'                => 'Parent Project Type',
		'parent_item_colon'          => 'Parent Project Type:',
		'new_item_name'              => 'New Project Type Name',
		'add_new_item'               => 'Add New Project Type',
		'edit_item'                  => 'Edit Project Type',
		'update_item'                => 'Update Project Type',
		'view_item'                  => 'View Project Types',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$rewrite = array(
		'slug'                       => 'project',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'type',
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'project_type', array( 'project' ), $args );

}
add_action( 'init', 'project_type_taxonomy', 0 );