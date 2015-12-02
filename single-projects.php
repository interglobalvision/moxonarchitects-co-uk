<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
  $custom_taxterms = wp_get_object_terms( $post->ID, 'type', array('fields' => 'ids') );
  $current_project = get_the_ID();

  $args = array(
    'post_type' => 'projects',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
    'tax_query' => array(
      array(
          'taxonomy' => 'type',
          'field' => 'id',
          'terms' => $custom_taxterms
      )
    )
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
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><li><?php the_title(); ?></li></a>
<?php
    }
  endwhile;
endif;
wp_reset_postdata();
?>
  		</ul>
		</div>

		<div id="project-copy-panel">
      <nav id="copy-toggle">
        <?php the_title(); ?>
        <ul id="slide-list"></ul>
        <span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span>
      </nav>
      <div id="project-copy" data-type="<?php
$terms = get_the_terms( $current_project, 'type' );
$term = reset($terms);
echo $term->slug;
?>">
				<?php the_content(); ?>
      </div>
		</div>

    <script type="text/javascript">
<?php
  // Form slider arrays
  if(get_field('project_page_images')) {
?>
      var sliderImages = {
        full: [],
        medium: [],
        small: []
      };
<?php
    while(the_repeater_field('project_page_images')) {
      $image = get_sub_field('image');
?>
      sliderImages.full.push( {image : '<?php echo $image['sizes']['homepage-thumb']; ?>'});
      sliderImages.medium.push( {image : '<?php echo $image['sizes']['slider-945']; ?>'});
      sliderImages.small.push( {image : '<?php echo $image['sizes']['slider-660']; ?>'});
		<?php }
  }
?>

    jQuery(document).ready(function() {
      var slides = sliderImages.full;
      var screenWidth = jQuery(document).width();

      if ( screenWidth <= 660 ) {
        slides = sliderImages.small;
      } else if (screenWidth <= 945 ) {
        slides = sliderImages.medium;
      }

      jQuery(function($){
        $.supersized({
            vertical_center: true,
            horizontal_center: true,
            fit_always: true,
            autoplay: false,
            slide_interval: 2000,
            transition: 1,
            transition_speed: 700,
            horizontal_center: false,
            image_protect: false,
            slide_links: 'blank',
            slides: slides 
				  });
		    });
		  });
<?php
  endwhile;
  endif;
?>
    </script>

<a id="prevslide" class="load-item"></a>
<a id="nextslide" class="load-item"></a>

<?php get_footer(); ?>
