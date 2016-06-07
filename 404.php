<?php
get_header();
?>
    <main id="main-content" class="menu-column menu-active">
      <div class="menu-column-top font-uppercase">
        404
      </div>
      <nav class="menu-column-content menu-background">
        <section id="posts">

      <?php
      if( have_posts() ) {
        while( have_posts() ) {
          the_post();
      ?>

          <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

          </article>

      <?php
        }
      } else {
      ?>
          <article class="u-alert"><?php _e('Sorry, nothing matched your criteria'); ?></article>
      <?php
      } ?>

        </section>
      </nav>
    </main>

  </div>

<?php
get_footer();
?>
