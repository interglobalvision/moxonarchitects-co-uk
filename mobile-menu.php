<svg id="mobile-menu-toggle" xmlns="http://www.w3.org/2000/svg" width="36" height="27" viewBox="0 0 36 27">
  <path d="M0 0h36v4.5h-36v-4.5zm0 15.75v-4.5h36v4.5h-36zm0 11.25v-4.5h36v4.5h-36z"/>
</svg>
<div id="mobile-menu-mask"></div>
<div id="mobile-logo-holder">
  <div id="mobile-logo-holder-inner">
    <img src="<?php bloginfo('template_url'); ?>/images/moxon-mobile-logo.png" />
  </div>
</div>

<nav id="mobile-menu-holder">

  <div id="mobile-menu">

    <a href="<?php echo home_url(); ?>">
      <li>
        Home
      </li>
    </a>

    <li class="has-submenu">
      <div class="mobile-submenu-trigger">
        Studio
        <span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span>
      </div>
      <ul class="mobile-submenu">
<?php
$args = array(
  'post_type' => 'studio',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'title',
  'order' => 'ASC'
);
$studioitems = new WP_Query($args);
?>

<?php
if ($studioitems->have_posts()) :
  while ( $studioitems->have_posts() ) : $studioitems->the_post();
    ?>
        <a href="<?php the_permalink(); ?>"><li><?php the_title(); ?></li></a>
<?php
  endwhile;
endif;
wp_reset_postdata();
?>
      </ul>
    </li>

    <a href="<?php echo home_url('news/'); ?>"><li>News</li></a>

    <li class="has-submenu">
      <div class="mobile-submenu-trigger">
        People
        <span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span>
      </div>
      <ul class="mobile-submenu">
<?php
$args = array(
    'post_type' => 'people',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
  );
  $people = new WP_Query($args);
if ($people->have_posts()) :
  while ( $people->have_posts() ) : $people->the_post();
?>
    <a href="<?php the_permalink(); ?>"><li><?php the_title(); ?></li></a>
<?php
  endwhile;
endif;
wp_reset_postdata();
?>
      </ul>
    </li>

    <a href="<?php echo home_url('contact/'); ?>"><li>Contact</li></a>

    <li class="mobile-menu-spacer"></li>

<!--
    <li class="has-submenu">
      <div class="mobile-submenu-trigger">
        Projects
        <span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span>
      </div>
      <ul class="mobile-submenu">
<?php
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
  echo '<a href="' . get_permalink($first_project[0]->ID) . '' . '"><li>' . $type->name . '</li></a>';
}
?>
      </ul>
    </li>
-->

<?php
$project_types = get_terms('type');
foreach ($project_types as $type) {
  $args = array(
    'post_type' => 'projects',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
    'tax_query' => array(
   		array(
    		'taxonomy' => 'type',
  			'field'    => 'slug',
  			'terms'    => $type->name,
  		)
    )
  );
  $projects = get_posts($args);
?>
    <li class="has-submenu">
      <div class="mobile-submenu-trigger">
        <?php echo $type->name; ?>
        <span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span>
      </div>
      <ul class="mobile-submenu">
<?php
    foreach ($projects as $post) {
      echo '<a href="' . get_permalink($post->ID) . '' . '"><li>' . $post->post_title . '</li></a>';
    }
?>
      </ul>
    </li>
<?php
}
?>

  </div>

</nav>