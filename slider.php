    <script type="text/javascript">
<?php
  // Form slider arrays
  if(get_field('project_page_images')) {
?>
      var sliderImages = {
        full: [],
        large: [],
        medium: [],
        small: []
      };
<?php
    while(the_repeater_field('project_page_images')) {
      $image = get_sub_field('image');
?>
      sliderImages.full.push( {image : '<?php echo $image['sizes']['slider-3840']; ?>'});
      sliderImages.large.push( {image : '<?php echo $image['sizes']['slider-1680']; ?>'});
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
      } else if (screenWidth <= 1680 ) {
        slides = sliderImages.large;
      } 

      jQuery(function($){
        $.supersized({
            vertical_center: true,
            horizontal_center: true,
            fit_landscape: true,
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
    </script>
