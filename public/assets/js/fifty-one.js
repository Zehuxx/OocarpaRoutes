$(document).ready(function(){

	/* PRELOADER SCRIPT */
	$(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").delay(5000).fadeOut("slow");;
    }); 
	/* PRELOADER SCRIPT ENDS */

	/* SLIDESHOW BACKGROUND SCRIPT */
	$(".background-container").vegas({
        delay: 7000,
        timer: false,
        shuffle: true,
        transition: [ 'swirlRight', 'swirlLeft' ],
        transitionDuration: 2000,
        slides: [
            { src: "assets/images/slide-1.jpeg" },
            { src: "assets/images/slide-2.jpeg" },
            { src: "assets/images/slide-3.jpeg" }
        ]
    });
    $('.vegas-container').removeAttr('style');

    $(window).resize(function() {
      if ($('body').width() < 1000)
        $('.vegas-container').height(550);
      else
        $('.vegas-container').height(800);
    });
	/* SLIDESHOW BACKGROUND SCRIPT ENDS */

	/* COUNTDOWN SCRIPT */
	$('#getting-started').countdown('2018/01/01', function(event) {
        $(this).html(event.strftime(''
            + '<div class="days"><span>%D </span><hr/><span class="label"> Days </span></div>'
            + '<div class="hours"><span>%H </span><hr/><span class="label"> Hrs </span></div>'
            + '<div class="minutes"><span>%M </span><hr/><span class="label"> Mins </span></div> ' 
            + '<div class="seconds"><span>%S </span><hr/><span class="label"> Secs </span></div>'
        ));
    });
	/* COUNTDOWN SCRIPT ENDS*/

    /* NAVIGATION BAR SCRIPT */
    $(window).scroll(function() {
        var scrollPos = $(window).scrollTop(),
        navbar = $('.navbar-default');

        if (scrollPos > 200) {
          navbar.addClass('is-scroll');
        } else {
          navbar.removeClass('is-scroll');
        }
    });
    /* NAVIGATION BAR SCRIPT ENDS */

    /* COUNTER SCRIPT */
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    /* COUNTER SCRIPT ENDS */

    /* TESTIMONINALS CAROUSEL SCRIPT */
    $("#owl-example").owlCarousel({
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay: 5000,
        stopOnHover: true
    });
    /* TESTIMONINALS CAROUSEL SCRIPT ENDS */

    /* THE TEAM CAROUSEL SCRIPT */
    $("#meet-team").owlCarousel({
        items: 3,
        itemsDesktopSmall : [980,2],
        itemsTablet: [768,2],
        itemsTabletSmall: false,
        itemsMobile : [479,1],
        slideSpeed : 300,
        paginationSpeed : 400,
        autoPlay: 5000,
        stopOnHover: true
    });
	/* THE TEAM CAROUSEL SCRIPT ENDS */


	

	/* ================================== 
					ANIMATION 
	   ================================== */

	  if ( $('body').hasClass( 'play-animations' )) {
      var $animator = $( '*[data-animation]' );

      $animator.each( function( j, elem ) {

        var $elem = $( elem ),
          animationClass = $elem.data( 'animation' );

        $elem.addClass( animationClass );
        $elem.addClass( 'animated visible' );
        $elem.addClass( 'pause-animation' );

        $elem.one( 'inview', function() {
          $elem.removeClass( 'pause-animation' );
          $elem.addClass( 'finished-animation' );
        });
      });
    };

});	
