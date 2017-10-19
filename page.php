<?php
get_header();
  if( have_posts() ) {
    while( have_posts() ) {
      the_post();
?>
    <main id="main-content" class="menu-column menu-active">
      <div class="menu-column-top font-uppercase">
        &nbsp;
      </div>
      <nav class="menu-column-content menu-background">
        <section id="page">

          <article <?php post_class('font-copy'); ?> id="post-<?php the_ID(); ?>">

            <?php the_content(); ?>

          </article>

        </section>
      </nav>
    </main>

  </div>

<?php
      $video_webm = get_post_meta($post->ID, '_igv_video_webm', true);
      $video_mp4 = get_post_meta($post->ID, '_igv_video_mp4', true);

      $thumbnail_id = get_post_thumbnail_id();

      if (!empty($video_webm) || !empty($video_mp4)) {
?>
  <section id="background-video-holder">
    <video id="background-video" autoplay muted loop>
      <?php
        if (!empty($video_webm)) {
      ?>
      <source src="<?php echo $video_webm; ?>" type="video/webm"/>
      <?php
        }
      ?>
      <?php
        if (!empty($video_mp4)) {
      ?>
      <source src="<?php echo $video_mp4; ?>" type="video/mp4"/>
      <?php
        }
      ?>
    </video>
  </section>
<?php
      } else if (!empty($thumbnail_id)) {
?>
  <section id="images" class="u-flex-center">
    <div class="image-cover-holder">
      <?php echo wp_get_attachment_image($thumbnail_id, 'gallery-huge', null, array('class' => 'image-cover gallery-image-huge')); ?>
    </div>
  </section>
<?php
      }
    }
  }
get_footer();
?>
