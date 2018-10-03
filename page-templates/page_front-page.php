<?php
/*
Template Name: Página principal
*/

get_header(); ?>

	<div id="primary" class="fp-content-area">
		<main id="main" class="site-main" role="main">

			<div class="entry-content">

				<div class="row front-page-row">
					<div class="col-lg-12">
						<div class="slider-container box-shadow">
							<?php if(function_exists('crellySlider')) crellySlider('principal'); ?>
						</div>
					</div>
				</div>

				<?php while ( have_posts() ) : the_post(); ?>

				<div class="row front-page-row">
					<?php get_template_part('partials/contenido-principal', 'noticias'); ?> <!-- col-lg-12 -->
				</div>

				<hr></hr>

				<div class="row front-page-row">
					<div class="col-lg-6 text-left">
						<h1 class="titulo-contacto">Redes y Contacto</h1>
						<h4><a href="https://github.com/gisai" target="_blank"><i class="fa fa-fw fa-github"></i> Github</a></h4>
						<hr/>
						<h4><a href="https://www.linkedin.com/company-beta/11216428/" target="_blank"><i class="fa fa-fw fa-linkedin"></i> LinkedIn</a></h4>
						<hr/>
						<h4><a href="https://www.facebook.com/gisai.upm" target="_blank"><i class="fa fa-fw fa-facebook-square"></i> Facebook</a></h4>
						<hr/>
						<h4><a href="https://twitter.com/gisai_upm" target="_blank"><i class="fa fa-fw fa-twitter-square"></i> Twitter</a></h4>
						<hr/>
						<h4><a href="https://plus.google.com/communities/115004796905014004569" target="_blank"><i class="fa fa-fw fa-google-plus-official"></i> Google +</a></h4>
						<hr/>
						<h4><a href="https://www.pinterest.com/gisaiupm" target="_blank"><i class="fa fa-fw fa-pinterest"></i> Pinterest</a></h4>
						<hr/>
					</div>
					<div class="col-lg-6 text-right">
						<?php // TODO: comprobar lenguaje para renderizar un formulario u otro ?>
						<?php echo do_shortcode('[contact-form-7 id="1112" title="Formulario de contacto"]'); ?>
					</div>
				</div>

				<?php endwhile; ?>
			</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
