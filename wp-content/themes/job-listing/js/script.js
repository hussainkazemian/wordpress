/* ===============================================
  Open header search
=============================================== */

jQuery(document).ready(function ($) {
    $(".open-search-form").on("click", function (e) {
        e.preventDefault();
        $(".search-form").addClass("active");
    });

    $(".close-search-form").on("click", function () {
        $(".search-form").removeClass("active");
    });
});


jQuery(document).ready(function(){
  jQuery('.close-search-form').hide();
});

function job_listing_open_search_form() {
  jQuery('.header-search .search-form').addClass('is-open');
  jQuery('body').addClass('no-scrolling');
  setTimeout(function(){
    jQuery('.search-form  #header-searchform input#header-s').filter(':visible').focus();
    jQuery('.close-search-form').show();
    jQuery('.search-form #searchform #search').focus();
  }, 100);

  return false;
}

jQuery( ".header-search a.open-search-form").on("click", job_listing_open_search_form);

/* ===============================================
  Close header search
=============================================== */

function job_listing_search_form() {
  jQuery('.header-search .search-form').removeClass('is-open');
  jQuery('body').removeClass('no-scrolling');
  jQuery('.close-search-form').hide();
}

jQuery( ".header-search a.close-search-form").on("click", job_listing_search_form);

/* ===============================================
	OWL CAROUSEL SLIDER
=============================================== */

jQuery('document').ready(function(){
  var owl = jQuery('.slider .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:false,
    navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i> '],
    responsive: {
      0: {
        items: 1,
        nav: false
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
  var owl = jQuery('#trending .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:false,
    navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i> '],
    responsive: {
      0: {
        items: 1
      },
      425: {
        items: 2
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      },
      1200: {
        items: 6
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

/* ===============================================
  OPEN CLOSE MENU
============================================= */

function job_listing_open_menu() {
  jQuery('button.toggle-menu').addClass('close-panal');
  setTimeout(function(){
    jQuery('.main-menu').show();
  }, 100);

  return false;
}

jQuery( "button.toggle-menu").on("click", job_listing_open_menu);

function job_listing_close_menu() {
  jQuery('button.close-menu').removeClass('close-panal');
  jQuery('.main-menu').hide();
}

jQuery( "button.close-menu").on("click", job_listing_close_menu);

/* ===============================================
  TRAP TAB FOCUS ON MODAL MENU
============================================= */

jQuery('button.close-menu').on('keydown', function (e) {
  if (jQuery("this:focus") && (e.which === 9)) {
    e.preventDefault();
    jQuery(this).blur();
    jQuery('button.toggle-menu').focus();
  }
});

/* ===============================================
  SCROLL TOP
============================================= */

jQuery(window).scroll(function () {
  if (jQuery(this).scrollTop() > 100) {
    jQuery('.scroll-up').fadeIn();
  } else {
    jQuery('.scroll-up').fadeOut();
  }
});

jQuery('a[href="#tobottom"]').click(function () {
  jQuery('html, body').animate({scrollTop: 0}, 'slow');
  return false;
});

/*===============================================
 PRELOADER
=============================================== */

jQuery('document').ready(function($){
  setTimeout(function () {
    jQuery(".cssloader").fadeOut("slow");
  },1000);
});

/* ===============================================
  STICKY-HEADER
============================================= */

jQuery(window).scroll(function () {
  var sticky = jQuery('.sticky-header'),
  scroll = jQuery(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed-header');
  else sticky.removeClass('fixed-header');
});

/*===============================================
  COLOR HEADING
  =============================================== */

jQuery(document).ready(function() {
  jQuery(".slider-owl-position h3").each(function() {
    var t = jQuery(this).text();
    var splitT = t.split(" ");
    var length = splitT.length;

    if (length < 3) return; // If less than 3 words, no changes

    var thirdLastWord = splitT[length - 3]; // Get the third-last word
    splitT[length - 3] = "<span style='color:#0859F7'>" + thirdLastWord + "</span>"; // Wrap it in a span

    jQuery(this).html(splitT.join(" "));
  });
});
