<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <link href="http://fnt.webink.com/wfs/webink.css/?project=A37B4D72-EC7C-491B-A609-8BC8B742A1B4&fonts=CAC4D133-08E9-2123-5FFE-D354F1BB6F08:f=Executive-MediumIta,06DF7380-FF3E-3BE8-59D0-E24986CA63CD:f=Executive-Medium,6AADE4ED-2FC6-C1F3-C6AB-C518D2A37A6B:f=Executive-Thin,CFA46947-638C-0F15-A271-A897771BB7AA:f=Executive-Bold,AFACCE17-5C0F-7C3C-CF59-DFC1523A0631:f=Executive-RegularIta,61C315B0-9382-DB96-AC5F-7057ACCFA58F:f=Executive-BoldIta,F7EF464B-61A5-06EB-24B0-2416CEA2DC9D:f=Executive-LightIta,BF6E34AD-813B-1B6B-449A-38F4A417DE49:f=Executive-Regular,0BE979EE-912C-6C8E-CD7D-8F6D0AD222B2:f=Executive-ThinIta,B938B391-BE8A-4F4A-42F3-D707D8F6EAA3:f=Executive-Light" rel="stylesheet" type="text/css"/>

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