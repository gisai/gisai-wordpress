<?php
/*

Template Name: Inicio de sesión

*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="post-wrap" role="main">
			<?php the_title( '<h1 class="title-post entry-title">', '</h1>' ); ?>
			<div class="template-login-form">
				<?php wp_login_form(); ?>
				<div class="login-register">
					<a href="<?php echo esc_url(wp_lostpassword_url()); ?>" title="<?php echo __( '¿Has olvidado tu contraseña?', 'sydney' ); ?>"><?php echo __( '¿Has olvidado tu contraseña?', 'sydney' ); ?></a>
					<?php wp_register('', ''); ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
