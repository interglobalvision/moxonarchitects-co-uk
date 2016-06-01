/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Site, Modernizr */

var basicAnimationSpeed = 400;

Site = {
  mobileThreshold: 601,
  init: function() {
    var _this = this;

    $(window).resize(function(){
      _this.onResize();
    });

    Site.Menus.init();

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

    $('.menu-column-top').click(function() {
      var $target = $(this).parent();

      $target.toggleClass('menu-active');
      $target.children('.menu-column-content').slideToggle(basicAnimationSpeed)
    });

  },
};

jQuery(document).ready(function () {
  'use strict';

  Site.init();

});
