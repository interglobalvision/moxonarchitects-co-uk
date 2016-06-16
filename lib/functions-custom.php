<?php

// Custom functions (like special queries, etc)

function is_active_page($page_name, $post_id) {

  $page = get_page_by_title($page_name);

  if ($page && $post_id === $page->ID) {
    echo 'class="font-color-active"';
  }

}

// Render gallery markup

function render_gallery($gallery) {
?>
<div id="swiper-gallery" class="swiper-container">
  <div class="swiper-wrapper">
<?php foreach ($gallery[0] as $slide) { ?><div class="swiper-slide"><?php echo wp_get_attachment_image($slide, 'gallery', null, array('class' => 'gallery-image')); ?></div><?php } ?>
  </div>
</div>
<?php
}