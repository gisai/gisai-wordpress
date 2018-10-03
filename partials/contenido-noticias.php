<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Sydney
 */
?>

<?php $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="news-image-container-single box-shadow" style="background-image: url(<?php echo $featured_image?>)">
			<?php if(get_the_date() != '') {?>
			<div class="news-date-single">
				<p><?php echo get_the_date(); ?></p>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-lg-12">
		<?php the_title('<h1 class="title-post entry-title">', '</h1>');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 text-justify">
		<?php the_content('<p class="text-justify">', '</p>');?>
	</div>
</div>
