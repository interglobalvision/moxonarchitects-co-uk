<?php
get_header();
?>
  </div>
<?php

  if (!is_front_page()) {
    if( have_posts() ) {
    ?>
    <section id="news">
      <div id="news-posts">
        <div id="news-post-shim" class="news-masonry-item"></div>
    <?php
      while( have_posts() ) {
        the_post();
        $draw = get_post_meta($post->ID, '_igv_draw_post', true);
    ?>
        <article <?php post_class('news-post news-masonry-item'); ?> id="post-<?php the_ID(); ?>" data-drawer="<?php if ($draw) {echo 'true';} ?>">
          <header class="news-header u-pointer">
          <?php the_post_thumbnail('news-thumb'); ?>
          <div class="news-post-title u-flex-center text-align-center"><?php the_title(); ?></div>
          </header>

          <div class="news-post-content">
            <h2 class="news-post-title margin-bottom-tiny text-align-center js-fix-widows"><?php the_title(); ?></h2>
            <div class="news-post-date text-align-center font-copy font-uppercase margin-bottom-basic"><?php the_time('F Y'); ?></div>
            <div class="font-copy">
              <?php the_content(); ?>
            </div>
            <span class="news-post-drawer-close u-pointer font-color-yellow">&times;</span>
          </div>
        </article>
    <?php
      }
    ?>
      </div>
    <?php
      get_template_part('partials/pagination');
    ?>
    </section>

    <section id="news-overlay">
      <div id="news-overlay-close" class="u-pointer font-color-yellow font-size-h1">&times;</div>
      <div id="news-overlay-content" class="font-color-white"></div>
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
