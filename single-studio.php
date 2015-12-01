<?php get_header();
if (have_posts()) : while (have_posts()) : the_post();

  $current_project = get_the_ID();

  $args = array(
    'post_type' => 'studio',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
  );
  $related_items = new WP_Query($args);
?>

    <div id="projects-menu">
      <nav class="menu-toggle active"><span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span></nav>
  		<ul class="menu">
<?php
if ($related_items->have_posts()) :
  while ( $related_items->have_posts() ) : $related_items->the_post();
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
      <div id="project-copy" data-section="studio">
				<?php the_content(); ?>
      </div>
		</div>


<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery(function($){
		$.supersized({
      vertical_center         :   0,			// Vertically center background
      fit_landscape			:   1,			// Landscape images will not exceed browser width
			autoplay				:	0,
			slide_interval          :   2000,
			transition              :   1,
			transition_speed		:	700,
			// Components
			horizontal_center       :   0,			// Horizontally center background
			image_protect			:	0,			// Disables image dragging and right click with Javascript
			slide_links				:	'blank',
			slides 					:  	[
<?php
if(get_field('project_page_images')):
  while(the_repeater_field('project_page_images')): ?>
{image : '<?php the_sub_field('image'); ?>'},
<?php
  endwhile;
endif; ?>
										]
		});
  });
});

<?php endwhile;
    endif; ?>

		</script>

<a id="prevslide" class="load-item"></a>
<a id="nextslide" class="load-item"></a>

<?php get_footer(); ?>