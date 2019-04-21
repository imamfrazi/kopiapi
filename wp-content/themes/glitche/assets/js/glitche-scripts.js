/**
*   Glitche (HTML)
*   Copyright © Glitche by beshleyua. All Rights Reserved.
**/

( function( $ ) {
	'use strict';

	window.onpageshow = function(event) {if (event.persisted) {window.location.reload() }};
	
	/* Set full height in blocks */
	var width = $(window).width();
	var height = $(window).height();

	$('.section.started').css({'height': height-60});
	$('.logged-in .section.started').css({'height': height-92});
	
	/* Typed preload text */
	if($('.typed-load').length && $('typed-load').text()!=''){	
		$('.typed-load').typed({
			stringsElement: $('.typing-load'),
			loop: true
		});
	}
	
	/* Preloader */
	$(window).on('load', function() {
		$(".preloader .pre-inner").fadeOut(800, function(){
			/* Preload hide */
			$('.preloader').fadeOut();
			$('body').addClass('loaded');
			
			/* Typed subtitle */
			if($('.typed-subtitle').length){
				$('.typed-subtitle').typed({
					stringsElement: $('.typing-subtitle'),
					loop: true
				});
			}
			
			/* Typed breadcrumbs */
			if($('.typed-bread').length){
				$('.typed-bread').typed({
					stringsElement: $('.typing-bread'),
					showCursor: false
				});
			}
		});
	});
	
	/*Fade-out animation between load pages*/
	$('header, .typed-bread').on('click', 'a', function(){
		var link = $(this).attr('href');
		if(link.indexOf('#section-') == 0){
			if(!$('body').hasClass('home')){
				location.href = '/'+link;
			}

			$('body, html').animate({scrollTop: $(link).offset().top - 72}, 400);
		} else {
			$('body').removeClass('loaded');
			setTimeout(function() {
				location.href = "" + link;
			}, 500);
		}
		return false;
	});

	var url_hash = location.hash;
	if(url_hash.indexOf('#section-') == 0){
		$('body, html').animate({scrollTop: $(url_hash).offset().top - 102}, 400);
	}
	
	/* Hide mouse button on scroll */
	$(window).on('scroll', function(){
		if ($(this).scrollTop() >= height-200) {
			$('body').removeClass('background-enabled');
		} else {
			if(!($('header').hasClass('active')) && $('.video-bg').length) {
				$('body').addClass('background-enabled');
			}
		}

		if ($(this).scrollTop() >= 100) {
			$('footer').addClass('fixed');
			$('.mouse_btn').fadeOut();
		} else {
			$('.mouse_btn').fadeIn();
			$('footer').removeClass('fixed');
		}
	});

	/*Menu mobile*/
	$('header').on('click', '.menu-btn', function(){
		if($('header').hasClass('active')){
			$('header').removeClass('active');
			$('body').addClass('loaded');
			if($('.video-bg').length) {
				$('body').addClass('background-enabled');
			}
		} else {
			$('header').addClass('active');
			$('body').removeClass('loaded');
			$('body').removeClass('background-enabled');
		}
		
		return false;
	});
	
	/* On click mouse button, page scroll down */
	$('.section').on('click', '.mouse_btn', function(){
		$('body, html').animate({
			scrollTop: height - 150
		}, 800);
	});
	
	$('body').on({
		mouseenter: function () {
			$(this).addClass('glitch-effect-white');
		},
		mouseleave: function () {
			$(this).removeClass('glitch-effect-white');
			$('.top-menu ul li.active a.btn').addClass('glitch-effect-white');
		}
	}, 'a.btn, .btn');
	
	/* Validate contact form */
	$("#cform").validate({
		rules: {
			name: {
				required: true
			},
			message: {
				required: true
			},
			email: {
				required: true,
				email: true
			}
		},
		success: "valid",
		submitHandler: function() {
			$.ajax({
				url: 'mailer/feedback.php',
				type: 'post',
				dataType: 'json',
				data: 'name='+ $("#cform").find('input[name="name"]').val() + '&email='+ $("#cform").find('input[name="email"]').val() + '&message=' + $("#cform").find('textarea[name="message"]').val(),
				beforeSend: function() {
				
				},
				complete: function() {
				
				},
				success: function(data) {
					$('#cform').fadeOut();
					$('.alert-success').delay(1000).fadeIn();
				}
			});
		}
	});
	
	/* Initialize masonry items */
	var $container = $('.portfolio-items');
	
	$container.imagesLoaded(function(){
		$container.multipleFilterMasonry({
			itemSelector: '.box-item',
			filtersGroupSelector: '.filters',
			percentPosition: true,
			gutter: 0
		});
	});
	
	/* Initialize masonry filter */
	$('.filters label').on('change', 'input[type="checkbox"]', function() {
		if ($(this).is(':checked')) {
			$(this).parent().addClass('glitch-effect');
		}
		else {
			$(this).parent().removeClass('glitch-effect');
		}
		/* Refresh Portfolio magnific popup */
		$('.has-popup').magnificPopup({
			type: 'inline',
			overflowY: 'auto',
			closeBtnInside: true,
			mainClass: 'mfp-fade'
		});
	});
	
	/* Gallery magnific popup */
	if(/\.(?:jpg|jpeg|gif|png)$/i.test($('.gallery-item:first a').attr('href'))){
		$('.gallery-item a').magnificPopup({
			gallery: {
				enabled: true
			},
			type: 'image',
			closeBtnInside: false,
			mainClass: 'mfp-fade'
		});
	}

	/* Portfolio magnific popup */
	$('.has-popup').magnificPopup({
		type: 'inline',
		overflowY: 'auto',
		closeBtnInside: true,
		mainClass: 'mfp-fade'
	});

	/* Youtube Video Background */
	if($('.video-bg').length) {
		$('body').addClass('background-enabled');
		if(!jQuery.browser.mobile) {
			var myPlayer = $("#video-bg").YTPlayer();
		} else {
			$('#video-bg').css('background-image', 'url('+ $('#video-bg').data('mobile-preview') +')');
		}
	}
	
	/* Resize function */
	$(window).resize(function() {
		var width = $(window).width();
		var height = $(window).height();
		
		$('.section.started').css({'height': height-60});
		$('.logged-in .section.started').css({'height': height-92});

		if(width < 783) {
			$('.section.started').css({'height': height-30});
			$('.logged-in .section.started').css({'height': height-76});
		}
	});
	
	if(width < 783) {
		$('.section.started').css({'height': height-30});
		$('.logged-in .section.started').css({'height': height-76});
	}

	if($('.section').length>1){
		$('.mouse_btn').show();
	}
	if($('.section').length>height-200){
		$('body').removeClass('background-enabled');
	}
	if($('.section').length>100){
		$('footer').addClass('fixed');
	}

	/* Sidebar Show/Hide */
	$('header').on('click', '.sidebar_btn', function(){
		$('.s_overlay').fadeIn();
		$('.content-sidebar').addClass('active');
		$('body').addClass('scroll_hidden');
		
		return false;
	});
	$('.content-sidebar, .container').on('click', '.close, .s_overlay', function(){
		$('.s_overlay').fadeOut();
		$('.content-sidebar').removeClass('active');
		$('body').removeClass('scroll_hidden');
	});

	/* Widget Title */
	$('.widget-title').wrapInner('<span class="widget-title-span"></span>');

	/* One Page Menu Nav */
	if($('.section').length && $('.top-menu li a').length) {
		$(window).on('scroll', function(){
			var scrollPos = $(window).scrollTop();
			$('.top-menu ul li a').each(function () {
				if($(this).attr('href').indexOf('#section-') == 0){
					var currLink = $(this);
					var refElement = $(currLink.attr("href"));
					if (refElement.offset().top <= scrollPos + 73) {
						$('.top-menu ul li').removeClass("current-menu-item");
						currLink.closest('li').addClass("current-menu-item");
					}
				}
			});
		});
	}
} )( jQuery );