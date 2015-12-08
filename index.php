<?php
get_header(); ?>

<?php
// Form slider arrays
if(get_field('project_page_images')) {
?>
<!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
<?php
  $args = array( 'post_type' => 'hp_pt' );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) {
    $loop->the_post();

    // Get image sizes
    $image['slider-660'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-660' );
    $image['slider-945'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-945' );
    $image['slider-1680'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-1680' );
    $image['slider-3840'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider-3840' );

?>
      <div class="swiper-slide">
        <img 
          src="<?php echo $image[0]['slider-3840']; ?>"
          srcset="
            <?php echo $image['slider-660']['0']; ?> 660w,
            <?php echo $image['slider-945']['0']; ?> 945w,
            <?php echo $image['slider-1680']['0']; ?> 1680w
        ">
      </div>
<?php }
}
?>
    </div>
    
</div>


<?php get_footer(); ?>
