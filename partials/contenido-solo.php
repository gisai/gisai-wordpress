<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Sydney
 */
?>

<div class="row">
	<div class="col-lg-12">
		<?php the_title('<h1 class="title-post entry-title">', '</h1>');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 text-justify">
		<?php the_content('<p class="text-justify">', '</p>');?>
	</div>
</div>
