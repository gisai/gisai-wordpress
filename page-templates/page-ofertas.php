<?php

/*
Template Name: Ofertas
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_title('<h1 class="title-post entry-title">', '</h1>');?>

				<?php the_content('<p>', '</p>');?>

				<?php get_template_part( 'content', 'projects' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
