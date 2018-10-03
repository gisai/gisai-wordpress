<?php
/**
 *
 * @package Sydney
 */
?>

	<?php $meta = custom_get_meta( get_the_ID() )?>
	<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12'); ?>>

		<div class="list-item box-shadow" onclick="window.location='<?php echo get_permalink(); ?>';">
			<div class="row vertical-align">
				<div class="col-lg-12">
					<?php the_title( '<h3 class="panel-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h3>' ); ?>

					<?php if(!empty($meta['wpcf-patente-titulo'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p><span class="list-details">Titulo: </span></p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-patente-titulo']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-patente-numero-publicacion'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p><span class="list-details">Número de publicación: </span></p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-patente-numero-publicacion']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-patente-titular'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p><span class="list-details">Titular/es: </span></p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-patente-titular']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-patente-inventor'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p><span class="list-details">Inventor/es: </span></p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-patente-inventor']);?></p>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>

	</div>
