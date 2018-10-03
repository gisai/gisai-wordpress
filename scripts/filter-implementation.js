jQuery( function ( $ ) {

	var filter = {
		'year': null,
		'type': null,
		'journal': null,
	};

	function filterFunction() {
		$( '.publication' ).map( function () {
			if ( filter.year != null && $( this ).attr( 'data-year' ) != filter.year ) {
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
		$( '#filter-year' ).on( 'change', function () {
			if ( $( this ).val() == "" ) {
				filter.year = null
			} else {
				filter.year = $( this ).val()
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
