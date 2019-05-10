(function($){
    /* If this line runs, it means Javascript is enabled in the browser
     * so replace no-js class with js for the body tag
     */
    document.body.className = document.body.className.replace("no-js","js");

    
    /* -----------------------------------------------------------------*/
	/* Activate accessible superfish
	/* -----------------------------------------------------------------*/
	$('.primary-navigation').find('.menu').superfish({
		smoothHeight	: true,
		delay			: 600,
		animation		: {
			opacity :'show',
			height  :'show'
		},
		speed			: 'fast', 
		autoArrows		: false 
	});

	/* -----------------------------------------------------------------*/
	/* Add Placeholder to the Email input field of "Email Subscribers" widget
	/* -----------------------------------------------------------------*/

	if( $( '.elp-widget input[type="email"]' ).length ){
		$( '.elp-widget input[type="email"]' ).attr('placeholder', translated_text_object.email_placeholder );
	}

	/* ------------------------------------------------------*/
	/* Adding fitvid
	/* ------------------------------------------------------*/
	$('body').fitVids();
	
	/* ------------------------------------------------------*/
	/* Instantiate SlickJS
	/* ------------------------------------------------------*/
	$('.make-it-slick .nd-dosth-reviews').slick({
		arrows: false,
		dots: true
	});
    
})(jQuery);
