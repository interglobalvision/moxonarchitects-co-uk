<?php
if( get_next_posts_link() || get_previous_posts_link() ) {
?>
  <!-- post pagination -->
  <nav id="pagination" class="news-masonry-item font-uppercase">
<?php
$previous = get_previous_posts_link('Newer');
$next = get_next_posts_link('Older');
if ($previous) {
  echo $previous;
}
if ($previous && $next) {
  echo ' &mdash; ';
}
if ($next) {
  echo $next;
}
?>
  </nav>
<?php
}
?>