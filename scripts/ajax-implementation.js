jQuery( function ( $ ) {

	$( '#content' ).on( 'click', '#pagination div a', function ( e ) {
		e.preventDefault();
		var link = $( this ).attr( 'href' );
		$( '#list' ).fadeOut( 250, function () {
			$( this ).load( link + ' #list', function () {
				window.history.pushState( "", "", link );
				$( this ).fadeIn( 250 );
			} );
		} );
	} )

	// $( '#menu-principal' ).on( 'click', ' a', function ( e ) {
	// 	e.preventDefault();
	// 	var link = $( this ).attr( 'href' );
	// 	$( '#content' ).fadeOut( 250, function () {
	// 		$( '#content' ).load( link + ' #content', function () {
	// 			window.history.pushState( "", "", link );
	// 			$( '#content' ).fadeIn( 250 );
	// 		} );
	// 	} );
	// } )

	$( '#content' ).on( 'click', '#subpage-links div a', function ( e ) {
		e.preventDefault();
		var link = $( this ).attr( 'href' );
		$( '#content' ).fadeOut( 250, function () {
			$( '#content' ).load( link + ' #content', function () {
				window.history.pushState( "", "", link );
				$( '#content' ).fadeIn( 250 );
			} );
		} );
	} )

} );
