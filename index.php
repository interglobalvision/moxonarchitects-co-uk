<?php
get_header(); ?>

<?php
// Form slider arrays
if(get_field('project_page_images')) {
?>
<?php
  $args = array( 'post_type' => 'hp_pt' );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) {
    $loop->the_post();

    // Get image sizes
    $image['slider-660'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-660' );
    $image['slider-945'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-945' );
    $image['slider-1680'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-1680' );
    $image['slider-2200'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-2200' );
    $image['slider-3840'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-3840' );

    //pr($image,true);
?>
<div id="full-bg"></div>
<style>
  #full-bg {
    background-image: url("<?php echo $image['slider-3840'][0]; ?>");
  }

  @media all and (max-width: 2200px) {
    #full-bg {
      background-image: url("<?php echo $image['slider-2200'][0]; ?>");
    }
  }

  @media all and (max-width: 1680px) {
    #full-bg {
      background-image: url("<?php echo $image['slider-1680'][0]; ?>");
    }
  }

  @media all and (max-width: 945px) {
    #full-bg {
      background-image: url("<?php echo $image['slider-945'][0]; ?>");
    }
  }

  @media all and (max-width: 660px) {
    #full-bg {
      background-image: url("<?php echo $image['slider-660'][0]; ?>");
    }
  }
</style>
<?php get_footer(); ?>
