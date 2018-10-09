jQuery( function ( $ ) {

	var filter = {
		'author': null,
		'type': null,
		'journal': null,
	};

	function filterFunction() {
		$( '.publication' ).map( function () {
			if ( filter.author != null && filter.author != 'Autor...' && $( this ).attr( 'data-author' ).indexOf(filter.author.toLowerCase()) == -1 ) {
				$( this ).slideUp( "slow" );
			} else
			if ( filter.type != null && $( this ).attr( 'data-type' ) != filter.type ) {
				$( this ).slideUp( "slow" );
			} else
			if ( filter.journal != null && $( this ).attr( 'data-journal' ) != filter.journal ) {
				$( this ).slideUp( "slow" );
			} else {
				$( this ).slideDown( "slow" );
			}
		} )
	}

	$( document ).ready( function () {

		$( '#filter-author' ).val('Autor...');

		$( '#filter-author').on('focusin', function () {
			if($( this ).val() == 'Autor...') {
				$( this ).val('');
			}
		});

		$( '#filter-author').on('focusout', function () {
			if ($( this ).val() == '') {
				$( this ).val('Autor...');
			}
		});

		$( '#filter-author' ).on( 'keyup', function () {
			if ( $( this ).val() == "" ) {
				filter.author = null
			} else {
				filter.author = $( this ).val()
			}
			filterFunction()
		} )

		$( '#filter-type' ).on( 'change', function () {
			if ( $( this ).val() == "" ) {
				filter.type = null
			} else {
				filter.type = $( this ).val()
			}
			filterFunction()
		} )

		$( '#filter-journal' ).on( 'change', function () {
			if ( $( this ).val() == "" ) {
				filter.journal = null
			} else {
				filter.journal = $( this ).val()
			}
			filterFunction()
		} )
	} )
} );
