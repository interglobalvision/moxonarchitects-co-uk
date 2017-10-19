<?php
get_header();

$front_page_video_webm = IGV_get_option('_igv_front_video_webm');
$front_page_video_mp4 = IGV_get_option('_igv_front_video_mp4');

$front_page_projects = IGV_get_option('_igv_front_page');
// split comma delimited string into array
$front_page_projects = preg_split('/[\s,]+/', $front_page_projects);
// get random index for array
$random_index = rand(0, (count($front_page_projects) - 1));

$front_page_gallery = get_post_meta($front_page_projects[$random_index], '_igv_gallery');
?>
  </div>

<?php
  if (!empty($front_page_video_webm) || !empty($front_page_video_mp4)) {
?>
  <section id="background-video-holder">
    <video id="background-video" autoplay muted loop>
      <?php
        if (!empty($front_page_video_webm)) {
      ?>
      <source src="<?php echo $front_page_video_webm; ?>" type="video/webm"/>
      <?php
        }
      ?>
      <?php
        if (!empty($front_page_video_mp4)) {
      ?>
      <source src="<?php echo $front_page_video_mp4; ?>" type="video/mp4"/>
      <?php
        }
      ?>
    </video>
  </section>
<?php
  } else if (!empty($front_page_projects)) {
?>
  <a href="<?php echo get_the_permalink($front_page_projects[$random_index]); ?>">
  <section id="images" class="u-flex-center">
    <div class="image-cover-holder">
      <?php
        if (!empty($front_page_gallery)) {
          echo wp_get_attachment_image($front_page_gallery[0][0], 'gallery-huge', null, array('class' => 'image-cover gallery-image-huge'));
        }
      ?>
    </div>
  </section>
  </a>
<?php
  }
get_footer();
?>
