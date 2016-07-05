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

        <ul id="gallery-pagination" class="only-desktop"></ul>

      </div>
      <nav class="menu-column-content menu-background">
        <section id="project">

          <article <?php post_class('font-copy'); ?> id="post-<?php the_ID(); ?>">

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

  <section id="images">
    <div id="project-gallery" class="only-desktop">
    <?php
      if (!empty($gallery)) {
        render_gallery($gallery);
      }
    ?>
    </div>
    <div id="project-images" class="only-mobile">
    <?php
      if (!empty($gallery)) {
        foreach ($gallery[0] as $image) {
          echo wp_get_attachment_image($image, 'mobile-project-image', null, array('class' => 'mobile-project-image'));
        }
      }
    ?>
    </div>
  </section>

<?php
get_footer();
?>
