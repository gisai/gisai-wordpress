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
		<div class="list-item box-shadow cursor-default">
			<div class="row vertical-align">
				<div class="col-lg-4">
					<img class="colaboracion-img" src="<?php echo $featured_image; ?>"/>
				</div>
				<div class="col-lg-8 text-center colaboracion-contenido">
					<?php the_title( '<h3 class="panel-title">', '</h3>' ); ?>
					<?php the_content(); ?>
					<?php if(!empty($meta['wpcf-colaboracion-enlace'])) { ?>
						<a href="<?php echo $meta['wpcf-colaboracion-enlace'] ?>" target="_blank"><button class="btn btn-block btn-sm btn-primary">Visitar página de la entidad colaboradora</button></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
