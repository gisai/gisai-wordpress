<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Sydney
 */
?>

<?php $news = new WP_QUERY( array( 'post_type' => 'post', 'posts_per_page' => 4 ) );?>
<?php $news_page = get_page_by_title('News') ?>

<div class="col-lg-12">
	<div class="row front-page-row-title">
		<div class="col-lg-12 text-center">
			<h1><?php pll_e('Ultimas noticias'); ?></h1>
		</div>
	</div>
	<div class="row front-page-row-content">
		<?php while ( $news->have_posts() ) : $news->the_post(); ?>
			<?php
				if ($news->found_posts > 4) {
					$col = 3;
				} else {
					$col = 12/$news->found_posts;
				}
			?>
			<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

			<div class="col-lg-<?php echo $col ?>">
				<?php echo('<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">'); ?>
					<div class="front-page-news-image-container box-shadow" style="background-image: url(<?php echo $featured_image?>)"></div>
				</a>
				<?php the_title( '<h4 class="front-page-news-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h4>' ); ?>
				<p class="front-page-news-date"><?php the_date(); ?></p>
				<p><?php the_excerpt(); ?></p>
			</div>

		<?php endwhile; // end of the loop. ?>
		<a href="<?php echo get_page_link($news_page->ID);?>"><button class="btn btn-sm btn-block"><?php pll_e('Ver todas las noticias'); ?></button></a>
	</div>
</div>
