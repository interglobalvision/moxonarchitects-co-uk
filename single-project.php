<?php
get_header();

if( have_posts() ) {
  while( have_posts() ) {
    the_post();
    $videos = get_post_meta($post->ID, '_igv_project_videos');
    $gallery = get_post_meta($post->ID, '_igv_gallery');
            
    $insert_videos = [];
    
    if (!empty($videos)) {
      foreach($videos[0] as $video) {        
        if (isset($video['video']) && isset($video['video_mp4'])) {  
          $insert_videos[intval($video['index']) - 1] = [
            $video['video'], $video['video_mp4']
          ];
        }

      }
    }
?>
    <main id="main-content" class="menu-column">
      <div class="menu-column-top font-uppercase">
        <?php the_title(); ?>

        <ul id="gallery-pagination" class="only-desktop"></ul>

      </div>
      <nav class="menu-column-content menu-background">
        <section id="project">

          <article <?php post_class('font-copy'); ?> id="post-<?php the_ID(); ?>">

            <?php the_content(); ?>

          </article>

        </section>
      </nav>
    </main>

  </div>
<?php
  }
}
?>

  <section id="images">
    <div id="project-gallery" class="only-desktop">
    <?php
      if (!empty($gallery)) {
        render_gallery($gallery, $insert_videos);
      }
    ?>
    </div>
    <div id="project-images" class="only-mobile">
    <?php
      if (!empty($gallery)) {
        foreach ($gallery[0] as $index => $image) {
          if (array_key_exists($index, $insert_videos)) {
    ?>
      <video autoplay muted loop>
        <source src="<?php echo $insert_videos[$index][0]; ?>" type="video/webm">
        <source src="<?php echo $insert_videos[$index][1]; ?>" type="video/mp4">
      </video>
    <?php
          }
          
          echo wp_get_attachment_image($image, 'mobile-project-image', null, array('class' => 'mobile-project-image'));
        }
      }
    ?>
    </div>
  </section>

<?php
get_footer();
?>
