<?php
/**
 * @package Sydney
 */
?>

<?php $meta = custom_get_meta( get_the_ID() ) ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="row">
			<div class="col-lg-8">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
			<div class="col-lg-4">
				<div class="project-details box-shadow">
				  <h2>Detalles del proyecto</h2>
				  <hr>
				  <h6>Entidad financiadora:</h6>
				  <p><?php echo($meta['wpcf-proyecto-entidades-financiadoras']);?></p>
				  <h6>Número de referencia:</h6>
				  <p><?php echo($meta['wpcf-proyecto-referencia']);?></p>
				  <h6>Entidades participantes:</h6>
				  <p><?php echo($meta['wpcf-proyecto-entidades-participantes']);?></p>
				  <h6>Duración:</h6>
				  <p>Desde: <?php echo($meta['wpcf-proyecto-fecha-inicio']);?></p>
				  <p>Hasta: <?php echo($meta['wpcf-proyecto-fecha-final']);?></p>
				  <h6>Número total de meses:</h6>
				  <p><?php echo($meta['wpcf-proyecto-duracion']);?></p>
				  <h6>Investigadores:</h6>
				  <p><?php echo($meta['wpcf-proyecto-investigadores']);?></p>
				  <h6>Presupuesto: </h6>
				  <p><?php echo($meta['wpcf-proyecto-presupuesto']);?> €</p>
				  <a href="<?php echo($meta['wpcf-proyecto-enlace']);?>"><button class="btn btn-block">Visitar web del proyecto</button></a>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php sydney_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
