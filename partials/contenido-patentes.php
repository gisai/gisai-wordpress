<?php
/**
 * @package Sydney
 */
?>

<?php $meta = custom_get_meta(get_the_ID()); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content project-content">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col detalles-patente box-shadow">
				<div class="row">
					<div class="col-lg-6">

						<?php if(!empty($meta['wpcf-patente-numero-publicacion'])) { ?>
							<h5 class="datos-patente">Número de publicación: <span class="numero-patente"><?php echo($meta['wpcf-patente-numero-publicacion'])?></span></h5>
						<?php } ?>

					</div>
					<div class="col-lg-6">

						<?php if(!empty($meta['wpcf-patente-numero-solicitud'])) { ?>
							<h5 class="datos-patente">Número de solicitud: <span class="numero-patente"><?php echo($meta['wpcf-patente-numero-solicitud'])?></span></h5>
						<?php } ?>

					</div>
				</div>
				<hr>
				<div class="row vertical-align">
					<div class="col-lg-6 fechas-patente">

						<?php if(!empty($meta['wpcf-patente-fecha-presentacion'])) { ?>
							<h5>Fecha de presentación:</h5>
							<p><?php echo($meta['wpcf-patente-fecha-presentacion'])?></p>
						<?php } ?>

						<?php if(!empty($meta['wpcf-patente-fecha-publicacion'])) { ?>
							<h5>Fecha de publicación de la concesión:</h5>
							<p><?php echo($meta['wpcf-patente-fecha-publicacion'])?></p>
						<?php } ?>

					</div>
					<div class="col-lg-6">

						<?php if(!empty($meta['wpcf-patente-titular'])) { ?>
							<h5>Titular/es:</h5>
							<p><?php echo($meta['wpcf-patente-titular'])?></p>
						<?php } ?>

						<?php if(!empty($meta['wpcf-patente-inventor'])) { ?>
							<h5>Inventor/es:</h5>
							<p><?php echo($meta['wpcf-patente-inventor'])?></p>
						<?php } ?>

						<?php if(!empty($meta['wpcf-patente-agente'])) { ?>
							<h5>Agente/Representante:</h5>
							<p><?php echo($meta['wpcf-patente-agente'])?></p>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 contenido-patente">
				<?php the_content(); ?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php sydney_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
