<?php

// Custom functions (like special queries, etc)

function is_active_page($post_id) {

  if (is_page($post_id)) {
    echo 'class="font-color-active"';
  }

}