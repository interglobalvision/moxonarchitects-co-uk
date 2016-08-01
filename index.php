<?php
get_header();
?>
  </div>
<?php

  if (!is_front_page()) {
    if( have_posts() ) {
    ?>
    <section id="news">
      <div id="news-post-shim" class="news-masonry-item"></div>
    <?php
      while( have_posts() ) {
        the_post();
    ?>

        <article <?php post_class('news-post news-masonry-item'); ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('news-thumb'); ?>
            <div class="news-post-title u-flex-center text-align-center"><?php the_title(); ?></div>
          </a>

          <div class="news-post-content">
            <?php the_content(); ?>
          </div>
        </article>

    <?php
      }
      get_template_part('partials/pagination');
    ?>
    </section>

    <section id="news-overlay">
      <a href="#" id="news-overlay-close">x</a>
      <div id="news-overlay-content"></div>
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
