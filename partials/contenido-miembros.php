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
			<div class="col detalles-miembro box-shadow">
				<div class="row vertical-align">
					<div class="col-lg-4">
						<div class="img-miembro" >
							<img src="<?php echo $featured_image; ?>"/>
						</div>
						<?php the_title( '<h5 class="panel-title member-name text-center"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h5>' ); ?>

						<?php if(!empty($meta['wpcf-miembro-posicion'])) {?>
							<p><span class="list-details">Posición:</span></p>
							<p><?php echo($meta['wpcf-miembro-posicion']);?></p>
						<?php } ?>

						<?php if(!empty($meta['wpcf-miembro-correo'])) {?>
							<p><span class="list-details">Correo:</span></p>
							<p><a href="mailto:<?php echo($meta['wpcf-miembro-correo']);?>"><?php echo($meta['wpcf-miembro-correo']);?></a></p>
							<?php if(!empty($meta['wpcf-miembro-enlace'])) {?>
								<a href="<?php echo $meta['wpcf-miembro-enlace']?>"><button class="btn btn-sm btn-block btn-primay">Vsitar página personal</button></a>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="col-lg-8">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- .entry-content -->

	<footer class="entry-footer">
		<?php sydney_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
