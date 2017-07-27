/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, document, Site, WP, Swiper, google */

Site = {
  basicAnimationSpeed: 400,
  fastAnimationSpeed: 200,
  mobileThreshold: 800,
  autoCloseThreshold: 4500,

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
    _this.News.resize();
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

    if (_this.$news.length) {
      _this.newsLayout();
    }

    if ($('.image-cover').length) {
      $('.image-cover').on('load', function() {
        _this.setImageCover($(this));
      });
    }

    _this.layout();

  },

  resize: function() {
    var _this = this;

    _this.windowHeight = $(window).height();
    _this.windowWidth = $(window).width();

    _this.layout();

    if (_this.$news.length) {
      _this.newsLayout();
    }

    _this.imageCovers();
  },

  layout: function() {
    var _this = this;

    var topHeight = _this.$mainContentTopColumn.outerHeight(true);

    _this.$mainContentColumn.css({
      'max-height': (_this.windowHeight - topHeight) + 'px',
    });

  },

  newsLayout: function() {
    var _this = this;

    _this.$news.css('width', 'initial');

    if (_this.windowWidth > 880 && _this.windowWidth < 1200) {
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
      var $image = $(this);

      _this.setImageCover($image);
    });

  },

  setImageCover: function($image) {
    var _this = this;
    var imageWidth = $image.width();
    var imageHeight = $image.height();

    if ((_this.windowWidth / _this.windowHeight) > (imageWidth / imageHeight)) {
      _this.fitImageToWidth($image, imageHeight, imageWidth);
    } else {
      _this.fitImageToHeight($image, imageHeight, imageWidth);
    }

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

    if ($('body').hasClass('single-project') || $('body').hasClass('blog')) {
      _this.initAutoclose();
    }

  },

  bind: function() {

    $('.menu-column-top').click(function(e) {
      var $target = $(this).parent();

      if ($target[0].id === 'main-menu') {
        if ($('#main-menu .menu-column-content:visible').length === 0) {
          $('#menus').addClass('main-menu-active');
        } else {
          $('#menus').removeClass('main-menu-active');
        }
      }

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

      if ($target.find('.menu-column-content:visible').length === 0) {
        $target.addClass('menu-active');
      } else {
        $target.removeClass('menu-active');
      }

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

  initAutoclose: function() {
    var _this = this;

    _this.setAutocloseTimeout();

    $('body').on('mouseover', '#main-menu, #submenu', function() {
      window.clearTimeout(_this.autoClose);
    });

    $('body').on('mouseout', '#main-menu, #submenu', function() {
      _this.setAutocloseTimeout();
    });
  },

  setAutocloseTimeout: function() {
    var _this = this;

    _this.autoClose = setTimeout(function() {
      _this.closeMenus();
      if ($('#news-post-shim').length) {
        Site.News.removeShim();
      }
    }, Site.autoCloseThreshold);
  },

  closeMenus: function() {
    var $targets = $('#main-menu, #submenu');
    $targets.removeClass('menu-active');
    $targets.children('.menu-column-content').slideUp(Site.basicAnimationSpeed);
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

    _this.$news = $('#news-posts');

    if (_this.$news.length) {
      _this.$overlay = $('#news-overlay');
      _this.$overlayContent = $('#news-overlay-content');

      _this.initMasonry();
      _this.bind();
    }

  },

  bind: function() {
    var _this = this;

    $('#news-overlay-close').click(function(e) {
      e.preventDefault();

      _this.closeOverlay();
    });

    $('.news-header').click(function() {
      var $post = $(this).parent();

      if ($post.data('drawer')) {
        if ($post.hasClass('js-drawer-open')) {
          _this.closeDrawer($post);
        } else {
          _this.openDrawer($post);
        }
      } else {
        var content = $post.find('.news-post-content').html();

        _this.openOverlay(content);
      }

      _this.shaveText($post);

    });

    $('.news-post-close').click(function() {
      var $post = $(this).parent().parent().parent();

      console.log($(this));

      _this.closeDrawer($post);
    });

    $('.news-post-drawer-close').click(function() {
      var $post = $(this).parent().parent();

      _this.closeDrawer($post);
    });

  },

  resize: function() {
    var _this = this;

    $('.news-post.js-drawer-open').each(function(index, item) {
      _this.shaveText($(item));
    });
  },

  shaveText: function($item) {
    var _this = this;

    var $itemsContent = $item.find('.news-post-content');

    var height = $itemsContent.height();
    var closeHeight = $item.find('.news-post-close').outerHeight(true);

    $item.find('.news-post-caption').shave(height - closeHeight);
  },

  initMasonry: function() {
    var _this = this;

    _this.$news.imagesLoaded( function() {
      _this.$news.masonry({
        percentPosition: true,
        itemSelector: '.news-masonry-item',
        columnWidth: _this.$news.find('.news-masonry-item')[1],
        transitionDuration: 0
      });
    });

    _this.$news[0].addEventListener('load', function() {
      _this.$news.masonry();
    }, true);

  },

  reloadMasonry: function() {
    var _this = this;

    _this.$news.masonry();
  },

  removeShim: function() {
    var _this = this;

    _this.$news.masonry('remove', $('#news-post-shim')).masonry('layout');
  },

  openDrawer: function($post) {
    var _this = this;

    $post.addClass('js-drawer-open');
    $post.find('.news-post-content').show();
    _this.reloadMasonry();
  },

  closeDrawer: function($post) {
    var _this = this;

    $post.removeClass('js-drawer-open');
    $post.find('.news-post-content').hide();
    _this.reloadMasonry();
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

    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAPzyGEDNdsIcsiFdzdJM56py5BjlghcRE&callback=Site.Map.initialize';
    document.body.appendChild(script);
  },

  initialize: function() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
      mapTypeId: 'satellite',
      mapTypeControl: false,
      panControl: false,
      zoomControl: false,
      scaleControl: false,
      streetViewControl: false,
      overviewMapControl: false,
      disableDoubleClickZoom: false,
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
