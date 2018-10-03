<?php
/**
 * Custom functions that act independently of the theme templates
 *
 *
 * @package Sydney
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sydney_body_classes( $classes ) {

	$front_header_type 	= get_theme_mod('front_header_type','slider');
	$site_header_type 	=get_theme_mod('site_header_type');

	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( ( $front_header_type == 'nothing' && is_front_page() ) || ( $site_header_type == 'nothing' && !is_front_page() ) || ( is_page_template( 'page-templates/page_no-header.php' ) ) || ( is_page_template( 'page-templates/page_no-header-wide.php' ) ) ) { 
		$classes[] = 'no-hero';
	} else {
		$classes[] = 'has-hero';
	}

	return $classes;
}
add_filter( 'body_class', 'sydney_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function sydney_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'sydney' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'sydney_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function sydney_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'sydney_render_title' );
endif;



function sydney_footer_contact() {

	$contact_details_title 	= get_theme_mod( 'contact_details_title' );
	$contact_details 		= get_theme_mod( 'contact_details' );
	$contact_form_shortcode = get_theme_mod( 'contact_form_shortcode' );
	$display 				= get_theme_mod( 'footer_contact_display', 1 );
	
	if ( !$contact_details || !$contact_form_shortcode ) {
		return;
	}

	if ( ( !is_home() && !is_front_page() ) && $display ) {
		return;
	}

	?>
	<div id="footer-contact" class="footer-contact clearfix">
		<div class="container">
			<div class="col-md-6">
				<h3 class="widget-title"><?php echo esc_html( $contact_details_title ); ?></h3>	
				<div class="footer-contact-details">
					<?php echo wp_kses_post( $contact_details ); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="footer-contact-form">
					<?php echo do_shortcode( wp_kses_post( $contact_form_shortcode ) ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'sydney_before_footer', 'sydney_footer_contact' );

/**
 * Support for Yoast SEO breadcrumbs
 */
function sydney_yoast_seo_breadcrumbs() {
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('
		<p class="sydney-breadcrumbs">','</p>
		');
	}
}

/**
* Smart Slider filter
*/
add_filter( 'smartslider3_hoplink', function($source){
	return 'athemescom';
});