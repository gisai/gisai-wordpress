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

	$( document ).on( 'click', '.copy-to-clipboard', function () {
		console.log( 'click' );
		var target = '#' + $( this ).attr( 'data-target' );
		var text = $( target ).select();
		document.execCommand( "copy" );
		alert( "Copiado al portapapeles: " + text );
	} );

} );
