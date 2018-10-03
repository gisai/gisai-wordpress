<?php
/**
 *
 * @package Sydney
 */
?>

	<?php $meta = custom_get_meta( get_the_ID() )?>
	<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-6'); ?>>
		<?php echo('<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">'); ?>
			<div class="news-image-container box-shadow" style="background-image: url(<?php echo $featured_image?>)">
			<?php if(get_the_date() != '') {?>
			<div class="news-date">
				<?php echo get_the_date(); ?>
			</div>
			<?php } ?>
			<div class="news-excerpt">
				<p><?php the_excerpt(); ?></p>
			</div>
			</div>
		</a>
		<h4 class="news-title">
			<?php the_title( '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a>' ); ?>
		</h4>
	</div>
