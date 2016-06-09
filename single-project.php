<?php
get_header();

if( have_posts() ) {
  while( have_posts() ) {
    the_post();
    $gallery = get_post_meta($post->ID, '_igv_gallery');
?>
    <main id="main-content" class="menu-column">
      <div class="menu-column-top font-uppercase">
        <?php the_title(); ?>

        <ul id="gallery-pagination"></ul>

      </div>
      <nav class="menu-column-content menu-background">
        <section id="posts">

          <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

            <?php the_content(); ?>

          </article>

        </section>
      </nav>
    </main>

  </div>
<?php
  }
}
?>

  <section id="images" class="u-flex-center">

    <?php
      if (!empty($gallery)) {
    ?>
    <!-- Slider main container -->
    <div id="swiper-gallery" class="swiper-container">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <?php
          foreach ($gallery[0] as $slide) {
        ?>
        <div class="swiper-slide"><?php echo wp_get_attachment_image($slide, 'gallery'); ?></div>
        <?php
          }
        ?>
      </div>
    </div>
    <?php
      }
    ?>

  </section>

<?php
get_footer();
?>
