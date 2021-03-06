<?php

/*
Template Name: Lista de contenido
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="title-post entry-title"><?php the_title();?></h1>

				<?php the_content('<p>', '</p>');?>

				<?php get_template_part( 'partials/lista', 'posts' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
