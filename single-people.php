<?php get_header();
if (have_posts()) : while (have_posts()) : the_post();
  $current_project = get_the_ID();

  $args = array(
    'post_type' => 'people',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
  );
  $people = new WP_Query($args);
?>

    <div id="projects-menu">
      <nav class="menu-toggle active"><span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span></nav>
  		<ul class="menu">
<?php
if ($people->have_posts()) :
  while ( $people->have_posts() ) : $people->the_post();
    if ( $post->ID == $current_project ) { ?>
          <li class="current-project"><?php the_title(); ?></li>
<?php
    } else {
?>
          <a href="<?php the_permalink(); ?>"><li><?php the_title(); ?></li></a>
<?php
    }
  endwhile;
endif;
wp_reset_postdata();
?>
  		</ul>
		</div>

		<div id="project-copy-panel">
      <nav id="copy-toggle" class="active">
        <?php the_title(); ?>
        <ul id="slide-list"></ul>
        <span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span>
      </nav>
      <div id="project-copy" data-section="people">
				<?php the_content(); ?>
      </div>
		</div>

    
  <?php get_template_part('slider'); ?>
<?php
  endwhile;
endif; ?>

</script>

<a id="prevslide" class="load-item"></a>
<a id="nextslide" class="load-item"></a>

<?php get_footer(); ?>
