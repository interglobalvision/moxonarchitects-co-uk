<?php
get_header();
?>
  </div>
<?php
$instagram_feed = get_transient('instagram_feed');
$instagram_handle = IGV_get_option('_igv_socialmedia_instagram');

if (empty($instagram_feed))  {

  if (!empty($instagram_handle)) {

    $url = 'https://www.instagram.com/'. $instagram_handle .'/media/';
    $results = json_decode(file_get_contents($url), true);

    if (!empty($results)) {
      $instagram_feed = $results;
      set_transient('instagram_feed', $results, 15 * MINUTE_IN_SECONDS);
    }

  }
}

if (!empty($instagram_feed))  {
?>
  <section id="news">
    <div id="news-posts">
      <div id="news-post-shim" class="news-masonry-item"><div id="news-post-shim-inside"></div></div>

<?php
$i = 0;
foreach($instagram_feed['items'] as $item) {
  if ($i === 19) {
    break;
  }

  $id = $item['id'];
  $image = $item['images']['standard_resolution'];
  $date = gmdate('d.m.Y', $item['created_time']);
  $location = $item['location']['name'];
  $caption = $item['caption']['text'];

?>
        <article class="news-post news-masonry-item" id="post-<?php echo $item['id']; ?>" data-drawer="true">
          <header class="news-header u-pointer">
            <img class="news-image u-block" src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>">
            <div class="news-post-title-holder u-flex-center text-align-center">
              <div class="news-post-title">
                <h4><?php echo $date; ?></h4>
    <?php
      if(!empty($location)){
    ?>
                <h4><?php echo $location; ?></h4>
    <?php
     }
    ?>
              </div>
            </div>
          </header>

          <div class="news-post-content font-copy">
            <div>
              <div class="news-post-mobile-header">
                <h4><?php echo $date; ?></h4>
    <?php
      if(!empty($location)){
    ?>
                <h4><?php echo $location; ?></h4>
    <?php
     }
    ?>
              </div>
              <div class="news-post-close margin-bottom-tiny text-align-right font-color-yellow font-uppercase u-pointer">Close</div>

              <p class="news-post-caption"><?php echo $caption; ?></p>
            </div>
          </div>
        </article>
<?php
  $i++;
  }
?>

      </div>
    </div>


<?php
  if (!empty($instagram_feed))  {
?>
    <a href="https://instagram.com/<?php echo $instagram_handle; ?>" target="_blank" rel="noreferrer">
      <nav id="pagination" class="news-masonry-item font-uppercase">
        See more on Instagram
      </nav>
    </a>
<?php
  }
?>

  </section>

<?php
  }
get_footer();
?>
