/* jshint browser: true, devel: true */
/* global api */

function scrollCopy() {

  var menuHeight = jQuery('#copy-toggle').outerHeight();
  var maxHeight = jQuery(window).height() - menuHeight;

  jQuery('#project-copy').css({
    'max-height': maxHeight + 'px',
  });
}

jQuery(document).ready(function() {
  // SLIDER
  var slider = new Swiper ('.swiper-container', {
    pagination: '#slide-list',
    paginationClickable: true,
    loop: true,
    effect: 'fade',
    fade: {
      crossFade: true,
    },
    preloadImages: true,
  });

  // SLIDER NEXT/PREV

  jQuery('#prevslide').on('click', function() {
    slider.slidePrev();
  });

  jQuery('#nextslide').on('click', function() {
    slider.slideNext();
  });

  // MENU ACTIVE HACK

  var postData = jQuery('#project-copy').data();

  if (typeof postData !== 'undefined') {

    if (typeof postData.type !== 'undefined') {
      var type = postData.type;

      jQuery('#menu-type-' + type).addClass('active');
    }

    if (typeof postData.section !== 'undefined') {
      var section = postData.section;

      console.log(section);
      jQuery('#menu-section-' + section).addClass('active');
    }

  }

  // MENU TOGGLES

  jQuery('.menu-toggle').on('click', function() {
    jQuery(this).siblings('.menu').slideToggle();
    jQuery(this).toggleClass('active');
  });

  jQuery('#copy-toggle p, .menu-toggle-indicator').on('click', function() {
    jQuery('#project-copy').slideToggle();
    jQuery(this).toggleClass('active');
  });

  // MOBILE MENU TOGGLES

  jQuery('#mobile-menu-toggle').on('click', function() {
    jQuery('#mobile-menu-holder').toggle();
    jQuery('#mobile-menu-mask').toggle();
    jQuery('#mobile-menu').toggle();
    jQuery(this).toggleClass('active');

    jQuery('#project-copy').hide();
    jQuery('#copy-toggle').removeClass('active');

//     jQuery('#copy-toggle').click();
  });

  jQuery('.mobile-submenu-trigger').on('click', function() {
    jQuery(this).siblings('.mobile-submenu').slideToggle();
    jQuery(this).toggleClass('active');
  });

  // CONTENT SCROLL WHEN NEEDED

  scrollCopy();
  jQuery(window).on('resize', function() {
    scrollCopy();
  });

});

jQuery(document).ready(function() {

    // col1 normal toggle (home etc)
    jQuery('.toggle-view li h3').click(function() {

        var text = jQuery(this).siblings('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery('span.indicator-main-menu').html('–');
        } else {
            text.slideUp('200');
            jQuery('span.indicator-main-menu').html('+');
        }

    });

    // col1 news
    jQuery('.toggle-view-news li h3').click(function() {

        var text = jQuery(this).siblings('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery('span.indicator-main-menu').html('–');
        } else {
            text.slideUp('200');
            jQuery('span.indicator-main-menu').html('+');
        }

    });

    // col1 everything else!
    jQuery('.toggle-view-all li h3').click(function() {

        var text = jQuery(this).siblings('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery('span.indicator-main-menu').html('–');
        } else {
            text.slideUp('200');
            jQuery('span.indicator-main-menu').html('+');
        }

    });

    // project cat
    jQuery('.toggle-view-project-cat li h3').click(function() {

        var text = jQuery(this).siblings('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery('span.indicator-cat-menu').html('–');
        } else {
            text.slideUp('200');
            jQuery('span.indicator-cat-menu').html('+');
        }

    });

    // project info
    jQuery('.toggle-view-project-info li h3').click(function() {

        var text = jQuery(this).siblings('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery('span.indicator-project').html('–');
        } else {
            text.slideUp('200');
            jQuery('span.indicator-project').html('+');
        }

    });

    // phone
    jQuery('.toggle-view-project-info-phone li h3').click(function() {

        var text = jQuery(this).siblings('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery('span.indicator-project').html('–');
        } else {
            text.slideUp('200');
            jQuery('span.indicator-project').html('+');
        }

    });

    // people info
    jQuery('.toggle-view-people-info li h3').click(function() {

        var text = jQuery(this).siblings('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery('span.indicator').html('–');
        } else {
            text.slideUp('200');
            jQuery('span.indicator').html('+');
        }

    });

    // studio info
    jQuery('.toggle-view-studio-info li h3').click(function() {

        var text = jQuery(this).siblings('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery('span.indicator').html('–');
        } else {
            text.slideUp('200');
            jQuery('span.indicator').html('+');
        }

    });

    // contact info
    jQuery('.toggle-view-contact-info li h3').click(function() {

        var text = jQuery(this).siblings('div.panel');

        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery('span.indicator').html('–');
        } else {
            text.slideUp('200');
            jQuery('span.indicator').html('+');
        }

    });

    // woop v02
    jQuery('.project-content').scroll(function() {

        if (jQuery(this).scrollTop() > 0) {
            jQuery('.bottom').fadeOut();
        } else {
            jQuery('.bottom').fadeIn();
        }
    });

    // logo fade in
    jQuery(document).ready(function() {
        jQuery('.moxonlogo').fadeIn(2000);
    });

    jQuery(document).ready(function() {
      jQuery('.moxonlogogeneral').fadeIn(2000);
    });

});
