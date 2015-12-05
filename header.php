<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

  <?php get_template_part( 'mobile', 'menu' ); ?>

	<?php if(is_front_page()) : ?>
	  <h1 class="moxonlogo"><img src="<?php bloginfo('template_url'); ?>/images/moxon-logo-white.png" alt="Moxon Logo" /></h1>
	<?php endif; ?>
	<?php if(!is_page_template( 'template-news.php' ) ) : ?>
	  <h1 class="moxonlogogeneral"><img src="<?php bloginfo('template_url'); ?>/images/moxon-logo-white.png" alt="Moxon Logo" /></h1>
	<?php endif; ?>

	<?php do_action('before'); ?>

	<header id="masthead" class="site-header">

		<div id="main-menu">
      <nav class="menu-toggle <?php
if (!is_page_template('template-news.php')) {
  echo 'active';
}
?>"><span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span></nav>
  		<ul class="menu">
    		<a href="<?php echo home_url(); ?>"><li>Home</li></a>
    		<a href="<?php echo home_url('studio/01-profile/'); ?>"><li id="menu-section-studio">Studio</li></a>
    		<a href="<?php echo home_url('news/'); ?>"><li id="menu-section-news">News</li></a>
    		<a href="<?php echo home_url('people/ben-addy/'); ?>"><li id="menu-section-people">People</li></a>
    		<a href="<?php echo home_url('contact/'); ?>"><li id="menu-section-contact">Contact</li></a>
        <li class="menu-spacer"></li>
<?php

/*
if (is_single_type('projects', $thePostID)) {

  global $wp_query;
  $postId = $wp_query->queried_object->ID;
  var_dump($wp_query->queried_object);

} else {
  $postId = null;
}
*/

$project_types = get_terms('type');
foreach ($project_types as $type) {
  $args = array(
  	'post_type' => 'projects',
  	'tax_query' => array(
  		array(
  			'taxonomy' => 'type',
  			'field'    => 'slug',
  			'terms'    => $type->name,
  		),
  	),
  	'posts_per_page' => 1
  );
  $first_project = get_posts($args);
/*   echo '<a href="' . get_permalink($first_project[0]->ID) . '' . '"><li' . menuActiveType($type->name, $postId) . '>' . $type->name . '</li></a>'; */
  echo '<a href="' . get_permalink($first_project[0]->ID) . '' . '"><li id="menu-type-' . $type->slug . '">' . $type->name . '</li></a>';
}
?>
		</div>


	</header>

	<div id="content" class="site-content clear">