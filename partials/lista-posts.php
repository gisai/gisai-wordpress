<?php
/**
 * The template used for archives
 *
 * @package Sydney
 */
?>

<div id="list">

<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$post_per_page = get_post_meta( get_the_ID(), 'wpcf-posts-por-pagina', true );
	$post_type = get_post_meta( get_the_ID(), 'wpcf-pagina-post', true);
	if ($post_type == 'proyectos') {
		$financiacion = get_post_meta( get_the_ID(), 'wpcf-pagina-financiacion', true);
		$loop = new WP_Query( array( 'post_type' => $post_type, 'meta_key' => 'wpcf-proyecto-financiacion', 'meta_value' => $financiacion, 'meta_compare' => '==', 'paged' => $paged, 'posts_per_page' => $post_per_page, 'order' => 'DESC', 'orderby' => 'date' ) );
	} else {
		$loop = new WP_Query( array( 'post_type' => $post_type, 'paged' => $paged, 'posts_per_page' => $post_per_page, 'order' => 'DESC', 'orderby' => 'date' ) );
	}
?>

<div class="row">
	<div id="pagination">
		<div class="col-lg-3 text-left">
			<?php next_posts_link( '<button class="btn btn-sm">Posteriores</button>', $loop->max_num_pages ); ?>
		</div>
		<div class="col-lg-6 text-center">
			<?php if ($loop->max_num_pages > 1) { ?>
				<h6>Página <?php echo $paged ?> de <?php echo $loop->max_num_pages ?> - Número de <?php echo $post_type; ?>: <?php echo $loop->found_posts ?></h6>
			<?php } ?>
		</div>
		<div class="col-lg-3 text-right">
			<?php previous_posts_link( '<button class="btn btn-sm">Anteriores</button>' ); ?>
		</div>
	</div>
</div>

<div id="posts-list" class="row">
	<?php if( $loop->have_posts() ) : ?>

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<?php $meta = get_post_meta(get_the_ID(), '', true);?>
			<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

			<?php get_template_part('partials/elemento', $post_type) ?>

		<?php endwhile; // end of the loop. ?>
</div>

	<?php wp_reset_postdata(); ?>

	<?php  else : ?>

	<div class="row">
		<?php get_template_part('partials/elemento', 'vacio') ?>
	</div>

	<?php endif; ?>

</div>
