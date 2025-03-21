// preloader
jQuery(window).on('load', function() {
  jQuery('#status').fadeOut();
  jQuery('#preloader').delay(350).fadeOut('slow');
  jQuery('body').delay(350).css({'overflow':'visible'});
})

// toggle button
jQuery(function($){
  $( '.toggle-nav button' ).click( function(e){
    $( 'body' ).toggleClass( 'show-main-menu' );
    var element = $( '.sidenav' );
    classic_dog_breeder_trapFocus( element );
  });

  $( '.close-button' ).click( function(e){
    $( '.toggle-nav button' ).click();
    $( '.toggle-nav button' ).focus();
  });
  $( document ).on( 'keyup',function(evt) {
    if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
      $( '.toggle-nav button' ).click();
      $( '.toggle-nav button' ).focus();
    }
  });
});

function classic_dog_breeder_trapFocus(element) {
  var focusableElementsSelector = 'a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])';
  var focusableEls = element.find(focusableElementsSelector).filter(':visible');
  var firstFocusableEl = focusableEls[0];
  var lastFocusableEl = focusableEls[focusableEls.length - 1];
  var KEYCODE_TAB = 9;

  element.on('keydown', function(e) {
    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);
    if (!isTabPressed) {
      return;
    }

    if (e.shiftKey) {
      // Shift + Tab
      if (document.activeElement === firstFocusableEl) {
        lastFocusableEl.focus();
        e.preventDefault();
      }
    } else {
      // Tab
      if (document.activeElement === lastFocusableEl) {
        firstFocusableEl.focus();
        e.preventDefault();
      }
    }
  });
}

// scroll to top
jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 0) {
      jQuery('#button').fadeIn();
    } else {
      jQuery('#button').fadeOut();
    }
  });
  jQuery('#button').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });
});

// homepage sidebar
jQuery(document).ready(function () {
  function classic_dog_breeder_search_loop_focus(element) {
    var classic_dog_breeder_focus = element.find('select, input, textarea, button, a[href]');
    var classic_dog_breeder_firstFocus = classic_dog_breeder_focus[0];  
    var classic_dog_breeder_lastFocus = classic_dog_breeder_focus[classic_dog_breeder_focus.length - 1];
    var KEYCODE_TAB = 9;

    element.on('keydown', function classic_dog_breeder_search_loop_focus(e) {
      var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

      if (!isTabPressed) { 
        return; 
      }

      if ( e.shiftKey ) /* shift + tab */ {
        if (document.activeElement === classic_dog_breeder_firstFocus) {
        classic_dog_breeder_lastFocus.focus();
          e.preventDefault();
        }
      } else /* tab */ {
        if (document.activeElement === classic_dog_breeder_lastFocus) {
          classic_dog_breeder_firstFocus.focus();
          e.preventDefault();
        }
      }
    });
  }

  jQuery('.toggle-btn a').click(function(){
    jQuery(".header-sidebar").addClass('show');
    classic_dog_breeder_search_loop_focus(jQuery('.header-sidebar'));
  });

  jQuery('.header-sidebar .close-pop a').click(function(){
    jQuery(".header-sidebar").removeClass('show');
  });
});