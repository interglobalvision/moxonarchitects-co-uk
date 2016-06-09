<section id="scripts">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php bloginfo('stylesheet_directory'); ?>/js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
  <?php
    if (is_page('contact')) {
      global $post;
      $meta = get_post_meta($post->ID);
  ?>
  <script type="text/javascript">

    jQuery(function($) {
      // Asynchronously Load the map API
      var script = document.createElement('script');
      script.src = "http://maps.googleapis.com/maps/api/js?&callback=initialize";
      document.body.appendChild(script);
    });

    function initialize() {
      var map;
      var bounds = new google.maps.LatLngBounds();
      var mapOptions = {
        mapTypeId: 'satellite',
        panControl: false,
        zoomControl: false,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: false,
        draggable: true,
        disableDoubleClickZoom: false,
        scrollwheel: true,
      };

      // Display a map on the page
      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      map.setTilt(45);

      // Multiple Markers
      var markers = [
        ['London', 51.521351,-0.196285],
        ['Scotland', 57.0434123,-3.2153803]
      ];

      // Info Window Content
      var infoWindowContent = [
        ['<div class="info_content">' + WP.mapData.London + '</div>'],
        ['<div class="info_content">' + WP.mapData.Scotland + '</div>'],
      ];

      // Display multiple markers on a map
      var infoWindow = new google.maps.InfoWindow(), marker, i;

      // Loop through our array of markers & place each one on the map
      for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
          position: position,
          map: map,
          title: markers[i][0]
        });

        // Allow each marker to have an info window
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
      }

      // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
      var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(6);
        google.maps.event.removeListener(boundsListener);
      });
    }
  </script>
  <?php
    }

    wp_footer(); ?>
</section>