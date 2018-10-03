<?php

/*
Template Name: Contacto
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'partials/contenido', 'contacto' );
//if (pll_current_language() === 'en') get_template_part( 'partials/contenido', 'contact' );
//else if (pll_current_language() === 'es') get_template_part( 'partials/contenido', 'contacto' );

?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
