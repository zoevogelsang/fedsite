( function($) {

     /**
     * Keyboard Navigation
     */

    // If Tab key pressed
    $( '.menu-item-has-children' ).on( {
        keyup: function( e ) {
            var keyCode = e.keyCode || e.which;
            if (keyCode == 9) {
                $( this ).children( 'ul' ).addClass( 'is-focused' );
            }
        }
    } );

    // If Tab + Shift key pressed
    $( '.menu-item-has-children' ).keydown(function(e) {
        if( e.which  == 9 ){
            $( this ).children( '.sub-menu' ).removeClass( 'is-focused' );
        }
    } );

    // If focuse out
    $( '.menu-item-has-children .sub-menu' ).focusout(function( e ){
        if ( $( this ).children('.menu-item-has-children').length === 0 ) {
            $( this ).removeClass( 'is-focused' );
            $( this ).parents( '.is-focused' ).removeClass( 'is-focused' );
        }
    } );

    // Nav menu shift+tab on close icon
    $( '.menubar-close' ).keydown( function( e ){
        if( e.which  == 9 ){
            if ( e.shiftKey ) {
                $( this ).parent().removeClass('mobile-menu-open');
            }
        }
    });

    // Hide mobile menu on shitf+tab keypress on first menu item
    $( '.mobile-nav .menu-item:first-child' ).keydown( function( e ){
        if( e.which  == 9 ){
            if ( e.shiftKey ) {
                $( this ).parents( '.nav-parent' ).removeClass( 'mobile-menu-open' );
            }
        }
    });

    // Mobile menu trap on close button tab
    $( '.menubar-close' ).focusout( function( e ){
        $( '.mobile-nav li:first-child a' ).focus();
    });

    // Search Icon Focus
    $( '.js-search-icon' ).on( {
        keyup: function( e ) {
            $( '.search-dropdown' ).addClass( 'search-shown' );
            $( '.prr-icon-close' ).addClass( 'js-shown' ).show();
            $( '.header-search-form' ).addClass( 'prr-tab-focus' );
        }
    } );

    // Trap
    $( '.prr-icon-close' ).focusout( function( e ){
        e.preventDefault();
        $( '.search-field' ).focus();
    });

    // Enter press ( 13 ) on close icon: Search
    $( '.prr-icon-close' ).keydown( function( e ){
         if ( e.which == 13 ) {
            e.preventDefault();
            $( '.search-dropdown' ).addClass( 'search-hidden' ).removeClass( 'search-shown' );
            $( this ).hide();
        }
    });

    // If Tab + Shift key pressed
    $( '.js-search-icon' ).keydown(function(e) {
        if( e.which  == 9 ){
            if ( e.shiftKey ) {
                $( '.search-dropdown' ).addClass( 'search-hidden' ).removeClass( 'search-shown' );
            }
        }
    } );

    // Hide menu and search icon on escape key press
    $( document ).keydown( function(e){
        if ( e.key === "Escape" ) {
            $( '.nav-parent' ).removeClass( 'mobile-menu-open' );
        }
    } );

    // Slick Slider
    $(document).ready(function(){
        $('.post-slide-hor').slick({
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: $('.post-slide-hor-arrow .prev'),
            nextArrow: $('.post-slide-hor-arrow .next'),
            autoplay: true,
            autoplaySpeed: 5000,
        });

        // Calculate the heighest slide and set a top/bottom margin for other children.
        // As variableHeight is not supported yet: https://github.com/kenwheeler/slick/issues/1803
        var maxHeight = -1;
        $('.post-slide-hor .slick-slide').each(function() {
          if ($(this).height() > maxHeight) {
            maxHeight = $(this).height();
          }
        });
        $('.slick-slide').each(function() {
          if ($(this).height() < maxHeight) {
            $(this).css('margin', Math.ceil((maxHeight-$(this).height())/2) + 'px 0');
          }
        });

      $('.post-slide-hor-2').slick({
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: $('.post-slide-hor-2-arrow .prev'),
            nextArrow: $('.post-slide-hor-2-arrow .next'),
            autoplay: true,
            autoplaySpeed: 5000,
      });

      if ( $( 'body' ).hasClass( 'sticky-header' ) ) {
        /** Sticky Header  */
        var header_height = $('.site-header').height();
        $( '.prr-content-js' ).css( 'margin-top', header_height+50 );

        $( window ).on( 'scroll', function() {
            if ( !$( 'body' ).hasClass( 'not-fixed' ) ) {
                if ( $( window ).scrollTop() ) {
                    $( '.site-header' ).addClass( 'stuck' );
                } else {
                    $( '.site-header' ).removeClass( 'stuck' );
                }
            }
        } );
      }
    });

    /**
     * Mobile menu
     */

    $( '.dropdown-toggle' ).on( 'click', function(){
        $( this ).toggleClass( 'toggled' );
        $( this ).next().slideToggle();
    } );

    // Function to show the menu
    function show_menu( e ) {
        e.preventDefault();
        $( '.nav-parent' ).addClass( 'mobile-menu-open' );
    }

    // Function to hide the menu
    function hide_menu( e ){
        e.preventDefault();
        $( '.nav-parent' ).removeClass( 'mobile-menu-open' );
    }

    $( '.menubar-right' ).on( 'click', show_menu );
    $( '.mobile-menu-overlay' ).on( 'click', hide_menu );
    $( '.menubar-close' ).on( 'click', hide_menu );

    /**
     * Search Icon Switch
     */
    var $search_icon        =   $( '.search-icon' );
    var $search_dropdown    =   $( '.search-dropdown' );

    $search_icon.on( 'click', function( e ) {
        e.preventDefault();

        if ( $search_dropdown.hasClass( 'search-hidden' ) || $search_dropdown.hasClass( 'search-default' ) ) {

            $search_dropdown.attr( 'class', 'search-dropdown search-shown' );

        } else if( $search_dropdown.hasClass( 'search-shown' ) ) {

            $search_dropdown.attr( 'class', 'search-dropdown search-hidden' );

        }
    } );

} )( jQuery );
