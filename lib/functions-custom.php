<?php

// Custom functions (like special queries, etc)

// Autolink hashtags to instagram

function link_ig_hashtags($text) {
  $pattern  = '/#([\w]+)/i';
  $text = preg_replace_callback($pattern, function($matches) {
    $text = $matches[0];
    $hash = substr($text, 1);;
    return '<a href="https://www.instagram.com/explore/tags/' . $hash . '" rel="nofollow" target="_blank">' . $text . '</a>';
  }, $text);

  return $text;
}

// Check if is active page (for header)

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

function render_gallery($gallery, $insert_videos = []) {
?>
<div id="swiper-gallery" class="swiper-container">
  <div class="swiper-nav swiper-next"></div><div class="swiper-nav swiper-prev"></div>
  <div class="swiper-wrapper">
<?php
  foreach ($gallery[0] as $index => $slide) {
    if (array_key_exists($index, $insert_videos)) {
?>
    <div class="swiper-slide">
      <video autoplay muted loop>
        <source src="<?php echo $insert_videos[$index][0]; ?>" type="video/webm">
      </video>
    </div>
<?php 
    }
?>
    <div class="swiper-slide">
      <?php echo wp_get_attachment_image($slide, 'gallery-huge', null, array('class' => 'gallery-image gallery-image-huge')); ?>
    </div>
<?php } ?>
  </div>
</div>
<?php
}
