<?php
/**
 * @package Sydney
 */
?>

<?php $meta = custom_get_meta( get_the_ID() )?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col detalles-software box-shadow">
				<div class="row vertical-align">
					<div class="col-lg-8 texto-detalles-software">

					<?php if(!empty($meta['wpcf-software-titulo'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p class="datos-software">Titulo:</p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-software-titulo'])?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-software-fecha-divulgacion'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p class="datos-software">Fecha de divulgación:</p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-software-fecha-divulgacion'])?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-software-autor'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p class="datos-software">Autor/es y tutular/es originarios de derechos:</p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-software-autor'])?></p>
							</div>
						</div>
					<?php } ?>

					<?php if(!empty($meta['wpcf-software-titular-cesionario'])) { ?>
						<div class="row">
							<div class="col-lg-3">
								<p class="datos-software">Titular cesionario:</p>
							</div>
							<div class="col-lg-9">
								<p><?php echo($meta['wpcf-software-titular-cesionario'])?></p>
							</div>
						</div>
					<?php } ?>

					</div>

					<?php if(!empty($meta['wpcf-software-enlace'])){ ?>
						<div class="col-lg-4 text-center">

							<?php if (has_post_thumbnail( get_the_ID() ) ) { ?>
								<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
								<div class="logo-software" style="background-image: url(<?php echo $featured_image?>)"></div>

							<?php } else { ?>
								<h1 class="github-logo"><i class="fa fa-4x fa-github" aria-hidden="true"></i></h1>
							<?php }?>

							<a href="<?php echo($meta['wpcf-software-enlace']) ?>"><button class="btn btn-primary">Repositorio en GitHub</button></a>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 contenido-patente">
				<?php the_content(); ?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php sydney_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
