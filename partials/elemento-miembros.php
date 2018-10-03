<?php
/**
 *
 * @package Sydney
 */
?>

	<?php $meta = custom_get_meta( get_the_ID() )?>
	<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-3'); ?>>
		<div class="list-item box-shadow" onclick="window.location='<?php echo get_permalink(); ?>';">
			<div class="row">
				<div class="col-lg-12">
					<div class="img-miembro box-shadow" style="background-image: url(<?php echo $featured_image; ?>)"></div>
				</div>
				<div class="col-lg-12 detalles-miembro-lista">
					<?php the_title( '<h5 class="panel-title member-name text-center"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h5>' ); ?>

					<?php if(!empty($meta['wpcf-miembro-posicion'])) {?>
						<p><span class="list-details">Posición:</span></p>
						<p><?php echo($meta['wpcf-miembro-posicion']);?></p>
					<?php } ?>

					<?php if(!empty($meta['wpcf-miembro-correo'])) {?>
						<a href="mailto:<?php echo($meta['wpcf-miembro-correo']);?>"><button class="btn btn-sm btn-block btn-primay btn-miembro-lista">Contactar</button></a>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
