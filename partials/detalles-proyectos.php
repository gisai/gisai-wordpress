<?php
/**
 * @package Sydney
 */
?>

<?php $meta = get_post_meta( get_the_ID(), '', true ); ?>

<div class="project-details box-shadow">
  <h2>Detalles del proyecto</h2>
  <hr>
  <h6>Entidad financiadora:</h6>
  <p><?php echo(implode(", ", $meta['wpcf-proyecto-entidades-financiadoras']));?></p>
  <h6>Número de referencia:</h6>
  <p><?php echo(implode(", ", $meta['wpcf-proyecto-referencia']));?></p>
  <h6>Entidades participantes:</h6>
  <p><?php echo(implode(", ", $meta['wpcf-proyecto-entidades-participantes']));?></p>
  <h6>Duración:</h6>
  <p>Desde: <?php echo(implode("", $meta['wpcf-proyecto-fecha-inicio']));?></p>
  <p>Hasta: <?php echo(implode("", $meta['wpcf-proyecto-fecha-final']));?></p>
  <h6>Número total de meses:</h6>
  <p><?php echo(implode(" ", $meta['wpcf-proyecto-duracion']));?></p>
  <h6>Investigadores:</h6>
  <p><?php echo(implode(" ", $meta['wpcf-proyecto-investigadores']));?></p>
  <h6>Presupuesto: </h6>
  <p><?php echo(implode(", ", $meta['wpcf-proyecto-presupuesto']));?> €</p>
  <a href="<?php echo(implode("", $meta['wpcf-proyecto-enlace']));?>"><button class="btn btn-block">Visitar web del proyecto</button></a>
</div>
