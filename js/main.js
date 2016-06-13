/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Site, WP, Modernizr, Swiper, google */

var basicAnimationSpeed = 400;

Site = {
  mobileThreshold: 601,
  init: function() {
    var _this = this;

    $(window).resize(function(){
      _this.onResize();
    });

    _this.Menus.init();
    _this.Gallery.init();
    _this.Layout.init();

    if ($('body').hasClass('page-contact')) {
      _this.Map.init();
    }

  },

  onResize: function() {
    var _this = this;

    _this.Layout.layout();

  },

  fixWidows: function() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();
      string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
      $(this).html(string);
    });
  },
};

Site.Layout = {
  init: function() {
    var _this = this;

    _this.$mainContentColumn = $('#main-content .menu-column-content');
    _this.$mainContentTopColumn = $('#main-content .menu-column-top');

    this.layout();
  },

  layout: function() {
    var _this = this;

    var topHeight = _this.$mainContentTopColumn.outerHeight(true);
    var windowHeight = $(window).height();

    _this.$mainContentColumn.css({
      'max-height': (windowHeight - topHeight) + 'px',
    });

  },
};

Site.Menus = {
  init: function() {

    this.bind();

  },

  bind: function() {

    $('.menu-column-top').click(function(e) {
      var $target = $(this).parent();

      // if gallery pagination is clicked do nothing
      if ($(e.target).hasClass('swiper-pagination-bullet') || e.target.id === 'gallery-pagination') {
        return;
      }

      $target.toggleClass('menu-active');
      $target.children('.menu-column-content').slideToggle(basicAnimationSpeed);
    });

  },
};

Site.Gallery = {
  init: function() {
    var _this = this;

    _this.$gallery = $('#swiper-gallery');

    if (_this.$gallery.length) {

      _this.Swiper = new Swiper('#swiper-gallery', {
        loop: true,
        pagination: '#gallery-pagination',
        paginationType: 'bullets',
        paginationHide: false,
        paginationElement: 'li',
        paginationClickable: true,
        fade: {
          crossFade: true,
        },
        preloadImages: true,
        onClick: function(swiper) {
          swiper.slideNext();
        },
      });

    }

  },
};

Site.Map = {
  init: function() {

    // Asynchronously Load the map API
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?&callback=Site.Map.initialize";
    document.body.appendChild(script);

  },

  initialize: function() {

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
        };
      })(marker, i));

      // Automatically center the map fitting all markers on the screen
      map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
      this.setZoom(6);
      google.maps.event.removeListener(boundsListener);
    });

  },
};

jQuery(document).ready(function () {
  'use strict';

  Site.init();

});
