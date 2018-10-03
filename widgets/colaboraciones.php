<?php

class Custom_Colaboraciones extends WP_Widget {

	public function __construct() {
		$widget_ops = array('description' => __( 'Muestra una lista de iconos de empresas con las que colaboramos.', 'sydney'), 'panels_groups' => array('GISAI'), 'panels_icon' => 'dashicons dashicons-groups' );
        parent::__construct(false, $name = __('Página Principal: Colaboraciones', 'sydney'), $widget_ops);
		$this->alt_option_name = 'custom_colaboraciones';

    }

	function form($instance) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    		= isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$category   	= isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$see_all   		= isset( $instance['see_all'] ) ? esc_url_raw( $instance['see_all'] ) : '';
		$see_all_text = isset( $instance['see_all_text'] ) ? esc_html( $instance['see_all_text'] ) : '';
		$newtab				= isset( $instance['newtab'] ) ? (bool) $instance['newtab'] : false;
	?>

	<p><?php _e('Para que este widget sea visualizado es necesario haber añadido al menos una colaboracion. La imagen destacada debe ser idealmente el logo de la empresa/grupo', 'sydney'); ?></p>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Titulo', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Número de colaboraciones a mostrar (-1 implica mostrar todas):', 'sydney' ); ?></label>
	<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <p><label for="<?php echo $this->get_field_id('see_all'); ?>"><?php _e('URL del botón [en caso de querer un botón debajo del bloque de colaboraciones]', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'see_all' ); ?>" name="<?php echo $this->get_field_name( 'see_all' ); ?>" type="text" value="<?php echo $see_all; ?>" size="3" /></p>
    <p><label for="<?php echo $this->get_field_id('see_all_text'); ?>"><?php _e('El texto del botón [<em>Ver todas las colaboraciones</em> por defecto]', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'see_all_text' ); ?>" name="<?php echo $this->get_field_name( 'see_all_text' ); ?>" type="text" value="<?php echo $see_all_text; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Slug de las colaboraciones a mostrar o nada si se desea mostrar todas', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo $category; ?>" size="3" /></p>

	<p><input class="checkbox" type="checkbox" <?php checked( $newtab ); ?> id="<?php echo $this->get_field_id( 'newtab' ); ?>" name="<?php echo $this->get_field_name( 'newtab' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'newtab' ); ?>"><?php _e( 'Marcar para abrir enlaces en una pestaña nueva', 'sydney' ); ?></label></p>

	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['number'] 		= strip_tags($new_instance['number']);
		$instance['see_all'] 		= esc_url_raw( $new_instance['see_all'] );
		$instance['see_all_text'] 	= strip_tags($new_instance['see_all_text']);
		$instance['category'] 		= strip_tags($new_instance['category']);
		$instance['newtab'] 		= isset( $new_instance['newtab'] ) ? (bool) $new_instance['newtab'] : false;

		return $instance;
	}

	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		extract($args);

		$title 			= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$see_all 		= isset( $instance['see_all'] ) ? esc_url($instance['see_all']) : '';
		$see_all_text 	= isset( $instance['see_all_text'] ) ? esc_html($instance['see_all_text']) : '';
		$number 		= ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		if ( ! $number ) {
			$number = -1;
		}
		$category 		= isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		$newtab			= isset( $instance['newtab'] ) ? $instance['newtab'] : false;

		if ( $newtab ) {
			$target = "_blank";
		} else {
			$target = "_self";
		}

		$clients = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type' 		  => 'colaboraciones',
			'posts_per_page'	  => $number,
			'category_name'		  => $category
		) );

		echo $args['before_widget'];

		if ($clients->have_posts()) :
?>

	<!-- CONTENIDO DEL WIDGET A MOSTRAR EN LA PÁGINA PRINCIPAL -->

			<?php if ( $title ) echo $before_title . $title . $after_title; ?>
				<div class="roll-client">
				<?php while ( $clients->have_posts() ) : $clients->the_post(); ?>
					<?php $link = get_post_meta( get_the_ID(), 'wpcf-client-link', true ); ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="client-item">
							<?php if ($link) : ?>
								<a target="<?php echo $target; ?>" href="<?php echo esc_url($link); ?>"><?php the_post_thumbnail(); ?></a>
							<?php else : ?>
								<?php the_post_thumbnail('small-thumb'); ?>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
				</div>

			<?php if ($see_all != '') : ?>
				<a href="<?php echo esc_url($see_all); ?>" class="roll-button more-button">
					<?php if ($see_all_text) : ?>
						<?php echo $see_all_text; ?>
					<?php else : ?>
						<?php echo __('Ver todos los clientes', 'sydney'); ?>
					<?php endif; ?>
				</a>
			<?php endif; ?>

	<!-- .FINAL DEL CONTENIDO -->

	<?php

		echo $args['after_widget'];
		wp_reset_postdata();

		endif;

	}

}
