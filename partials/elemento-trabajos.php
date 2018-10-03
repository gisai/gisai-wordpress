<?php
/**
 *
 * @package Sydney
 */
?>

	<?php $meta = custom_get_meta( get_the_ID() )?>
	<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12'); ?>>

		<div
			<?php if(!empty($meta['wpcf-trabajo-enlace'])) { ?>
			class="list-item box-shadow" onclick="window.open('<?php echo $meta['wpcf-trabajo-enlace'] ?>');"
		<?php } else { ?>
			class="list-item box-shadow cursor-default"
		<?php } ?>
			>
			<div class="row vertical-align">
				<div class="col-lg-12">
					<h3 class="panel-title">
						<?php the_title(); ?>
					</h3>

					<?php if(!empty($meta['wpcf-trabajo-tipo'])) { ?>
						<div class="row">
							<div class="col-lg-2">
								<p><span class="list-details">Tipo: </span></p>
							</div>
							<div class="col-lg-10">
								<p><?php echo($meta['wpcf-trabajo-tipo']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-trabajo-autor'])) { ?>
						<div class="row">
							<div class="col-lg-2">
								<p><span class="list-details">Autor/es: </span></p>
							</div>
							<div class="col-lg-10">
								<p><?php echo($meta['wpcf-trabajo-autor']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-trabajo-director'])) { ?>
						<div class="row">
							<div class="col-lg-2">
								<p><span class="list-details">Director/es: </span></p>
							</div>
							<div class="col-lg-10">
								<p><?php echo($meta['wpcf-trabajo-director']);?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-trabajo-fecha'])) { ?>
						<div class="row">
							<div class="col-lg-2">
								<p><span class="list-details">Fecha: </span></p>
							</div>
							<div class="col-lg-10">
								<p><?php echo($meta['wpcf-trabajo-fecha']);?></p>
							</div>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>

	</div>
