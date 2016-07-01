<?php
get_header();

$background = IGV_get_option('_igv_people_background_id');
?>
    <main id="main-content" class="menu-column menu-active">
      <div class="menu-column-top font-uppercase">
        &nbsp;
      </div>
      <nav class="menu-column-content">
        <section id="people">
        <?php
          if( have_posts() ) {
            while( have_posts() ) {
              the_post();
              $title = get_post_meta($post->ID, '_igv_title');
              $subline = get_post_meta($post->ID, '_igv_subline');
        ?>
          <article <?php post_class('menu-background'); ?> id="post-<?php the_ID(); ?>">
            <header class="people-header u-pointer">
              <h3 class="margin-bottom-micro"><span class="font-uppercase"><?php the_title(); ?></span><?php
                if (!empty($title)) {
                  echo ', ' . $title[0];
                }
              ?></h3>
              <?php
                if (!empty($subline)) {
                  echo '<h4>' . $subline[0] . '</h4>';
                }
              ?>
            </header>
            <div class="people-thumb u-cf">
              <?php the_post_thumbnail('people'); ?>
            </div>
            <div class="people-copy font-copy margin-top-small">
              <?php the_content(); ?>
            </div>
          </article>
        <?php
            }
          }
        ?>
        </section>
      </nav>
    </main>

  </div>

  <section id="images" class="u-flex-center">
    <div class="image-cover">
      <?php
        if (!empty($background)) {
          pr($background);
          echo wp_get_attachment_image($background, 'gallery');
        }
      ?>
    </div>
  </section>

<?php
get_footer();
?>
