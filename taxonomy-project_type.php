<?php
get_header();

  if (!is_home()) {
?>
    <main id="main-content" class="menu-column menu-active">
      <div class="menu-column-top font-uppercase">
        &nbsp;
      </div>
      <nav class="menu-column-content menu-background">
        <section id="posts">

      <?php
	      
	      
	  global $wp_the_query;
$wp_the_query->posts = array_reverse($wp_the_query->posts);   // these two lines added 2019 to reverse mobile order
	      
	      
      if( have_posts() ) {
        while( have_posts() ) {
          the_post();
      ?>
          <a href="<?php the_permalink() ?>">
            <article <?php post_class('project-type-archive-post'); ?> id="post-<?php the_ID(); ?>">

              <?php the_post_thumbnail('project-type-archive'); ?>

              <div class="project-type-archive-post-title-holder">
                <h4 class="project-type-archive-post-title font-uppercase"><?php the_title(); ?></h4>
              </div>

            </article>
          </a>

      <?php
        }
      } else {
      ?>
          <article class="u-alert"><?php _e('Sorry, no posts matched your criteria'); ?></article>
      <?php
      } ?>

        </section>
      </nav>
    </main>

  </div>
<?php
  }
?>

  <section id="images" class="u-flex-center">
  </section>

<?php
get_footer();
?>
