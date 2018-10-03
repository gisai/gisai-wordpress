<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Sydney
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action('sydney_before_site'); //Hooked: sydney_preloader() ?>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sydney' ); ?></a>

	<?php sydney_contact_info(); ?>

	<?php do_action('sydney_before_header'); //Hooked: sydney_header_clone() ?>

	<?php

	$args = array(
		'post_status' => 'any',
		'post_type'   => 'attachment'
	);
	$images = array();
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) : $query->the_post() ;
		$title = get_the_title();
		$id = get_the_ID();
		$images[$title] = $id;
	endwhile;
	?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrap">
      <div class="container-fluid">
				<div class="row vertical-align">
					<div class="col-lg-2 text-right"> <!-- Imagen del grupo -->
						<img class="header-menu-image" src="http://gisai.dit.upm.es/wp-content/uploads/logo-gisai.png"/>
					</div> <!-- Imagen del grupo -->
					<div class="col-lg-8 text-center">
						<div class="row header-menu">
							<div class="col-md-12 col-sm-12 col-xs-12">
					        <?php if ( get_theme_mod('site_logo') ) : ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
					        <?php else : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					        <?php endif; ?>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="btn-menu"></div>
								<nav id="mainnav" class="mainnav" role="navigation">
									<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'sydney_menu_fallback' ) ); ?>
								</nav> <!-- #site-navigation -->
							</div>
						</div>
					</div>
					<div class="col-lg-2 text-left"> <!-- Imagen de la universidad -->
						<img class="header-menu-image" src="http://gisai.dit.upm.es/wp-content/uploads/logo-upm.png"/>
					</div> <!-- Imagen de la universidad -->
				</div>
			</div>
		</div>
	</header> <!-- #masthead -->

	<?php do_action('sydney_after_header'); ?>

	<div class="sydney-hero-area">
		<?php sydney_slider_template(); ?>
		<div class="header-image">
			<?php sydney_header_overlay(); ?>
			<img class="header-inner" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
		</div>
		<?php sydney_header_video(); ?>

		<?php do_action('sydney_inside_hero'); ?>
	</div>

	<?php do_action('sydney_after_hero'); ?>

	<?php if ( is_active_sidebar( 'sidebar-header' ) && get_theme_mod('activate_bh_widgets') && (!is_front_page() || ( is_front_page() && get_theme_mod('hide_bh_widgets') != 1 ) ) ) : ?>
    <div class="header-widgets">
	    <div class="container">
	        <?php dynamic_sidebar( 'sidebar-header' ); ?>
	    </div>
    </div>
    <?php endif; ?>

	<div id="content" class="page-wrap">
		<div class="content-wrapper container">
			<div class="row">
