jQuery( function ( $ ) {

	$( document ).ready( function () {
		$( '.publication-bibtex' ).hide();
		$( '.publication-abstract' ).hide();
	} )

	$( document ).on( 'click', '.toggler', function () {
		var target = $( this ).attr( 'data-target' );
		var pub = $( this ).attr( 'data-pub' );
		switch ( target ) {
		case 'bibtex':
			$( '#abstract-' + pub ).slideUp( "slow", function () {
				$( '#bibtex-' + pub ).slideToggle( "slow", );
			} );
			break;
		case 'abstract':
			$( '#bibtex-' + pub ).slideUp( "slow", function () {
				$( '#abstract-' + pub ).slideToggle( "slow" );
			} );
			break;
		}
	} )

	var clipboard = new ClipboardJS( '.copy-to-clipboard' );

	clipboard.on( 'success', function ( e ) {
		alert( 'Copiado en el portapapeles.' );
		e.clearSelection();
	} );

} );
