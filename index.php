<?php
get_header();
?>

    <main id="main-content" class="menu-column">
      <nav class="menu-column-top">
        Title of Post
      </nav>
      <div class="menu-column-content">
      // level 3 where content goes
        <section id="posts">

      <?php
      if( have_posts() ) {
        while( have_posts() ) {
          the_post();
      ?>

          <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

            <?php the_content(); ?>

          </article>

      <?php
        }
      } else {
      ?>
          <article class="u-alert"><?php _e('Sorry, no posts matched your criteria'); ?></article>
      <?php
      } ?>

        </section>
      </div>
    </main>

  </section>

  <section id="images" class="u-flex-center">
    // images go here.
    // context specific to different routes/templates
  </section>

<?php
get_footer();
?>