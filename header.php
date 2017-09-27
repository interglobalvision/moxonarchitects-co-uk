<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php get_template_part('partials/seo'); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/img/dist/favicon.png">

  <?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <?php } ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->
<?php
  global $post;
?>

<section id="main-container">

  <div id="menus" class="font-color-white">

    <div id="main-menu" class="menu-column menu-active font-uppercase">
      <div class="menu-column-top">
        <div id="hamburger-holder" class="u-inline-block">
          <?php echo url_get_contents(get_template_directory_uri() . '/img/dist/hamburger.svg'); ?>
        </div>

        <?php
          if (is_single_type('project', $post) && !is_archive()) {
        ?>
          <span id="mobile-single-project-title" class="only-mobile text-overflow-ellipsis"><?php the_title(); ?></span>
          <span id="mobile-single-project-info-toggle" class="only-mobile font-tracking-wider">info</span>
        <?php
        } ?>
      </div>
      <nav class="menu-column-content">
        <ul>
          <a id="menu-studio-link" href="<?php echo home_url('profile/'); ?>"><li>
            <span <?php if (is_page() && !is_page('Contact') && !is_page('News') && !is_front_page() || is_post_type_archive('people') || is_single_type('people', $post)) {echo 'class="font-color-active"';}?>>Studio</span>
          </li></a>
          <ul id="mobile-studio-submenu" class="only-mobile">
            <a href="<?php echo home_url('profile/'); ?>"><li <?php is_active_page('Profile', $post->ID); ?>>Profile</li></a>
            <a href="<?php echo home_url('clients/'); ?>"><li <?php is_active_page('Clients', $post->ID); ?>>Clients</li></a>
            <a href="<?php echo home_url('awards/'); ?>"><li <?php is_active_page('Awards', $post->ID); ?>>Awards</li></a>
            <a href="<?php echo home_url('people/'); ?>"><li <?php if (is_post_type_archive('people') || is_single_type('people', $post)) {echo 'class="font-color-active"';} ?>>People</li></a>
            <a href="<?php echo home_url('recruit/'); ?>"><li <?php is_active_page('Recruit', $post->ID); ?>>Recruit</li></a>
            <a href="<?php echo home_url('partners/'); ?>"><li <?php is_active_page('partners', $post->ID); ?>>partners</li></a>
            <a href="<?php echo home_url('credits/'); ?>"><li <?php is_active_page('Credits', $post->ID); ?>>Credits</li></a>
          </ul>
          <a href="<?php echo home_url('news/'); ?>"><li <?php if (is_page('News') || is_home()) {echo 'class="font-color-active"';}?>>News</li></a>
          <a href="<?php echo home_url('contact/'); ?>"><li <?php if (is_page('Contact')) {echo 'class="font-color-active"';}?>>Contact</li></a>
          <li>&nbsp;</li>
<?php
  $types = get_terms( 'project_type', array(
    'hide_empty' => true,
  ));

  if (is_single()) {
    // if single post
    $post_terms = wp_get_post_terms($post->ID, 'project_type');
  } else if (is_tax('project_type')) {
    $tax = $wp_query->queried_object;
    $post_terms = array($tax);
  } else {
    $post_terms = false;
  }

  if ($types) {
    foreach ($types as $type) {
      $lastest_project_in_type = get_posts(array(
        'tax_query' => array(
          array(
            'taxonomy' => 'project_type',
            'field' => 'id',
            'terms' => $type->term_id
          )
        ),
        'posts_per_page' => 1,
        'post_type' => 'project'
      ));
?>
          <a class="only-mobile" href="<?php echo get_term_link($type); ?>"><li <?php term_active($type, $post_terms); ?>><?php echo $type->name; ?></li></a>
          <a class="only-desktop" href="<?php echo get_the_permalink($lastest_project_in_type[0]->ID); ?>"><li <?php term_active($type, $post_terms); ?>><?php echo $type->name; ?></li></a>
<?php
    }
  }
?>
        </ul>
      </nav>
    </div>

<?php
    // if ! is page contact or ! is home=news
    if (!is_home() && !is_page('contact') && !is_404()) {

      // if single project
      if (is_single() && is_single_type('project', $post)) {
        $terms = wp_get_post_terms($post->ID, 'project_type');

        if ($terms) {
          $projects_with_type = get_posts(array(
            'tax_query' => array(
              array(
                'taxonomy' => 'project_type',
                'field' => 'id',
                'terms' => $terms[0]->term_id
              )
            ),
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'post_type' => 'project'
          ));

          if ($projects_with_type) {
?>
    <section id="submenu" class="menu-column menu-active font-uppercase only-desktop">
      <div class="menu-column-top">
        &nbsp;
      </div>
      <nav class="menu-column-content">
        <ul>
<?php
            foreach ($projects_with_type as $project) {
?>
          <a href="<?php echo get_the_permalink($project->ID); ?>"><li <?php if ($post->ID === $project->ID) {echo 'class="font-color-active"';} ?>><?php echo $project->post_title; ?></li></a>
<?php
            }
?>
        </ul>
      </nav>
    </section>
<?php
          }
        }
      }

    // if is page
      if (is_page() && !is_front_page() && !is_page('News')) {
?>
    <section id="submenu" class="menu-column menu-active font-uppercase only-desktop">
      <div class="menu-column-top">
        &nbsp;
      </div>
      <nav class="menu-column-content">
        <ul>
          <a href="<?php echo home_url('profile/'); ?>"><li <?php is_active_page('Profile', $post->ID); ?>>Profile</li></a>
          <a href="<?php echo home_url('clients/'); ?>"><li <?php is_active_page('Clients', $post->ID); ?>>Clients</li></a>
          <a href="<?php echo home_url('awards/'); ?>"><li <?php is_active_page('Awards', $post->ID); ?>>Awards</li></a>
          <a href="<?php echo home_url('people/'); ?>"><li>People</li></a>
          <a href="<?php echo home_url('recruit/'); ?>"><li <?php is_active_page('Recruit', $post->ID); ?>>Recruit</li></a>
		  <a href="<?php echo home_url('partners/'); ?>"><li <?php is_active_page('partners', $post->ID); ?>>partners</li></a>
		  <a href="<?php echo home_url('credits/'); ?>"><li <?php is_active_page('Credits', $post->ID); ?>>Credits</li></a>
        </ul>
      </nav>
    </section>
<?php
    // or is people archive
      } else if (is_post_type_archive('people') || is_single_type('people', $post)) {
?>
    <section id="submenu" class="menu-column menu-active font-uppercase only-desktop">
      <div class="menu-column-top">
        &nbsp;
      </div>
      <nav class="menu-column-content">
        <ul>
          <a href="<?php echo home_url('profile/'); ?>"><li>Profile</li></a>
          <a href="<?php echo home_url('news/'); ?>"><li>Clients</li></a>
          <a href="<?php echo home_url('awards/'); ?>"><li>Awards</li></a>
          <a href="<?php echo home_url('people/'); ?>"><li class="font-color-active">People</li></a>
          <a href="<?php echo home_url('recruit/'); ?>"><li>Recruit</li></a>
		  <a href="<?php echo home_url('partners/'); ?>"><li <?php is_active_page('partners', $post->ID); ?>>partners</li></a>
		  <a href="<?php echo home_url('credits/'); ?>"><li <?php is_active_page('Credits', $post->ID); ?>>Credits</li></a>
       </ul>
      </nav>
    </section>
<?php
      }
    }
?>
