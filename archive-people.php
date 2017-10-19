<?php
get_header();

$video_webm = IGV_get_option('_igv_people_video_webm');
$video_mp4 = IGV_get_option('_igv_people_video_mp4');

$background = IGV_get_option('_igv_people_background_id');
?>
    <main id="main-content" class="menu-column menu-active">
      <div class="menu-column-top font-uppercase">
        &nbsp;
      </div>
      <nav class="menu-column-content">
        <section id="people">
        <?php
          if( have_posts() ) {
            while( have_posts() ) {
              the_post();
              $title = get_post_meta($post->ID, '_igv_title');
              $subline = get_post_meta($post->ID, '_igv_subline');
        ?>
          <article <?php post_class('menu-background'); ?> id="post-<?php the_ID(); ?>">
            <header class="people-header u-pointer">
              <h3 class="margin-bottom-micro"><span class="font-uppercase"><?php the_title(); ?></span><?php
                if (!empty($title)) {
                  echo ', ' . $title[0];
                }
              ?></h3>
              <?php
                if (!empty($subline)) {
                  echo '<h4 class="margin-bottom-micro">' . $subline[0] . '</h4>';
                }
              ?>
              <?php the_post_thumbnail('people'); ?>
            </header>
            <div class="people-copy font-copy margin-top-small">
              <?php the_content(); ?>
            </div>
          </article>
        <?php
            }
          }
        ?>
        </section>
      </nav>
    </main>

  </div>

<?php
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
  } else if (!empty($background)) {
?>
  <section id="images" class="u-flex-center">
    <div class="image-cover-holder">
      <?php echo wp_get_attachment_image($background, 'gallery-huge', null, array('class' => 'image-cover gallery-image-huge')); ?>
    </div>
  </section>
<?php
  }
get_footer();
?>
