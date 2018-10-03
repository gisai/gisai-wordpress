<?php
/**
 * The template used for
 *
 * @package Sydney
 */
?>

<?php
	$post_type = get_post_meta( get_the_ID(), 'wpcf-pagina-post', true);
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12'); ?>>
	<div class="project-list-item box-shadow no-encontrado">
		<div class="row vertical-align">
			<div class="col-lg-12 text-center">
				<?php if ($post_type == 'software') { ?>
					<h4 class="not-found">No se ha encontrado <?php echo $post_type;?></h4>
				<?php } else { ?>
					<h4 class="not-found">No se han encontrado <?php echo $post_type;?></h4>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
