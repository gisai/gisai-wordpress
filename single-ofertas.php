<?php
/**
 * Template Post Type: ofertas
 * @package Sydney
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area col-md-9 fullwidth">
		<main id="main" class="post-wrap" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/contenido', 'ofertas' ); ?>

			<?php if ( get_theme_mod('project_nav', 0) != 1 ) {
				sydney_post_navigation();
			} ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
