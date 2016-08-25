/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, document, Site, WP, Modernizr, Swiper, google */

Site = {
  basicAnimationSpeed: 400,
  fastAnimationSpeed: 200,
  mobileThreshold: 800,
  init: function() {
    var _this = this;

    _this.Layout.init();
    _this.Menus.init();
    _this.News.init();

    $(window).resize(function() {
      _this.onResize();
    });

    $(document).ready(function () {

      _this.Gallery.init();

      if ($('body').hasClass('page-contact')) {
        _this.Map.init();
      }

    });

  },

  onResize: function() {
    var _this = this;

    _this.Layout.resize();

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

    _this.$news = $('#news');

    _this.$mainContentColumn = $('#main-content .menu-column-content');
    _this.$mainContentTopColumn = $('#main-content .menu-column-top');

    _this.windowHeight = $(window).height();
    _this.windowWidth = $(window).width();

    _this.layout();

    if (_this.$news.length) {
      _this.newsLayout();
    }
  },

  resize: function() {
    var _this = this;

    _this.windowHeight = $(window).height();
    _this.windowWidth = $(window).width();

    _this.layout();

    if (_this.$news.length) {
      _this.newsLayout();
    }
  },

  layout: function() {
    var _this = this;

    var topHeight = _this.$mainContentTopColumn.outerHeight(true);

    _this.$mainContentColumn.css({
      'max-height': (_this.windowHeight - topHeight) + 'px',
    });

    _this.imageCovers();
  },

  newsLayout: function() {
    var _this = this;

    _this.$news.css('width', 'initial');

    if (_this.windowWidth > 880) {
      _this.$news.css('width', '100%');

      var newsWidth = _this.$news.width();

      newsWidth = Math.floor(newsWidth);

      while (newsWidth % 3 !== 0) {
        newsWidth--;
      }

      _this.$news.width(newsWidth);
    }
  },

  imageCovers: function() {
    var _this = this;

    $('.image-cover').each(function() {
      var $image = $(this)
      var imageWidth = $image.width();
      var imageHeight = $image.height();

      if ((_this.windowWidth / _this.windowHeight) > (imageWidth / imageHeight)) {
        _this.fitImageToWidth($image, imageHeight, imageWidth);
      } else {
        _this.fitImageToHeight($image, imageHeight, imageWidth);
      }
    });

  },

  fitImageToHeight: function($image, imageHeight, imageWidth) {
    var _this = this;
    var offset = (((_this.windowHeight / imageHeight) * imageWidth) - _this.windowWidth) / 2;

    return $image.css({
      'width': 'auto',
      'height': _this.windowHeight + 'px',
      'left': '-' + offset + 'px',
      'top': '0',
    });

  },

  fitImageToWidth: function($image, imageHeight, imageWidth) {
    var _this = this;
    var offset = (((_this.windowWidth / imageWidth) * imageHeight) - _this.windowHeight) / 2;

    return $image.css({
      'height': 'auto',
      'width': _this.windowWidth + 'px',
      'top': '-' + offset + 'px',
      'left': '0',
    });

  }
};

Site.Menus = {
  init: function() {
    var _this = this;

    _this.bind();

    if ($('body').hasClass('post-type-archive-people')) {
      _this.bindPeople();
    }

  },

  bind: function() {

    $('.menu-column-top').click(function(e) {
      var $target = $(this).parent();

      // if mobile single project check which action depending on click target
      if ($('body').hasClass('single-project') && Site.Layout.windowWidth < Site.mobileThreshold) {
        if (!$(e.target).hasClass('icon-menu')) {
          $target = $('#main-content');
        }
      }

      // if gallery pagination is clicked do nothing
      if ($(e.target).hasClass('swiper-pagination-bullet') || e.target.id === 'gallery-pagination') {
        return;
      }

      $target.toggleClass('menu-active');
      $target.children('.menu-column-content').slideToggle(Site.basicAnimationSpeed);
    });

    $('#menu-studio-link').click(function(e) {
      if (Site.Layout.windowWidth < Site.mobileThreshold) {
        e.preventDefault();
        $('#mobile-studio-submenu').slideToggle(Site.basicAnimationSpeed);
      }
    });

  },

  bindPeople: function() {

    $('.people-header').click(function(e) {
      e.preventDefault();

      var $parent = $(this).parent();
      var $copy = $parent.children('.people-copy').first();

      if ($parent.hasClass('active')) {
        $parent.removeClass('active');
        $copy.slideUp(Site.basicAnimationSpeed);
      } else {
        $('article.people').removeClass('active');
        $('.people-copy').slideUp(Site.basicAnimationSpeed);
        $parent.addClass('active');
        $copy.slideDown(Site.basicAnimationSpeed);
      }
    });

  },
};

Site.Gallery = {
  init: function() {
    var _this = this;
    var autoplay =  false;

    _this.$gallery = $('#swiper-gallery');

    if ($('body').hasClass('home')) {
      autoplay = 3000;
    }

    if (_this.$gallery.length) {

      _this.Swiper = new Swiper('#swiper-gallery', {
        loop: true,
        nextButton: '.swiper-next',
        prevButton: '.swiper-prev',
        pagination: '#gallery-pagination',
        paginationType: 'bullets',
        paginationHide: false,
        paginationElement: 'li',
        paginationClickable: true,
        autoplay: autoplay,
        speed: Site.basicAnimationSpeed,
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

Site.News = {
  init: function() {
    var _this = this;

    _this.$news = $('#news');
    _this.$overlay = $('#news-overlay');
    _this.$overlayContent = $('#news-overlay-content');

    if (_this.$news.length) {
      _this.fixShimHeight();
      _this.initMasonry();
    }

    _this.bind();

  },

  bind: function() {
    var _this = this;

    $('#news-overlay-close').click(function(e) {
      e.preventDefault();

      _this.closeOverlay();
    });

    $('.news-post').click(function(e) {
      e.preventDefault();

      var content = $(this).find('.news-post-content').html();

      _this.openOverlay(content);
    });

  },

  initMasonry: function() {
    var _this = this;

    _this.$news.imagesLoaded( function() {
      _this.$news.masonry({
        percentPosition: true,
        itemSelector: '.news-masonry-item'
      });
    });
  },

  fixShimHeight: function() {
    var $shim = $('#news-post-shim');

    $shim.height($('#main-menu').height());
  },

  openOverlay: function(html) {
    var _this = this;

    _this.$overlayContent.html(html);
    _this.$overlay.fadeIn(Site.fastAnimationSpeed);
    $('html').addClass('stop-scroll');
    $(document).bind('keydown.closeOverlay', _this.overlayKeydown.bind(_this));
  },

  closeOverlay: function() {
    var _this = this;

    _this.$overlay.fadeOut(Site.fastAnimationSpeed);
    _this.$overlayContent.html('');
    $('html').removeClass('stop-scroll');
    $(document).unbind('keydown.closeOverlay');
  },

  overlayKeydown: function(e) {
    var _this = this;

    if (e.keyCode === 27) {
      _this.closeOverlay();
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
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function() {
      this.setZoom(6);
      google.maps.event.removeListener(boundsListener);
    });

  },
};

Site.init();