<?php
/**
 * The template used for
 *
 * @package Sydney
 */
?>

	<?php $meta = custom_get_meta( get_the_ID() )?>
	<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12'); ?>>
		<div class="list-item box-shadow" onclick="window.location='<?php echo get_permalink(); ?>';">
			<div class="row vertical-align">
				<div class="col-lg-3">
					<?php if (has_post_thumbnail( get_the_ID() ) ) { ?>
						<img src="<?php echo $featured_image; ?>"/>
					<?php } else { ?>
						<div class="icono-proyecto"><i class="fa fa-4x fa-briefcase" aria-hidden="true"></i></div>
					<?php } ?>
				</div>
				<div class="col-lg-9">
					<?php the_title( '<h3 class="panel-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h3>' ); ?>

					<?php if(!empty($meta['wpcf-proyecto-entidades-financiadoras'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p><span class="list-details">Entidad financiadora:</span></p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-proyecto-entidades-financiadoras']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-proyecto-referencia'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p><span class="list-details">Número de referencia:</span></p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-proyecto-referencia']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-proyecto-fecha-inicio']) && !empty($meta['wpcf-proyecto-fecha-final'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p><span class="list-details">Duración:</span></p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-proyecto-fecha-inicio']);?> - <?php echo($meta['wpcf-proyecto-fecha-final']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-proyecto-investigadores'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p><span class="list-details">Investigadores:</span></p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-proyecto-investigadores']);?></p>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
