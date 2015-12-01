<?php
/**
 *
 * @package moxon2014
 * Template Name: Contact Page
 */

get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();  ?>

<script type="text/javascript">

jQuery(function($) {
    // Asynchronously Load the map API
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
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
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);

    // Multiple Markers
    var markers = [
        ['London', 51.521351,-0.196285],
        ['Scotland', 57.0434123,-3.2153803]
    ];

    // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>London</h3>' +
        <?php if( get_field('lndn_address_line_01') ): ?>'<p><?php the_field('lndn_address_line_01'); ?></p>' +<?php endif; ?>
        <?php if( get_field('lndn_address_line_02') ): ?>'<p class="address"><?php the_field('lndn_address_line_02'); ?></p>' +<?php endif; ?>
        <?php if( get_field('lndn_address_line_03') ): ?>'<p class="address"><?php the_field('lndn_address_line_03'); ?></p>' +<?php endif; ?>
        <?php if( get_field('lndn_telephone_number') ): ?>'<p>T: <?php the_field('lndn_telephone_number'); ?></p>' +<?php endif; ?>
        <?php if( get_field('lndn_fax_number') ): ?>'<p class="address">F: <?php the_field('lndn_fax_number'); ?></p>' +<?php endif; ?>
        <?php if( get_field('email_address') ): ?>'<p class="address">E: <a href="mailto:<?php the_field('email_address'); ?>" title="email Moxon"><?php the_field('email_address'); ?></a</p>' +<?php endif; ?>
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Scotland</h3>' +
        '<p><?php the_field('aber_address'); ?></p>' +
        '<p>T:<?php the_field('aber_telephone_number'); ?></p>' +
        <?php if( get_field('aber_fax_number') ): ?>'<p><?php the_field('aber_fax_number'); ?></p>' +<?php endif; ?>
        <?php if( get_field('alt_email_address') ): ?>'<p>E: <?php the_field('alt_email_address'); ?></p>' +<?php endif; ?>
        '</div>']
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

  <div id="contact-copy-panel">
    <nav id="copy-toggle" class="active">
      <?php the_title(); ?>
      <span class="menu-toggle-indicator menu-toggle-close">–</span><span class="menu-toggle-indicator menu-toggle-open">+</span>
    </nav>
    <div id="project-copy" data-section="contact">
			<?php the_content(); ?>
    </div>
	</div>

	<!--Google Maps APIv3 Background-->
	<div id="canvas_holder">

<!-- START -->

<!--
		<ul class="toggle-view-contact-info">
			<li>
				<h3><?php the_title(); ?> <span class="indicator">–</span></h3>
				<div class="panel">
					<div class="project-content-contact">
					<?php the_content(); ?>
					</div>
				</div>
			</li>
		</ul>
-->

<!-- FINITO -->

		<div id="map_canvas"></div><button style="display:none;" type="button" id="test" onclick="map_canvas.setZoom(6)"></button>

	</div><!-- End Google Maps Background -->

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>