<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Sydney
 */
?>

<?php $pages = get_pages(array( 'child_of' => $post->ID, 'sort_column' => 'menu_order')); ?>

<div class="row">
	<div class="col-lg-12">
		<?php the_title('<h1 class="title-post entry-title">', '</h1>');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-8 text-justify">
		<?php the_content('<p class="text-justify">', '</p>');?>
	</div>
	<div class="col-lg-4">
		<div id="subpage-links" class="row">
		<?php	foreach( $pages as $page ) { ?>

			<?php $icon = get_post_meta( $page->ID, 'wpcf-pagina-icono', true ); ?>

			<div class="col-lg-12">
				<a href="<?php echo get_page_link( $page->ID ); ?>">
					<div class="page-links-list box-shadow">
						<h6><i class="fa fa-fw fa-<?php echo $icon ?>" aria-hidden="true"></i> <?php echo $page->post_title; ?></h6>
					</div>
				</a>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
