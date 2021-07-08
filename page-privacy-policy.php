<?php
get_header();
?>
  </div>
  <section id="news">
    <div id="news-posts">
<!--       <div id="news-post-shim" class="news-masonry-item"></div> -->
      
       <?php the_content(); ?>
       
<!--
        <article class="news-post news-masonry-item" id="post-<?php echo $item['id']; ?>" data-drawer="true">
          <header class="news-header u-pointer">
            <img class="news-image u-block" src="<?php echo $image; ?>">
            <div class="news-post-title-holder u-flex-center text-align-center">
              <div class="news-post-title">
                <h4><?php echo $date; ?></h4>
                 </div>
            </div>
          </header>

          <div class="news-post-content font-copy">
            <div>
              <div class="news-post-mobile-header">
                <h4><?php echo $date; ?></h4>
                  </div>
              <div class="news-post-close margin-bottom-tiny text-align-right font-color-yellow font-uppercase u-pointer">Close</div>

              <p class="news-post-caption"><?php echo $caption; ?></p>
            </div>
          </div>
        </article>
-->


      </div>
    </div>



<!--
    <a href="https://instagram.com/<?php echo $instagram_handle; ?>" target="_blank" rel="noreferrer">
      <nav id="pagination" class="news-masonry-item font-uppercase">
        See more on Instagram
      </nav>
    </a>
-->


  </section>

<?php
  
get_footer();
?>
