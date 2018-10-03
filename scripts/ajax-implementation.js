jQuery( function ( $ ) {

	$( '#content' ).on( 'click', '#pagination div a', function ( e ) {
		e.preventDefault();
		var url = $( this ).attr( 'href' );
		$( '#list' ).fadeOut( 250, function () {
			$( this ).load( url + ' #list', function () {
				window.history.pushState( "", "", url );
				$( this ).fadeIn( 250 );
			} );
		} );
	} )

	$( '#content' ).on( 'click', '#subpage-links div a', function ( e ) {
		e.preventDefault();
		var url = $( this ).attr( 'href' );
		$( '#content' ).fadeOut( 250, function () {
			$( '#content' ).load( url + ' #content', function () {
				window.history.pushState( "", "", url );
				$( '#content' ).fadeIn( 500 );
				$( '.publication-bibtex' ).hide();
				$( '.publication-abstract' ).hide();
			} );
		} );
	} )

} );
