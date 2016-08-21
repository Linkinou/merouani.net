(function ($) {
	"use strict";
    
    /*-- VARIABLES --*/
	var window_width = $(window).innerWidth(),
	    window_height = $(window).innerHeight(),
        site_backtop = $(".site-backtop"),
        site_loading = $(".site-loading");
    /*-- VARIABLES END--*/
    
    /*-- FUNCTIONS --*/
    function backTop() {
		if ($(window).scrollTop() > 40 && window_width > 767) {
			$(site_backtop).fadeIn();
		} else {
			$(site_backtop).fadeOut();
		}
	}
    function loadingStop() {
		$(site_loading).delay(100).fadeOut("slow");
	}
    /*-- FUNCTIONS END --*/
	
	/*-- BACK TOP --*/
    $(site_backtop).on("click", function (e) {
        e.preventDefault();
		$("body, html").animate({scrollTop: 0}, 800);
    });
	/*-- BACK TOP END --*/
    
    /*-- BACKGROUND IMAGES --*/
    $("[data-background]").each(function () {
        var src = $(this).data("background");
        if (src) {
            $(this).css("background-image", "url(" + src + ")");
        }
    });
	/*-- BACKGROUND IMAGES END --*/
	
	/*-- HEADER TOGGLE --*/
	$(".site-header .header-toggle").on("click", function (e) {
        e.preventDefault();
        var target = $(".site-header .header-nav");
        
        if (target.is(":visible")) {
            target.removeClass("active");
			$(this).removeClass("active");
        } else {
            target.addClass("active");
			$(this).addClass("active");
        }
    });
    $(".site-header .header-nav li.sub > a").on("click", function (e) {
        if (window_width < 992) {
            e.preventDefault();
            var parent = $(this).parent("li");
            
            if (parent.hasClass("active")) {
                parent.removeClass("active");
            } else {
                parent.addClass("active");
            }
        }
    });
	/*-- HEADER TOGGLE END --*/
    
    /*-- MAGNIFIC POPUP --*/
    if ($(".popup-photo").length) {
        $(".popup-photo").magnificPopup({
            type: 'image'
        });
    }
    if ($(".popup-gallery").length) {
        $(".popup-gallery").magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }
    if ($(".popup-video").length) {
        $(".popup-video").magnificPopup({
            type: 'iframe'
        });
    }
    /*-- MAGNIFIC POPUP --*/
    
    /*-- FITVIDS --*/
    if ($(".video-full").length) {
        $(".video-full").fitVids();
    }
    /*-- FITVIDS END --*/
	
	/*-- WIDGET PROJECTS --*/
    if ($(".widget-projects.o-masonry").length || $(".widget-filter-top.o-masonry").length) {
        $(".widget-projects").imagesLoaded(function () {
            
            // Isotope
            var isotope_wrapper = $(".widget-projects .row");
            isotope_wrapper.isotope({itemSelector: ".isotope-item"});
            
            // Isotope Filter
            $(".widget-filter-top.o-masonry ul li a").on("click", function (e) {
                e.preventDefault();
                var filter_value = $(this).attr("data-filter");
				if (filter_value) {
					isotope_wrapper.isotope({filter: filter_value});
					$(".widget-filter-top ul li").removeClass("active");
					$(this).parent("li").addClass("active");
				}
            });
        });
    }
    /*-- WIDGET PROJECTS END --*/
	
	/*-- WIDGET GALLERY --*/
    if ($(".widget-gallery.o-masonry").length) {
        $(".widget-gallery.o-masonry").imagesLoaded(function () {
            var isotope_wrapper = $(".widget-gallery.o-masonry .row");
            isotope_wrapper.isotope({itemSelector: ".isotope-item"});
        });
    }
    /*-- WIDGET GALLERY END --*/
	
	/*-- WIDGET BLOG --*/
	if ($(".widget-blog.o-masonry").length) {
        $(".widget-blog.o-masonry").imagesLoaded(function () {
            var isotope_wrapper = $(".widget-blog.o-masonry .row");
            isotope_wrapper.isotope({itemSelector: ".isotope-item"});
        });
    }
	
    if ($(".widget-blog .media-gallery").length) {
        $(".widget-blog .media-gallery").owlCarousel({
			items: 1,
			autoplay: true,
			nav: true,
			navText: ['', ''],
			rewind: true,
			autoplayTimeout: 4000,
			autoplayHoverPause: true
		});
    }
    /*-- WIDGET BLOG END --*/
	
	/*-- WIDGET ARTICLE --*/
	if ($(".widget-article .media-gallery").length) {
        $(".widget-article .media-gallery").owlCarousel({
			items: 1,
			autoplay: true,
			nav: true,
			navText: ['', ''],
			rewind: true,
			autoplayTimeout: 4000,
			autoplayHoverPause: true
		});
    }
	/*-- WIDGET ARTICLE END --*/
    
	/*-- WINDOW SCROLL --*/
	$(window).scroll(function () {
		backTop();
	});
	/*-- WINDOW SCROLL END --*/
	
	/*-- WINDOW LOAD --*/
	$(window).load(function () {
		loadingStop();
	});
	/*-- WINDOW LOAD END --*/
	
	/*-- WINDOW RESIZE --*/
	$(window).resize(function () {
        window_width = $(window).innerWidth();
	    window_height = $(window).innerHeight();
	});
	/*-- WINDOW RESIZE END --*/
  
})(jQuery);