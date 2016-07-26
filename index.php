<?php
get_header();
?>
  </div>
<?php

  if (!is_front_page()) {
    if( have_posts() ) {
    ?>
    <section id="news">
    <?php
      while( have_posts() ) {
        the_post();
    ?>

        <article <?php post_class('news-post'); ?> id="post-<?php the_ID(); ?>">

          <?php the_post_thumbnail('news-thumb'); ?>
          <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

        </article>

    <?php
      }
    ?>
    </section>
    <?php
    } else {
    ?>
    <section id="news">
      <article class="u-alert"><?php _e('Sorry, no posts matched your criteria'); ?></article>
    </section>
    <?php
    }
  }
?>


<?php
get_footer();
?>
