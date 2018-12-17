<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Sydney
 */
?>

<div class="row">
	<div class="col-lg-12">
		<?php the_title('<h1 class="title-post entry-title text-center">', '</h1>');?>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 text-justify">

		<?php

			function format_author ($author) {
				return str_replace(' and', ',', $author);
			}

			function format_information ($array) {
				return implode(' - ', array_filter($array));
			}

			function format_abstract ($abstract) {
				return str_replace('textlessptextgreater', '', str_replace('textless/ptextgreater', '', $abstract));
			}

			function format_data ($data) {
				return str_replace(' ', '-', $data);
			}

			$publications = tp_publications::get_publications( array('output_type' => ARRAY_A) );
			$counter = 0;

			/**********************
							FILTER
			***********************/
			$types = [];
			foreach($publications as $pub){
				array_push($types, $pub['type']);
			}
			$types = array_unique($types);

			$journals = [];
			foreach($publications as $pub){
				array_push($journals, $pub['journal']);
			}
			$journals = array_filter(array_unique($journals));

			/**********************
					  	END	FILTER
			***********************/

			$publications_per_year = []; // publications_per year = [ 'year1' => [publications], 'year2' => [publications] ... ]
			foreach($publications as $pub){
			    if (!isset($publications_per_year[$pub['year']])){
			        $publications_per_year[$pub['year']] = [];
			    }
			    array_push($publications_per_year[$pub['year']], $pub);
			}
		?>

		<div class="row">
			<div class="col-lg-4">
				<input id="filter-author" class="custom-input"/>
			</div>
			<div class="col-lg-4">
				<select id="filter-type" class="custom-select">
					<option value="">Tipo de publicación...</option>
					<?php
						foreach($types as $type){
							echo ("<option value=" . format_data($type) . ">" . $type . "</option>");
						}
					?></select>
			</div>
			<div class="col-lg-4">
				<select id="filter-journal" class="custom-select">
					<option value="">Publicado en...</option>
					<?php
						foreach($journals as $journal){
							echo ("<option value=" . format_data($journal) . ">" . $journal . "</option>");
						}
					?></select>
				</select>
			</div>
		</div>

		<?php foreach ($publications_per_year as $year) { ?>

			<div class="row">
				<div class="col-lg-12 year">
					<h2><?php echo $year[0]['year']?></h2>
				</div>
			</div>

			<?php foreach ($year as $publication) { ?>

			<?php
				$bibtex = tp_bibtex::get_single_publication_bibtex ($publication, $all_tags = '', $convert_bibtex = false);
				$counter++;
			?>

			<div class="row vertical-align publication" data-author="<?php echo strtolower($publication['author'])?>" data-type="<?php echo format_data($publication['type'])?>" data-journal="<?php echo format_data($publication['journal'])?>">
				<div class="col-lg-2 publication-type-col">
					<div class="publication-type publication-<?php echo $publication['type']?>">
						<?php echo $publication['type']?>
					</div>
				</div>
				<div class="col-lg-8">
					<h6 class="publication-title">
						<a href="<?php echo $publication['url'] ?>"><?php echo $publication['title']?></a> -
						<span class="publication-author"><?php echo format_author($publication['author'])?></span>
					</h6>
					<p class="publication-information">
						<?php
							$information_array = [$publication['journal'], $publication['publisher'], $publication['doi']];
							echo format_information($information_array)
						?>
					</p>
				</div>
				<div class="col-lg-2">
					<button class="btn btn-sm btn-block toggler" data-target="bibtex" data-pub="<?php echo $counter ?>">BibTex</button>
					<?php if ($publication['abstract'] != '') echo (
						'<button class="btn btn-sm btn-block toggler" data-target="abstract" data-pub="' . $counter . '">Abstract</button>')
					?>
				</div>
			</div>
			<!-- BibTex -->
			<div id="bibtex-<?php echo $counter?>" class="row publication-bibtex">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
					<div class="bibtex">
						<div class="bibtex-content" id="bibtex-content-<?php echo $counter ?>">
							<?php echo nl2br($bibtex) ?>
						</div>
						<div class="copy-to-clipboard" data-clipboard-target="#bibtex-content-<?php echo $counter ?>">
							<i class="fa fa-clipboard" aria-hidden="true"></i> Copiar contenido
						</div>
					</div>
				</div>
			</div>
			<!-- Abstract -->
			<div id="abstract-<?php echo $counter?>" class="row publication-abstract">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
						<div class="abstract">
							<?php echo format_abstract($publication['abstract']) ?>
						</div>
				</div>
			</div>
		<?php } ?>
		<?php } ?>

	</div>
</div>
