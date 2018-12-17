<?php
/**
 * The template used for
 *
 * @package Sydney
 */
?>

	<?php $meta = custom_get_meta( get_the_ID() )?>
	<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

	<?php
		$fecha = $meta['wpcf-oferta-plazo'];
		$arrayFecha = explode("/", $fecha);
		$fecha = mktime(0, 0, 0, $arrayFecha[1], $arrayFecha[0], $arrayFecha[2]);
		if(time() > $fecha ) {
			$clase = "indicador-oferta-inactivo";
			$texto = "No activa";
		} else {
		 	$clase = "indicador-oferta-activo";
			$texto = "Activa";
	 }
	?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12'); ?>>
		<div class="list-item box-shadow" onclick="window.location='<?php echo get_permalink(); ?>';">
			<div class="row vertical-align">
				<div class="col-lg-12">
					<?php the_title( '<h3 class="panel-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h3>' ); ?>

					<?php if(!empty($meta['wpcf-oferta-categoria'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p class="list-details">Categoría: </p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-oferta-categoria']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-oferta-linea-investigacion'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p class="list-details">Línea de investigación: </p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-oferta-linea-investigacion']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-oferta-titulacion-requerida'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p class="list-details">Titulación requerida: </p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-oferta-titulacion-requerida']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-oferta-centro-trabajo'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p class="list-details">Centro de trabajo: </p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-oferta-centro-trabajo']);?></p>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
			<div class="<?php echo $clase ?>">
				<?php echo $texto ?>
			</div>
		</div>
	</div>
