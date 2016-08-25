<?php

// Custom functions (like special queries, etc)

function is_active_page($page_name, $post_id) {

  $page = get_page_by_title($page_name);

  if ($page && $post_id === $page->ID) {
    echo 'class="font-color-active"';
  }

}

// Check if term is in post terms if set and set menu active

function term_active($type, $post_terms) {
  if ($post_terms) {
    if (in_array($type, $post_terms)) {
      echo 'class="font-color-active"';
    }
  }
}

// Render gallery markup

function render_gallery($gallery) {
?>
<div id="swiper-gallery" class="swiper-container">
  <div class="swiper-wrapper">
<?php
  foreach ($gallery[0] as $slide) {
?>
    <div class="swiper-slide">
      <?php echo wp_get_attachment_image($slide, 'gallery', null, array('class' => 'gallery-image gallery-image-normal')); ?>
      <?php echo wp_get_attachment_image($slide, 'gallery-large', null, array('class' => 'gallery-image gallery-image-large')); ?>
      <?php echo wp_get_attachment_image($slide, 'gallery-huge', null, array('class' => 'gallery-image gallery-image-huge')); ?>
    </div>
<?php } ?>
  </div>
</div>
<?php
}