/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright å© 2008 George McGinley Smith
 * All rights reserved.
*/

jQuery.easing.jswing=jQuery.easing.swing;jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,f,a,h,g){return jQuery.easing[jQuery.easing.def](e,f,a,h,g)},easeInQuad:function(e,f,a,h,g){return h*(f/=g)*f+a},easeOutQuad:function(e,f,a,h,g){return -h*(f/=g)*(f-2)+a},easeInOutQuad:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f+a}return -h/2*((--f)*(f-2)-1)+a},easeInCubic:function(e,f,a,h,g){return h*(f/=g)*f*f+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeInOutCubic:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f+a}return h/2*((f-=2)*f*f+2)+a},easeInQuart:function(e,f,a,h,g){return h*(f/=g)*f*f*f+a},easeOutQuart:function(e,f,a,h,g){return -h*((f=f/g-1)*f*f*f-1)+a},easeInOutQuart:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f+a}return -h/2*((f-=2)*f*f*f-2)+a},easeInQuint:function(e,f,a,h,g){return h*(f/=g)*f*f*f*f+a},easeOutQuint:function(e,f,a,h,g){return h*((f=f/g-1)*f*f*f*f+1)+a},easeInOutQuint:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f*f+a}return h/2*((f-=2)*f*f*f*f+2)+a},easeInSine:function(e,f,a,h,g){return -h*Math.cos(f/g*(Math.PI/2))+h+a},easeOutSine:function(e,f,a,h,g){return h*Math.sin(f/g*(Math.PI/2))+a},easeInOutSine:function(e,f,a,h,g){return -h/2*(Math.cos(Math.PI*f/g)-1)+a},easeInExpo:function(e,f,a,h,g){return(f==0)?a:h*Math.pow(2,10*(f/g-1))+a},easeOutExpo:function(e,f,a,h,g){return(f==g)?a+h:h*(-Math.pow(2,-10*f/g)+1)+a},easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeInCirc:function(e,f,a,h,g){return -h*(Math.sqrt(1-(f/=g)*f)-1)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeInOutCirc:function(e,f,a,h,g){if((f/=g/2)<1){return -h/2*(Math.sqrt(1-f*f)-1)+a}return h/2*(Math.sqrt(1-(f-=2)*f)+1)+a},easeInElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return -(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e},easeOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return g*Math.pow(2,-10*h)*Math.sin((h*k-i)*(2*Math.PI)/j)+l+e},easeInOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k/2)==2){return e+l}if(!j){j=k*(0.3*1.5)}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}if(h<1){return -0.5*(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e}return g*Math.pow(2,-10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j)*0.5+l+e},easeInBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*(f/=h)*f*((g+1)*f-g)+a},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a},easeInOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}if((f/=h/2)<1){return i/2*(f*f*(((g*=(1.525))+1)*f-g))+a}return i/2*((f-=2)*f*(((g*=(1.525))+1)*f+g)+2)+a},easeInBounce:function(e,f,a,h,g){return h-jQuery.easing.easeOutBounce(e,g-f,0,h,g)+a},easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeInOutBounce:function(e,f,a,h,g){if(f<g/2){return jQuery.easing.easeInBounce(e,f*2,0,h,g)*0.5+a}return jQuery.easing.easeOutBounce(e,f*2-g,0,h,g)*0.5+h*0.5+a}});

/*

	Supersized - Fullscreen Slideshow jQuery Plugin
	Version : 3.2.7
	Site	: www.buildinternet.com/project/supersized
	
	Author	: Sam Dunn
	Company : One Mighty Roar (www.onemightyroar.com)
	License : MIT License / GPL License
	
*/

(function($){

	/* Place Supersized Elements
	----------------------------*/
	$(document).ready(function() {
		$('body').append('<div id="supersized-loader"></div><ul id="supersized"></ul>');
	});
    
    
    $.supersized = function(options){
    	
    	/* Variables
		----------------------------*/
    	var el = '#supersized',
        	base = this;
        // Access to jQuery and DOM versions of element
        base.$el = $(el);
        base.el = el;
        vars = $.supersized.vars;
        // Add a reverse reference to the DOM object
        base.$el.data("supersized", base);
        api = base.$el.data('supersized');
		
		base.init = function(){
        	// Combine options and vars
        	$.supersized.vars = $.extend($.supersized.vars, $.supersized.themeVars);
        	$.supersized.vars.options = $.extend({},$.supersized.defaultOptions, $.supersized.themeOptions, options);
            base.options = $.supersized.vars.options;
            
            base._build();
        };
        
        
        /* Build Elements
		----------------------------*/
        base._build = function(){
        	// Add in slide markers
        	var thisSlide = 0,
        		slideSet = '',
				markers = '',
				markerContent,
				thumbMarkers = '',
				thumbImage;
				
			while(thisSlide <= base.options.slides.length-1){
				//Determine slide link content
				switch(base.options.slide_links){
					case 'num':
						markerContent = thisSlide;
						break;
					case 'name':
						markerContent = base.options.slides[thisSlide].title;
						break;
					case 'blank':
						markerContent = '';
						break;
				}
				
				slideSet = slideSet+'<li class="slide-'+thisSlide+'"></li>';
				
				if(thisSlide == base.options.start_slide-1){
					// Slide links
					if (base.options.slide_links)markers = markers+'<li class="slide-link-'+thisSlide+' current-slide"><a>'+markerContent+'</a></li>';
					// Slide Thumbnail Links
					if (base.options.thumb_links){
						base.options.slides[thisSlide].thumb ? thumbImage = base.options.slides[thisSlide].thumb : thumbImage = base.options.slides[thisSlide].image;
						thumbMarkers = thumbMarkers+'<li class="thumb'+thisSlide+' current-thumb"><img src="'+thumbImage+'"/></li>';
					};
				}else{
					// Slide links
					if (base.options.slide_links) markers = markers+'<li class="slide-link-'+thisSlide+'" ><a>'+markerContent+'</a></li>';
					// Slide Thumbnail Links
					if (base.options.thumb_links){
						base.options.slides[thisSlide].thumb ? thumbImage = base.options.slides[thisSlide].thumb : thumbImage = base.options.slides[thisSlide].image;
						thumbMarkers = thumbMarkers+'<li class="thumb'+thisSlide+'"><img src="'+thumbImage+'"/></li>';
					};
				}
				thisSlide++;
			}
			
			if (base.options.slide_links) $(vars.slide_list).html(markers);
			if (base.options.thumb_links && vars.thumb_tray.length){
				$(vars.thumb_tray).append('<ul id="'+vars.thumb_list.replace('#','')+'">'+thumbMarkers+'</ul>');
			}
			
			$(base.el).append(slideSet);
			
			// Add in thumbnails
			if (base.options.thumbnail_navigation){
				// Load previous thumbnail
				vars.current_slide - 1 < 0  ? prevThumb = base.options.slides.length - 1 : prevThumb = vars.current_slide - 1;
				$(vars.prev_thumb).show().html($("<img/>").attr("src", base.options.slides[prevThumb].image));
				
				// Load next thumbnail
				vars.current_slide == base.options.slides.length - 1 ? nextThumb = 0 : nextThumb = vars.current_slide + 1;
				$(vars.next_thumb).show().html($("<img/>").attr("src", base.options.slides[nextThumb].image));
			}
			
            base._start(); // Get things started
        };
        
        
        /* Initialize
		----------------------------*/
    	base._start = function(){
			
			// Determine if starting slide random
			if (base.options.start_slide){
				vars.current_slide = base.options.start_slide - 1;
			}else{
				vars.current_slide = Math.floor(Math.random()*base.options.slides.length);	// Generate random slide number
			}
			
			// If links should open in new window
			var linkTarget = base.options.new_window ? ' target="_blank"' : '';
			
			// Set slideshow quality (Supported only in FF and IE, no Webkit)
			if (base.options.performance == 3){
				base.$el.addClass('speed'); 		// Faster transitions
			} else if ((base.options.performance == 1) || (base.options.performance == 2)){
				base.$el.addClass('quality');	// Higher image quality
			}
						
			// Shuffle slide order if needed		
			if (base.options.random){
				arr = base.options.slides;
				for(var j, x, i = arr.length; i; j = parseInt(Math.random() * i), x = arr[--i], arr[i] = arr[j], arr[j] = x);	// Fisher-Yates shuffle algorithm (jsfromhell.com/array/shuffle)
			    base.options.slides = arr;
			}
			
			/*-----Load initial set of images-----*/
	
			if (base.options.slides.length > 1){
				if(base.options.slides.length > 2){
					// Set previous image
					vars.current_slide - 1 < 0  ? loadPrev = base.options.slides.length - 1 : loadPrev = vars.current_slide - 1;	// If slide is 1, load last slide as previous
					var imageLink = (base.options.slides[loadPrev].url) ? "href='" + base.options.slides[loadPrev].url + "'" : "";
				
					var imgPrev = $('<img src="'+base.options.slides[loadPrev].image+'"/>');
					var slidePrev = base.el+' li:eq('+loadPrev+')';
					imgPrev.appendTo(slidePrev).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading prevslide');
				
					imgPrev.load(function(){
						$(this).data('origWidth', $(this).width()).data('origHeight', $(this).height());
						base.resizeNow();	// Resize background image
					});	// End Load
				}
			} else {
				// Slideshow turned off if there is only one slide
				base.options.slideshow = 0;
			}
			
			// Set current image
			imageLink = (api.getField('url')) ? "href='" + api.getField('url') + "'" : "";
			var img = $('<img src="'+api.getField('image')+'"/>');
			
			var slideCurrent= base.el+' li:eq('+vars.current_slide+')';
			img.appendTo(slideCurrent).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading activeslide');
			
			img.load(function(){
				base._origDim($(this));
				base.resizeNow();	// Resize background image
				base.launch();
				if( typeof theme != 'undefined' && typeof theme._init == "function" ) theme._init();	// Load Theme
			});
			
			if (base.options.slides.length > 1){
				// Set next image
				vars.current_slide == base.options.slides.length - 1 ? loadNext = 0 : loadNext = vars.current_slide + 1;	// If slide is last, load first slide as next
				imageLink = (base.options.slides[loadNext].url) ? "href='" + base.options.slides[loadNext].url + "'" : "";
				
				var imgNext = $('<img src="'+base.options.slides[loadNext].image+'"/>');
				var slideNext = base.el+' li:eq('+loadNext+')';
				imgNext.appendTo(slideNext).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading');
				
				imgNext.load(function(){
					$(this).data('origWidth', $(this).width()).data('origHeight', $(this).height());
					base.resizeNow();	// Resize background image
				});	// End Load
			}
			/*-----End load initial images-----*/
			
			//  Hide elements to be faded in
			base.$el.css('visibility','hidden');
			$('.load-item').hide();
			
    	};
		
		
		/* Launch Supersized
		----------------------------*/
		base.launch = function(){
				
			//base.$el.css('visibility','visible');
			base.$el.css('visibility','visible').hide().fadeIn(750); //changed for image loadIn
			$('#supersized-loader').remove();		//Hide loading animation
			
			// Call theme function for before slide transition
			if( typeof theme != 'undefined' && typeof theme.beforeAnimation == "function" ) theme.beforeAnimation('next');
			$('.load-item').show();
			
			// Keyboard Navigation
			if (base.options.keyboard_nav){
				$(document.documentElement).keyup(function (event) {
				
					if(vars.in_animation) return false;		// Abort if currently animating
					if($(document.activeElement).is("input, textarea")) return false; // Abort if active element is an input or a textarea.
					
					// Left Arrow or Down Arrow
					if ((event.keyCode == 37) || (event.keyCode == 40)) {
						clearInterval(vars.slideshow_interval);	// Stop slideshow, prevent buildup
						base.prevSlide();
					
					// Right Arrow or Up Arrow
					} else if ((event.keyCode == 39) || (event.keyCode == 38)) {
						clearInterval(vars.slideshow_interval);	// Stop slideshow, prevent buildup
						base.nextSlide();
					
					// Spacebar	
					} else if (event.keyCode == 32 && !vars.hover_pause) {
						clearInterval(vars.slideshow_interval);	// Stop slideshow, prevent buildup
						base.playToggle();
					}
				
				});
				
				
			}
			
			// Pause when hover on image
			if (base.options.slideshow && base.options.pause_hover){
				$(base.el).hover(function() {
					if(vars.in_animation) return false;		// Abort if currently animating
			   			vars.hover_pause = true;	// Mark slideshow paused from hover
			   			if(!vars.is_paused){
			   				vars.hover_pause = 'resume';	// It needs to resume afterwards
			   				base.playToggle();
			   			}
			   	}, function() {
					if(vars.hover_pause == 'resume'){
						base.playToggle();
						vars.hover_pause = false;
					}
			   	});
			}
			
			if (base.options.slide_links){
				// Slide marker clicked
				$(vars.slide_list+'> li').click(function(){
				
					index = $(vars.slide_list+'> li').index(this);
					targetSlide = index + 1;
					
					base.goTo(targetSlide);
					return false;
					
				});
			}
			
			// Thumb marker clicked
			if (base.options.thumb_links){
				$(vars.thumb_list+'> li').click(function(){
				
					index = $(vars.thumb_list+'> li').index(this);
					targetSlide = index + 1;
					
					api.goTo(targetSlide);
					return false;
					
				});
			}
			
			// Start slideshow if enabled
			if (base.options.slideshow && base.options.slides.length > 1){
	    		
	    		// Start slideshow if autoplay enabled
	    		if (base.options.autoplay && base.options.slides.length > 1){
	    			vars.slideshow_interval = setInterval(base.nextSlide, base.options.slide_interval);	// Initiate slide interval
				}else{
					vars.is_paused = true;	// Mark as paused
				}
				
				//Prevent navigation items from being dragged					
				$('.load-item img').bind("contextmenu mousedown",function(){
					return false;
				});
								
			}


			// Adjust image when browser is resized
			$(window).resize(function(){
	    		base.resizeNow();
			});
    		
    	};
        
        
        /* Resize Images
		----------------------------*/
		base.resizeNow = function(){
			
			return base.$el.each(function() {
		  		//  Resize each image seperately
		  		$('img', base.el).each(function(){
		  			
					thisSlide = $(this);
					var ratio = (thisSlide.data('origHeight')/thisSlide.data('origWidth')).toFixed(2);	// Define image ratio
					
					// Gather browser size
					var browserwidth = base.$el.width(),
						browserheight = base.$el.height(),
						offset;
					
					/*-----Resize Image-----*/
					if (base.options.fit_always){	// Fit always is enabled
						if ((browserheight/browserwidth) > ratio){
							resizeWidth();
						} else {
							resizeHeight();
						}
					}else{	// Normal Resize
						if ((browserheight <= base.options.min_height) && (browserwidth <= base.options.min_width)){	// If window smaller than minimum width and height
						
							if ((browserheight/browserwidth) > ratio){
								base.options.fit_landscape && ratio < 1 ? resizeWidth(true) : resizeHeight(true);	// If landscapes are set to fit
							} else {
								base.options.fit_portrait && ratio >= 1 ? resizeHeight(true) : resizeWidth(true);		// If portraits are set to fit
							}
						
						} else if (browserwidth <= base.options.min_width){		// If window only smaller than minimum width
						
							if ((browserheight/browserwidth) > ratio){
								base.options.fit_landscape && ratio < 1 ? resizeWidth(true) : resizeHeight();	// If landscapes are set to fit
							} else {
								base.options.fit_portrait && ratio >= 1 ? resizeHeight() : resizeWidth(true);		// If portraits are set to fit
							}
							
						} else if (browserheight <= base.options.min_height){	// If window only smaller than minimum height
						
							if ((browserheight/browserwidth) > ratio){
								base.options.fit_landscape && ratio < 1 ? resizeWidth() : resizeHeight(true);	// If landscapes are set to fit
							} else {
								base.options.fit_portrait && ratio >= 1 ? resizeHeight(true) : resizeWidth();		// If portraits are set to fit
							}
						
						} else {	// If larger than minimums
							
							if ((browserheight/browserwidth) > ratio){
								base.options.fit_landscape && ratio < 1 ? resizeWidth() : resizeHeight();	// If landscapes are set to fit
							} else {
								base.options.fit_portrait && ratio >= 1 ? resizeHeight() : resizeWidth();		// If portraits are set to fit
							}
							
						}
					}
					/*-----End Image Resize-----*/
					
					
					/*-----Resize Functions-----*/
					
					function resizeWidth(minimum){
						if (minimum){	// If minimum height needs to be considered
							if(thisSlide.width() < browserwidth || thisSlide.width() < base.options.min_width ){
								if (thisSlide.width() * ratio >= base.options.min_height){
									thisSlide.width(base.options.min_width);
						    		thisSlide.height(thisSlide.width() * ratio);
						    	}else{
						    		resizeHeight();
						    	}
						    }
						}else{
							if (base.options.min_height >= browserheight && !base.options.fit_landscape){	// If minimum height needs to be considered
								if (browserwidth * ratio >= base.options.min_height || (browserwidth * ratio >= base.options.min_height && ratio <= 1)){	// If resizing would push below minimum height or image is a landscape
									thisSlide.width(browserwidth);
									thisSlide.height(browserwidth * ratio);
								} else if (ratio > 1){		// Else the image is portrait
									thisSlide.height(base.options.min_height);
									thisSlide.width(thisSlide.height() / ratio);
								} else if (thisSlide.width() < browserwidth) {
									thisSlide.width(browserwidth);
						    		thisSlide.height(thisSlide.width() * ratio);
								}
							}else{	// Otherwise, resize as normal
								thisSlide.width(browserwidth);
								thisSlide.height(browserwidth * ratio);
							}
						}
					};
					
					function resizeHeight(minimum){
						if (minimum){	// If minimum height needs to be considered
							if(thisSlide.height() < browserheight){
								if (thisSlide.height() / ratio >= base.options.min_width){
									thisSlide.height(base.options.min_height);
									thisSlide.width(thisSlide.height() / ratio);
								}else{
									resizeWidth(true);
								}
							}
						}else{	// Otherwise, resized as normal
							if (base.options.min_width >= browserwidth){	// If minimum width needs to be considered
								if (browserheight / ratio >= base.options.min_width || ratio > 1){	// If resizing would push below minimum width or image is a portrait
									thisSlide.height(browserheight);
									thisSlide.width(browserheight / ratio);
								} else if (ratio <= 1){		// Else the image is landscape
									thisSlide.width(base.options.min_width);
						    		thisSlide.height(thisSlide.width() * ratio);
								}
							}else{	// Otherwise, resize as normal
								thisSlide.height(browserheight);
								thisSlide.width(browserheight / ratio);
							}
						}
					};
					
					/*-----End Resize Functions-----*/
					
					if (thisSlide.parents('li').hasClass('image-loading')){
						$('.image-loading').removeClass('image-loading');
					}
					
					// Horizontally Center
					if (base.options.horizontal_center){
						$(this).css('left', (browserwidth - $(this).width())/2);
					}
					
					// Vertically Center
					if (base.options.vertical_center){
						$(this).css('top', (browserheight - $(this).height())/2);
					}
					
				});
				
				// Basic image drag and right click protection
				if (base.options.image_protect){
					
					$('img', base.el).bind("contextmenu mousedown",function(){
						return false;
					});
				
				}
				
				return false;
				
			});
			
		};
        
        
        /* Next Slide
		----------------------------*/
		base.nextSlide = function(){
			
			if(vars.in_animation || !api.options.slideshow) return false;		// Abort if currently animating
				else vars.in_animation = true;		// Otherwise set animation marker
				
		    clearInterval(vars.slideshow_interval);	// Stop slideshow
		    
		    var slides = base.options.slides,					// Pull in slides array
				liveslide = base.$el.find('.activeslide');		// Find active slide
				$('.prevslide').removeClass('prevslide');
				liveslide.removeClass('activeslide').addClass('prevslide');	// Remove active class & update previous slide
					
			// Get the slide number of new slide
			vars.current_slide + 1 == base.options.slides.length ? vars.current_slide = 0 : vars.current_slide++;
			
		    var nextslide = $(base.el+' li:eq('+vars.current_slide+')'),
		    	prevslide = base.$el.find('.prevslide');
			
			// If hybrid mode is on drop quality for transition
			if (base.options.performance == 1) base.$el.removeClass('quality').addClass('speed');	
			
			
			/*-----Load Image-----*/
			
			loadSlide = false;

			vars.current_slide == base.options.slides.length - 1 ? loadSlide = 0 : loadSlide = vars.current_slide + 1;	// Determine next slide

			var targetList = base.el+' li:eq('+loadSlide+')';
			if (!$(targetList).html()){
				
				// If links should open in new window
				var linkTarget = base.options.new_window ? ' target="_blank"' : '';
				
				imageLink = (base.options.slides[loadSlide].url) ? "href='" + base.options.slides[loadSlide].url + "'" : "";	// If link exists, build it
				var img = $('<img src="'+base.options.slides[loadSlide].image+'"/>'); 
				
				img.appendTo(targetList).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading').css('visibility','hidden');
				
				img.load(function(){
					base._origDim($(this));
					base.resizeNow();
				});	// End Load
			};
						
			// Update thumbnails (if enabled)
			if (base.options.thumbnail_navigation == 1){
			
				// Load previous thumbnail
				vars.current_slide - 1 < 0  ? prevThumb = base.options.slides.length - 1 : prevThumb = vars.current_slide - 1;
				$(vars.prev_thumb).html($("<img/>").attr("src", base.options.slides[prevThumb].image));
			
				// Load next thumbnail
				nextThumb = loadSlide;
				$(vars.next_thumb).html($("<img/>").attr("src", base.options.slides[nextThumb].image));
				
			}
			
			
			
			/*-----End Load Image-----*/
			
			
			// Call theme function for before slide transition
			if( typeof theme != 'undefined' && typeof theme.beforeAnimation == "function" ) theme.beforeAnimation('next');
			
			//Update slide markers
			if (base.options.slide_links){
				$('.current-slide').removeClass('current-slide');
				$(vars.slide_list +'> li' ).eq(vars.current_slide).addClass('current-slide');
			}
		    
		    nextslide.css('visibility','hidden').addClass('activeslide');	// Update active slide
		    
	    	switch(base.options.transition){
	    		case 0: case 'none':	// No transition
	    		    nextslide.css('visibility','visible'); vars.in_animation = false; base.afterAnimation();
	    		    break;
	    		case 1: case 'fade':	// Fade
	    		    nextslide.css({opacity : 0, 'visibility': 'visible'}).animate({opacity : 1, avoidTransforms : false}, base.options.transition_speed, function(){ base.afterAnimation(); });
	    		    break;
	    		case 2: case 'slideTop':	// Slide Top
	    		    nextslide.css({top : -base.$el.height(), 'visibility': 'visible'}).animate({ top:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    		    break;
	    		case 3: case 'slideRight':	// Slide Right
	    			nextslide.css({left : base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 4: case 'slideBottom': // Slide Bottom
	    			nextslide.css({top : base.$el.height(), 'visibility': 'visible'}).animate({ top:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 5: case 'slideLeft':  // Slide Left
	    			nextslide.css({left : -base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 6: case 'carouselRight':	// Carousel Right
	    			nextslide.css({left : base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
					liveslide.animate({ left: -base.$el.width(), avoidTransforms : false }, base.options.transition_speed );
	    			break;
	    		case 7: case 'carouselLeft':   // Carousel Left
	    			nextslide.css({left : -base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
					liveslide.animate({ left: base.$el.width(), avoidTransforms : false }, base.options.transition_speed );
	    			break;
	    	}
		    return false;	
		};
		
		
		/* Previous Slide
		----------------------------*/
		base.prevSlide = function(){
		
			if(vars.in_animation || !api.options.slideshow) return false;		// Abort if currently animating
				else vars.in_animation = true;		// Otherwise set animation marker
			
			clearInterval(vars.slideshow_interval);	// Stop slideshow
			
			var slides = base.options.slides,					// Pull in slides array
				liveslide = base.$el.find('.activeslide');		// Find active slide
				$('.prevslide').removeClass('prevslide');
				liveslide.removeClass('activeslide').addClass('prevslide');		// Remove active class & update previous slide
			
			// Get current slide number
			vars.current_slide == 0 ?  vars.current_slide = base.options.slides.length - 1 : vars.current_slide-- ;
				
		    var nextslide =  $(base.el+' li:eq('+vars.current_slide+')'),
		    	prevslide =  base.$el.find('.prevslide');
			
			// If hybrid mode is on drop quality for transition
			if (base.options.performance == 1) base.$el.removeClass('quality').addClass('speed');	
			
			
			/*-----Load Image-----*/
			
			loadSlide = vars.current_slide;
			
			var targetList = base.el+' li:eq('+loadSlide+')';
			if (!$(targetList).html()){
				// If links should open in new window
				var linkTarget = base.options.new_window ? ' target="_blank"' : '';
				imageLink = (base.options.slides[loadSlide].url) ? "href='" + base.options.slides[loadSlide].url + "'" : "";	// If link exists, build it
				var img = $('<img src="'+base.options.slides[loadSlide].image+'"/>'); 
				
				img.appendTo(targetList).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading').css('visibility','hidden');
				
				img.load(function(){
					base._origDim($(this));
					base.resizeNow();
				});	// End Load
			};
			
			// Update thumbnails (if enabled)
			if (base.options.thumbnail_navigation == 1){
			
				// Load previous thumbnail
				//prevThumb = loadSlide;
				loadSlide == 0 ? prevThumb = base.options.slides.length - 1 : prevThumb = loadSlide - 1;
				$(vars.prev_thumb).html($("<img/>").attr("src", base.options.slides[prevThumb].image));
				
				// Load next thumbnail
				vars.current_slide == base.options.slides.length - 1 ? nextThumb = 0 : nextThumb = vars.current_slide + 1;
				$(vars.next_thumb).html($("<img/>").attr("src", base.options.slides[nextThumb].image));
			}
			
			/*-----End Load Image-----*/
			
			
			// Call theme function for before slide transition
			if( typeof theme != 'undefined' && typeof theme.beforeAnimation == "function" ) theme.beforeAnimation('prev');
			
			//Update slide markers
			if (base.options.slide_links){
				$('.current-slide').removeClass('current-slide');
				$(vars.slide_list +'> li' ).eq(vars.current_slide).addClass('current-slide');
			}
			
		    nextslide.css('visibility','hidden').addClass('activeslide');	// Update active slide
		    
		    switch(base.options.transition){
	    		case 0: case 'none':	// No transition
	    		    nextslide.css('visibility','visible'); vars.in_animation = false; base.afterAnimation();
	    		    break;
	    		case 1: case 'fade':	// Fade
	    		  	nextslide.css({opacity : 0, 'visibility': 'visible'}).animate({opacity : 1, avoidTransforms : false}, base.options.transition_speed, function(){ base.afterAnimation(); });
	    		    break;
	    		case 2: case 'slideTop':	// Slide Top (reverse)
	    		    nextslide.css({top : base.$el.height(), 'visibility': 'visible'}).animate({ top:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    		    break;
	    		case 3: case 'slideRight':	// Slide Right (reverse)
	    			nextslide.css({left : -base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 4: case 'slideBottom': // Slide Bottom (reverse)
	    			nextslide.css({top : -base.$el.height(), 'visibility': 'visible'}).animate({ top:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 5: case 'slideLeft':  // Slide Left (reverse)
	    			nextslide.css({left : base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
	    			break;
	    		case 6: case 'carouselRight':	// Carousel Right (reverse)
	    			nextslide.css({left : -base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
					liveslide.css({left : 0}).animate({ left: base.$el.width(), avoidTransforms : false}, base.options.transition_speed );
	    			break;
	    		case 7: case 'carouselLeft':   // Carousel Left (reverse)
	    			nextslide.css({left : base.$el.width(), 'visibility': 'visible'}).animate({ left:0, avoidTransforms : false }, base.options.transition_speed, function(){ base.afterAnimation(); });
					liveslide.css({left : 0}).animate({ left: -base.$el.width(), avoidTransforms : false }, base.options.transition_speed );
	    			break;
	    	}
		    return false;	
		};
		
		
		/* Play/Pause Toggle
		----------------------------*/
		base.playToggle = function(){
		
			if (vars.in_animation || !api.options.slideshow) return false;		// Abort if currently animating
			
			if (vars.is_paused){
				
				vars.is_paused = false;
				
				// Call theme function for play
				if( typeof theme != 'undefined' && typeof theme.playToggle == "function" ) theme.playToggle('play');
				
				// Resume slideshow
	        	vars.slideshow_interval = setInterval(base.nextSlide, base.options.slide_interval);
	        	  
        	}else{
        		
        		vars.is_paused = true;
        		
        		// Call theme function for pause
        		if( typeof theme != 'undefined' && typeof theme.playToggle == "function" ) theme.playToggle('pause');
        		
        		// Stop slideshow
        		clearInterval(vars.slideshow_interval);	
       		
       		}
		    
		    return false;
    		
    	};
    	
    	
    	/* Go to specific slide
		----------------------------*/
    	base.goTo = function(targetSlide){
			if (vars.in_animation || !api.options.slideshow) return false;		// Abort if currently animating
			
			var totalSlides = base.options.slides.length;
			
			// If target outside range
			if(targetSlide < 0){
				targetSlide = totalSlides;
			}else if(targetSlide > totalSlides){
				targetSlide = 1;
			}
			targetSlide = totalSlides - targetSlide + 1;
			
			clearInterval(vars.slideshow_interval);	// Stop slideshow, prevent buildup
			
			// Call theme function for goTo trigger
			if (typeof theme != 'undefined' && typeof theme.goTo == "function" ) theme.goTo();
			
			if (vars.current_slide == totalSlides - targetSlide){
				if(!(vars.is_paused)){
					vars.slideshow_interval = setInterval(base.nextSlide, base.options.slide_interval);
				} 
				return false;
			}
			
			// If ahead of current position
			if(totalSlides - targetSlide > vars.current_slide ){
				
				// Adjust for new next slide
				vars.current_slide = totalSlides-targetSlide-1;
				vars.update_images = 'next';
				base._placeSlide(vars.update_images);
				
			//Otherwise it's before current position
			}else if(totalSlides - targetSlide < vars.current_slide){
				
				// Adjust for new prev slide
				vars.current_slide = totalSlides-targetSlide+1;
				vars.update_images = 'prev';
			    base._placeSlide(vars.update_images);
			    
			}
			
			// set active markers
			if (base.options.slide_links){
				$(vars.slide_list +'> .current-slide').removeClass('current-slide');
				$(vars.slide_list +'> li').eq((totalSlides-targetSlide)).addClass('current-slide');
			}
			
			if (base.options.thumb_links){
				$(vars.thumb_list +'> .current-thumb').removeClass('current-thumb');
				$(vars.thumb_list +'> li').eq((totalSlides-targetSlide)).addClass('current-thumb');
			}
			
		};
        
        
        /* Place Slide
		----------------------------*/
        base._placeSlide = function(place){
    			
			// If links should open in new window
			var linkTarget = base.options.new_window ? ' target="_blank"' : '';
			
			loadSlide = false;
			
			if (place == 'next'){
				
				vars.current_slide == base.options.slides.length - 1 ? loadSlide = 0 : loadSlide = vars.current_slide + 1;	// Determine next slide
				
				var targetList = base.el+' li:eq('+loadSlide+')';
				
				if (!$(targetList).html()){
					// If links should open in new window
					var linkTarget = base.options.new_window ? ' target="_blank"' : '';
					
					imageLink = (base.options.slides[loadSlide].url) ? "href='" + base.options.slides[loadSlide].url + "'" : "";	// If link exists, build it
					var img = $('<img src="'+base.options.slides[loadSlide].image+'"/>'); 
					
					img.appendTo(targetList).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading').css('visibility','hidden');
					
					img.load(function(){
						base._origDim($(this));
						base.resizeNow();
					});	// End Load
				};
				
				base.nextSlide();
				
			}else if (place == 'prev'){
			
				vars.current_slide - 1 < 0  ? loadSlide = base.options.slides.length - 1 : loadSlide = vars.current_slide - 1;	// Determine next slide
				
				var targetList = base.el+' li:eq('+loadSlide+')';
				
				if (!$(targetList).html()){
					// If links should open in new window
					var linkTarget = base.options.new_window ? ' target="_blank"' : '';
					
					imageLink = (base.options.slides[loadSlide].url) ? "href='" + base.options.slides[loadSlide].url + "'" : "";	// If link exists, build it
					var img = $('<img src="'+base.options.slides[loadSlide].image+'"/>'); 
					
					img.appendTo(targetList).wrap('<a ' + imageLink + linkTarget + '></a>').parent().parent().addClass('image-loading').css('visibility','hidden');
					
					img.load(function(){
						base._origDim($(this));
						base.resizeNow();
					});	// End Load
				};
				base.prevSlide();
			}
			
		};
		
		
		/* Get Original Dimensions
		----------------------------*/
		base._origDim = function(targetSlide){
			targetSlide.data('origWidth', targetSlide.width()).data('origHeight', targetSlide.height());
		};
		
		
		/* After Slide Animation
		----------------------------*/
		base.afterAnimation = function(){
			
			// If hybrid mode is on swap back to higher image quality
			if (base.options.performance == 1){
		    	base.$el.removeClass('speed').addClass('quality');
			}
			
			// Update previous slide
			if (vars.update_images){
				vars.current_slide - 1 < 0  ? setPrev = base.options.slides.length - 1 : setPrev = vars.current_slide-1;
				vars.update_images = false;
				$('.prevslide').removeClass('prevslide');
				$(base.el+' li:eq('+setPrev+')').addClass('prevslide');
			}
			
			vars.in_animation = false;
			
			// Resume slideshow
			if (!vars.is_paused && base.options.slideshow){
				vars.slideshow_interval = setInterval(base.nextSlide, base.options.slide_interval);
				if (base.options.stop_loop && vars.current_slide == base.options.slides.length - 1 ) base.playToggle();
			}
			
			// Call theme function for after slide transition
			if (typeof theme != 'undefined' && typeof theme.afterAnimation == "function" ) theme.afterAnimation();
			
			return false;
		
		};
		
		base.getField = function(field){
			return base.options.slides[vars.current_slide][field];
		};
		
        // Make it go!
        base.init();
	};
	
	
	/* Global Variables
	----------------------------*/
	$.supersized.vars = {
	
		// Elements							
		thumb_tray			:	'#thumb-tray',	// Thumbnail tray
		thumb_list			:	'#thumb-list',	// Thumbnail list
		slide_list          :   '#slide-list',	// Slide link list
		
		// Internal variables
		current_slide			:	0,			// Current slide number
		in_animation 			:	false,		// Prevents animations from stacking
		is_paused 				: 	false,		// Tracks paused on/off
		hover_pause				:	false,		// If slideshow is paused from hover
		slideshow_interval		:	false,		// Stores slideshow timer					
		update_images 			: 	false,		// Trigger to update images after slide jump
		options					:	{}			// Stores assembled options list
		
	};
	
	
	/* Default Options
	----------------------------*/
	$.supersized.defaultOptions = {
    
    	// Functionality
		slideshow               :   1,			// Slideshow on/off
		autoplay				:	1,			// Slideshow starts playing automatically
		start_slide             :   1,			// Start slide (0 is random)
		stop_loop				:	0,			// Stops slideshow on last slide
		random					: 	0,			// Randomize slide order (Ignores start slide)
		slide_interval          :   5000,		// Length between transitions
		transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed		:	750,		// Speed of transition
		new_window				:	1,			// Image links open in new window/tab
		pause_hover             :   0,			// Pause slideshow on hover
		keyboard_nav            :   1,			// Keyboard navigation on/off
		performance				:	2,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed //  (Only works for Firefox/IE, not Webkit)
		image_protect			:	1,			// Disables image dragging and right click with Javascript
												   
		// Size & Position
		fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
		fit_landscape			:   0,			// Landscape images will not exceed browser width
		fit_portrait         	:   1,			// Portrait images will not exceed browser height  			   
		min_width		        :   0,			// Min width allowed (in pixels)
		min_height		        :   0,			// Min height allowed (in pixels)
		horizontal_center       :   1,			// Horizontally center background
		vertical_center         :   1,			// Vertically center background
		
												   
		// Components							
		slide_links				:	1,			// Individual links for each slide (Options: false, 'num', 'name', 'blank')
		thumb_links				:	1,			// Individual thumb links for each slide
		thumbnail_navigation    :   0			// Thumbnail navigation
    	
    };
    
    $.fn.supersized = function(options){
        return this.each(function(){
            (new $.supersized(options));
        });
    };
    
    
//Initialize touch event

base.$el.touchwipe({
wipeLeft: function() {
base.nextSlide();
},
wipeRight: function() {
base.prevSlide();
}
});
		
})(jQuery);


/*!
 * ContentHover jQuery plugin v0.1
 * http://www.backslash.gr/demos/contenthover-jquery-plugin/
 *
 * Copyright 2011 by Nikos Tsaganos
 * http://www.backslash.gr/
 */
(function($){  
	var methods = {
		init : function(options) {
			var defaults = {  
				data_selector: '.contenthover',	// The selector for the element that will be the content of the overlay element to show on hover 
				width: 0,			// Set to 0 to let the plugin figure it out
				height: 0,			// Set to 0 to let the plugin figure it out
				overlay_width: 0,		// The overlay element's width. Set to 0 to use the same as 'width'
				overlay_height: 0,		// The overlay element's height. Set to 0 to use the same as 'height'
				overlay_x_position: 'center',	// [center, left, right] The position of the overlay horizontally (if overlay_width is different from width)
				overlay_y_position: 'bottom',	// [center, top, bottom] The position of the overlay vertically (if overlay_width is different from width)
				overlay_background: '',		// The css background of the overlay element
				overlay_opacity: 1,		// [0-1] The opacity of the overlay element
				effect: 'fade', 		// [fade, slide, show] The effect to use
				fade_speed: 400, 		// Effect ducation for the 'fade' effect only
				slide_speed: 400, 		// Effect ducation for the 'slide' effect only
				slide_direction: 'bottom',	// [top, bottom, right, left] From which direction should the overlay apear, for the slide effect only
				zindex: 2,			// The base z-index value
				wrapper_class: 'ch_wrapper', 	// CSS class to add to the wrapper
				normal_class: 'ch_normal',  	// CSS class to add to the 'normal' element
				hover_class: 'ch_hover',  	// CSS class to add to the 'hover' element
				onshow: function(){}, 		// Callback function when the 'hover' element is shown
				onhide: function(){} 		// Callback function when the 'hover' element is hidden
			},  
			settings = $.extend({}, defaults, options);  
		  			
			return this.each(function(){
				var $this = $(this),
					w = $this.width() ? $this.width() : settings.width,
					h = $this.height() ? $this.height() : settings.height,
					overlay_w = settings.overlay_width ? settings.overlay_width : w,
					overlay_h = settings.overlay_height ? settings.overlay_height : h,
					$data = $this.next(settings.data_selector);
					
				if ($data.length) {
					
					$data.hide();
					
					var $ch_wrapper = $('<div>').addClass('ch_element').addClass(settings.wrapper_class).css({ 'width':w, 'height':h, 'position':'relative', 'overflow':'hidden' }).insertAfter($this);
					
					var $ch_normal = $('<div>').addClass(settings.normal_class).css({ 'width':w, 'height':h, 'position':'absolute', 'z-index':settings.zindex }).appendTo($ch_wrapper);
					$this.clone().appendTo($ch_normal);
					$this.hide();

					var $ch_hover = $('<div>').addClass(settings.hover_class).css({ 'width':overlay_w, 'height':overlay_h, 'position':'absolute', 'z-index':settings.zindex-1 }).appendTo($ch_wrapper);
					$data.clone().show().appendTo($ch_hover);
					
					var ch_hover_css = {};
					
					if (settings.overlay_background) { 
						ch_hover_css.background = settings.overlay_background; 
					}
					if (settings.overlay_opacity<1) { 
						ch_hover_css.opacity = settings.overlay_opacity; 
					}
					
		
					if (settings.overlay_x_position=='left') { 
						ch_hover_css.left = 0;
					} else if (settings.overlay_x_position=='right') {
						ch_hover_css.left = (w-overlay_w)+'px';
					} else {
						ch_hover_css.left = (w/2 - overlay_w/2)+'px';
					}
					
					
					if (settings.overlay_y_position=='top') { 
						ch_hover_css.top = 0;
					} else if (settings.overlay_y_position=='bottom') {
						ch_hover_css.top = (h-overlay_h)+'px';
					} else {
						ch_hover_css.top = (h/2 - overlay_h/2)+'px';
					}
					
					$ch_hover.css(ch_hover_css); 
					
					// slide effect
					if (settings.effect=='slide'){
			
						var initial_css = {};
						
						if (settings.slide_direction=='top') {
							initial_css = { top:('-'+overlay_h+'px') }; 
						}
						if (settings.slide_direction=='bottom') {
							initial_css = { top:h+'px' };
						}
						if (settings.slide_direction=='left') {
							initial_css = { left:('-'+overlay_w+'px') };
						}
						if (settings.slide_direction=='right') {
							initial_css = { left:w+'px' };
						}
									
						$ch_hover.css('z-index',settings.zindex+1).css(initial_css);
						$ch_wrapper.hover(function () {
							$ch_hover.stop(true, true).animate({ 'top': ch_hover_css.top, 'left': ch_hover_css.left }, settings.slide_speed, settings.onshow());
						}, function () {
							$ch_hover.stop(true, true).animate(initial_css, settings.slide_speed, settings.onhide());
						});
						
											
					// fade effect
					} else if (settings.effect=='fade') {
						
						$ch_hover.css('z-index',settings.zindex+1).hide();
						$ch_wrapper.hover(function () {
							$ch_hover.stop(true, true).fadeIn(settings.fade_speed, settings.onshow());
						}, function () {
							$ch_hover.stop(true, true).fadeOut(settings.fade_speed, settings.onhide());
						});
					
					// just show/hide
					} else {
						$ch_hover.css('z-index',settings.zindex+1).hide();
						$ch_wrapper.hover(function () {
							$ch_hover.show(0, settings.onshow());
						}, function () {
							$ch_hover.hide(0, settings.onhide());
						});
					}
				}
			});
		},
		
		stop : function() {
			return this.each(function(){
				var $this = $(this),
					$data = $this.next('.ch_element');
					
				$this.show();
				$data.remove();
				$this.unbind('.contenthover');
			});
		},
		
		destroy : function() {
			return this.each(function(){
				$(this).show();
				$('.ch_element').remove();
				$(window).unbind('.contenthover');
			});
		}
	};
	
	$.fn.contenthover = function(method) {  
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Method '+ method +' does not exist in contentHover plugin.');
		}  
	}; 
	
})(jQuery);  