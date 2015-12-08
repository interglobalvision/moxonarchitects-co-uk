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
  while(the_repeater_field('project_page_images')) {
    $image = get_sub_field('image');
    $portrait = $image['height'] > $image['width'] ? true : false;
?>
      <div class="swiper-slide">
        <img
          class="<?php echo $portrait ? 'portrait' : ''; ?>"
          src="<?php echo $image['sizes']['slider-3840']; ?>"
          srcset="
            <?php echo $image['sizes']['slider-660']; ?> 660w,
            <?php echo $image['sizes']['slider-945']; ?> 945w,
            <?php echo $image['sizes']['slider-1680']; ?> 1680w,
            <?php echo $image['sizes']['slider-2200']; ?> 2200w
        ">
      </div>
<?php }
}
?>
    </div>

</div>
