<?php
get_header();
?>
  </div>
<?php

$instagram_feed = get_transient('instagram_feed');

if (empty($instagram_feed))  {
  $instagram_handle = IGV_get_option('_igv_socialmedia_instagram');

  if (!empty($instagram_handle)) {

    $url = 'https://www.instagram.com/'. $instagram_handle .'/media/';
    $results = json_decode(file_get_contents($url), true);

    if (!empty($results)) {
      $instagram_feed = $results;
      set_transient('instagram_feed', $results);
    }

  }
}

if (!empty($instagram_feed))  {
?>
  <section id="news">
    <div id="news-posts">
      <div id="news-post-shim" class="news-masonry-item"></div>

<?php
foreach($instagram_feed['items'] as $item) {
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

          <div class="news-post-content">
            <div class="font-copy">
              <p><?php echo $caption; ?></p>
            </div>
            <span class="news-post-drawer-close u-pointer font-color-yellow">&times;</span>
          </div>
        </article>
<?php
  }
?>

      </div>
    </div>
  </section

<?php
  }
get_footer();
?>
