<?php
get_header();

  if (!is_home()) {
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();
?>
    <main id="main-content" class="menu-column menu-active">
      <div class="menu-column-top font-uppercase">
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
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
  }
?>

  <section id="images" class="u-flex-center">
    // images go here.
    // context specific to different routes/templates
  </section>

<?php
get_footer();
?>
