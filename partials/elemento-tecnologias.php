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
				<div class="col-lg-3">
					<?php if (has_post_thumbnail( get_the_ID() ) ) { ?>
						<img src="<?php echo $featured_image; ?>"/>
					<?php } else { ?>
						<div class="icono-tecnologia"><i class="fa fa-4x fa-flask" aria-hidden="true"></i></div>
					<?php } ?>
				</div>
				<div class="col-lg-9">
					<?php the_title( '<h3 class="panel-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h3>' ); ?>
					<?php if(!empty($meta['wpcf-tecnologia-descripcion'])) { ?>
						<p><?php echo($meta['wpcf-tecnologia-descripcion']);?></p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
