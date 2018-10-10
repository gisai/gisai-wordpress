<?php
/**
 * @package Sydney
 */
?>

<?php $meta = custom_get_meta( get_the_ID() )?>

<?php
	$fecha = $meta['wpcf-oferta-plazo'];
	$arrayFecha = explode("/", $fecha);
	$fecha = mktime(0, 0, 0, $arrayFecha[1], $arrayFecha[0], $arrayFecha[2]);
	if(time() > $fecha ) {
		$clase = "indicador-oferta-inactivo";
		$texto = "Fuera de plazo";
	} else {
		$clase = "indicador-oferta-activo";
		$texto = "Abierto";
 }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content project-content">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col detalles-oferta box-shadow">

				<h3>Detalles de la oferta</h3>
				<hr>

				<?php if(!empty($meta['wpcf-oferta-categoria'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Categoría:</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-categoria']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-linea-investigacion'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Línea de investigación:</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-linea-investigacion']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-centro-trabajo'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Centro de trabajo:</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-centro-trabajo']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-direccion'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Dirección:</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-direccion']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-jornada'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Jornada (h/sem):</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-jornada']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-asignacion-bruta'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Asignación bruta/mes (€):</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-asignacion-bruta']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-duracion'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Duración prevista (meses):</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-duracion']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-fecha'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Fecha prevista de inicio:</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-fecha']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-titulacion-requerida'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Titulación requerida:</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-titulacion-requerida']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-experiencia-necesaria'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Experiencia necesaria:</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-experiencia-necesaria']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-responsable'])) {?>
					<div class="row datos-oferta">
						<div class="col-lg-4">
							<h5>Responsable:</h5>
						</div>
						<div class="col-lg-8">
							<h5><?php echo($meta['wpcf-oferta-responsable']);?></h5>
						</div>
					</div>
				<?php } ?>

				<?php if(!empty($meta['wpcf-oferta-contacto']) && time() < $fecha) {?>
					<hr>
					<a href="mailto:<?php echo($meta['wpcf-oferta-contacto']);?>"><button class="btn btn-block btn-primary">Remitir curriculum vitae (por correo electrónico)</button></a>
				<?php } ?>


			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php sydney_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
