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

    <?php
      if (!empty($gallery)) {
        render_gallery($gallery);
      }
    ?>

  </section>

<?php
get_footer();
?>
