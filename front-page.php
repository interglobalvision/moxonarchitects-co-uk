<?php
get_header();

$front_page_projects = IGV_get_option('_igv_front_page');
// split comma delimited string into array
$front_page_projects = preg_split('/[\s,]+/', $front_page_projects);
// get random index for array
$random_index = rand(0, (count($front_page_projects) - 1));

$front_page_gallery = get_post_meta($front_page_projects[$random_index], '_igv_gallery');
?>
  </div>

  <a href="<?php echo get_the_permalink($front_page_projects[$random_index]); ?>">
  <section id="images" class="u-flex-center">
    <?php
      if (!empty($front_page_gallery)) {
        render_gallery($front_page_gallery);
      }
    ?>
  </section>
  </a>

<?php
get_footer();
?>
