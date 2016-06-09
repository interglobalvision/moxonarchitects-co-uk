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

          <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

            <?php the_content(); ?>

          </article>

        </section>
      </nav>
    </main>

  </div>

  <div id="map">
    <div id="map-canvas"></div>
  </div>

<?php
    }
  }
get_footer();
?>
