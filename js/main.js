/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Site, Modernizr, Swiper */

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

  },

  onResize: function() {
    var _this = this;

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

jQuery(document).ready(function () {
  'use strict';

  Site.init();

});
