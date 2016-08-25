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

  <section id="images" class="u-flex-center">
    <div class="image-cover-holder">
      <?php
        $thumbnail_id = get_post_thumbnail_id();
        if (!empty($thumbnail_id)) {
          echo wp_get_attachment_image($thumbnail_id, 'gallery', null, array('class' => 'image-cover gallery-image-normal'));
          echo wp_get_attachment_image($thumbnail_id, 'gallery-large', null, array('class' => 'image-cover gallery-image-large'));
          echo wp_get_attachment_image($thumbnail_id, 'gallery-huge', null, array('class' => 'image-cover gallery-image-huge'));
        }
      ?>
    </div>
  </section>

<?php
    }
  }
get_footer();
?>
