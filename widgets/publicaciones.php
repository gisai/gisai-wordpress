<?php
/**
 * Timeline widget
 *
 * @package Sydney
 */

class Custom_Publicaciones extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'sydney_timeline_widget', 'description' => __( 'Muesta las últimas publicaciones del grupo.', 'sydney'), 'panels_groups' => array('GISAI'), 'panels_icon' => 'dashicons dashicons-book-alt' );
        parent::__construct(false, $name = __('Página Principal: Publicaciones', 'sydney'), $widget_ops);
		$this->alt_option_name = 'custom_publicaciones';

    }

	function form($instance) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    		= isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$category   	= isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$see_all   		= isset( $instance['see_all'] ) ? esc_url_raw( $instance['see_all'] ) : '';
		$see_all_text  	= isset( $instance['see_all_text'] ) ? esc_html( $instance['see_all_text'] ) : '';
		$style  		= isset( $instance['style'] ) ? esc_attr( $instance['style'] ) : '';

	?>

	<p><?php _e('Este widget requiere que hayan sido añadidas varias publicaciones.', 'sydney'); ?></p>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Título', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Número de publicaciones a mostrar (-1 para mostrar todas):', 'sydney' ); ?></label>
	<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <p><label for="<?php echo $this->get_field_id('see_all'); ?>"><?php _e('URL del botón [en caso de que quieras añadir un botón debajo de la línea temporal]', 'sydney'); ?></label>
	<input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'see_all' ); ?>" name="<?php echo $this->get_field_name( 'see_all' ); ?>" type="text" value="<?php echo $see_all; ?>" size="3" /></p>
    <p><label for="<?php echo $this->get_field_id('see_all_text'); ?>"><?php _e('Texto del botón [por defecto será <em>Ver todas las publicaciones</em> si no se especifica]', 'sydney'); ?></label>
	<input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'see_all_text' ); ?>" name="<?php echo $this->get_field_name( 'see_all_text' ); ?>" type="text" value="<?php echo $see_all_text; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Slug de las publicaciones a mostrar [si no se especifica se mostrarán todas las publicaciones]', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo $category; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Estilo del widget:', 'sydney'); ?></label>
        <select name="<?php echo $this->get_field_name('style'); ?>" id="<?php echo $this->get_field_id('style'); ?>">
			<option value="style1" <?php if ( 'style1' == $style ) echo 'selected="selected"'; ?>><?php echo __('Estilo A', 'sydney'); ?></option>
			<option value="style2" <?php if ( 'style2' == $style ) echo 'selected="selected"'; ?>><?php echo __('Estilo B', 'sydney'); ?></option>
       	</select>
    </p>
	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['number'] 		= strip_tags($new_instance['number']);
		$instance['see_all'] 		= esc_url_raw( $new_instance['see_all'] );
		$instance['see_all_text'] 	= strip_tags($new_instance['see_all_text']);
		$instance['category'] 		= strip_tags($new_instance['category']);
  		$instance['style'] = sanitize_text_field($new_instance['style']);

		return $instance;
	}

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
		if ( ! $number )
			$number 	= -1;
		$category 		= isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		$style = isset( $instance['style'] ) ? esc_html($instance['style']) : 'style1';

		$timeline = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type' 		  => 'publicaciones',
			'order'				  => 'ASC',
			'posts_per_page'	  => $number,
			'category_name'		  => $category
		) );

		echo $args['before_widget'];

		if ($timeline->have_posts()) :
?>
			<?php if ( $title ) echo $before_title . $title . $after_title; ?>
			<div class="timeline-section <?php echo $style; ?>">
					<?php $counter = 0; ?>
					<?php while ( $timeline->have_posts() ) : $timeline->the_post(); $counter++; ?>
						<?php $date 	  = get_post_meta( get_the_ID(), 'wpcf-event-date', true ); ?>
						<?php $icon 	  = get_post_meta( get_the_ID(), 'wpcf-event-icon', true ); ?>
						<?php $icon_color = get_post_meta( get_the_ID(), 'wpcf-event-icon-color', true ); ?>
						<?php $link 	  = get_post_meta( get_the_ID(), 'wpcf-event-url', true ); ?>
						<?php if ( $counter % 2 != 0 ) : ?>
						<div class="timeline timeline-even clearfix">
							<div class="timeline-inner clearfix">
								<div class="content">
									<?php if ( $style == 'style1' ) : ?>
										<h3>
											<?php if ($link) : ?>
												<a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a>
											<?php else : ?>
												<?php the_title(); ?>
											<?php endif; ?>
										</h3>
										<?php if ($date) : ?>
											<span class="timeline-date"><?php echo $date; ?></span>
										<?php endif; ?>
									<?php else : ?>
										<?php if ($date) : ?>
											<span class="timeline-date"><?php echo $date; ?></span>
										<?php endif; ?>
										<h3>
											<?php if ($link) : ?>
												<a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a>
											<?php else : ?>
												<?php the_title(); ?>
											<?php endif; ?>
										</h3>
									<?php endif; ?>
									<?php the_content(); ?>
								</div><!--.info-->
								<?php if ($icon) : ?>
									<div class="icon" style="background-color: <?php echo esc_attr($icon_color); ?>;">
										<?php echo '<i class="fa ' . esc_html($icon) . '"></i>'; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php else : ?>
						<div class="timeline timeline-odd clearfix">
							<div class="timeline-inner clearfix">
								<?php if ($icon) : ?>
									<div class="icon" style="background-color: <?php echo esc_attr($icon_color); ?>;">
										<?php echo '<i class="fa ' . esc_html($icon) . '"></i>'; ?>
									</div>
								<?php endif; ?>
								<div class="content">
									<?php if ( $style == 'style1' ) : ?>
										<h3>
											<?php if ($link) : ?>
												<a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a>
											<?php else : ?>
												<?php the_title(); ?>
											<?php endif; ?>
										</h3>
										<?php if ($date) : ?>
											<span class="timeline-date"><?php echo $date; ?></span>
										<?php endif; ?>
									<?php else : ?>
										<?php if ($date) : ?>
											<span class="timeline-date"><?php echo $date; ?></span>
										<?php endif; ?>
										<h3>
											<?php if ($link) : ?>
												<a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a>
											<?php else : ?>
												<?php the_title(); ?>
											<?php endif; ?>
										</h3>
									<?php endif; ?>
									<?php the_content(); ?>
								</div><!--.info-->
							</div>
						</div>
					<?php endif; ?>
					<?php endwhile; ?>

				<?php if ($see_all != '') : ?>
					<a href="<?php echo esc_url($see_all); ?>" class="roll-button more-button">
						<?php if ($see_all_text) : ?>
							<?php echo $see_all_text; ?>
						<?php else : ?>
							<?php echo __('Ver todas las publicaciones', 'sydney'); ?>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			</div>
	<?php
		wp_reset_postdata();
		endif;
		echo $args['after_widget'];

	}

}
