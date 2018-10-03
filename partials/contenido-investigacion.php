<?php
/**
 * @package Sydney
 */
?>

<?php $meta = custom_get_meta(get_the_ID()); ?>
<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col detalles-investigacion box-shadow">
				<div class="row vertical-align">
					<div class="col-lg-4">
						<div class="imagen-investigacion" style="background-image: url(<?php echo $featured_image ?>)"></div>
					</div>
					<div class="col-lg-8">

						<?php if(!empty($meta['wpcf-investigacion-nombre'])) { ?>
							<h5><?php echo($meta['wpcf-investigacion-nombre'])?></h5>
						<?php } ?>

						<?php if(!empty($meta['wpcf-investigacion-descripcion'])) { ?>
							<p><?php echo($meta['wpcf-investigacion-descripcion'])?></p>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 contenido-investigacion">
				<?php the_content(); ?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php sydney_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
