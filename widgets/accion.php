<?php

class Custom_Accion extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'sydney_action_widget', 'description' => __( 'Muestra un texto y un botón configurables.', 'sydney'), 'panels_groups' => array('GISAI'), 'panels_icon' => 'dashicons dashicons-welcome-view-site' );
        parent::__construct(false, $name = __('Página principal: Texto y botón', 'sydney'), $widget_ops);
		$this->alt_option_name = 'custom_accion';
    }

	function form($instance) {
		$title     			= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$action_text 		= isset( $instance['action_text'] ) ? esc_textarea( $instance['action_text'] ) : '';
		$action_btn_link 	= isset( $instance['action_btn_link'] ) ? esc_url( $instance['action_btn_link'] ) : '';
		$action_btn_text 	= isset( $instance['action_btn_text'] ) ? esc_html( $instance['action_btn_text'] ) : '';
		$inline 			= isset( $instance['inline'] ) ? (bool) $instance['inline'] : false;
		$style  			= isset( $instance['style'] ) ? esc_attr( $instance['style'] ) : 'center';

	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Título', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('action_text'); ?>"><?php _e('Enter your call to action.', 'sydney'); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id('action_text'); ?>" name="<?php echo $this->get_field_name('action_text'); ?>"><?php echo $action_text; ?></textarea></p>
	<p><label for="<?php echo $this->get_field_id('action_btn_link'); ?>"><?php _e('URL del botón', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('action_btn_link'); ?>" name="<?php echo $this->get_field_name('action_btn_link'); ?>" type="text" value="<?php echo $action_btn_link; ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('action_btn_text'); ?>"><?php _e('Texto del botón', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('action_btn_text'); ?>" name="<?php echo $this->get_field_name('action_btn_text'); ?>" type="text" value="<?php echo $action_btn_text; ?>" /></p>
	<p><input class="checkbox" type="checkbox" <?php checked( $inline ); ?> id="<?php echo $this->get_field_id( 'inline' ); ?>" name="<?php echo $this->get_field_name( 'inline' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'inline' ); ?>"><?php _e( 'Mostrar el botón en línea con el texto', 'sydney' ); ?></label></p>
	<p><input class="checkbox" type="checkbox" <?php checked( $whitebtn ); ?> id="<?php echo $this->get_field_id( 'whitebtn' ); ?>" name="<?php echo $this->get_field_name( 'whitebtn' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'whitebtn' ); ?>"><?php _e( 'Botón blanco (útil para fondos oscuros)', 'sydney' ); ?></label></p>
	<p><label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Alinear botón:', 'sydney'); ?></label>
        <select name="<?php echo $this->get_field_name('style'); ?>" id="<?php echo $this->get_field_id('style'); ?>">
			<option value="left" <?php if ( 'left' == $style ) echo 'selected="selected"'; ?>><?php echo __('Izquierda', 'sydney'); ?></option>
			<option value="center" <?php if ( 'center' == $style ) echo 'selected="selected"'; ?>><?php echo __('Centro', 'sydney'); ?></option>
			<option value="right" <?php if ( 'right' == $style ) echo 'selected="selected"'; ?>><?php echo __('Derecha', 'sydney'); ?></option>
       	</select>
    </p>

	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			 = strip_tags($new_instance['title']);
		$instance['action_btn_link'] = esc_url_raw($new_instance['action_btn_link']);
		$instance['action_btn_text'] = strip_tags($new_instance['action_btn_text']);
		$instance['inline'] 		 = isset( $new_instance['inline'] ) ? (bool) $new_instance['inline'] : false;
		$instance['whitebtn'] 		 = isset( $new_instance['whitebtn'] ) ? (bool) $new_instance['whitebtn'] : false;
	    $instance['style'] 			= sanitize_text_field($new_instance['style']);

		if ( current_user_can('unfiltered_html') ) {
			$instance['action_text'] = $new_instance['action_text'];
		} else {
			$instance['action_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['action_text']) ) );
		}

		return $instance;
	}

	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		extract($args);

		$title 			 = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			 = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$action_text 	 = isset( $instance['action_text'] ) ? $instance['action_text'] : '';
		$action_btn_link = isset( $instance['action_btn_link'] ) ? esc_url($instance['action_btn_link']) : '';
		$action_btn_text = isset( $instance['action_btn_text'] ) ? esc_html($instance['action_btn_text']) : '';
		$inline 		 = isset( $instance['inline'] ) ? $instance['inline'] : false;
		$whitebtn 		 = isset( $instance['whitebtn'] ) ? $instance['whitebtn'] : false;
		$style 			 = isset( $instance['style'] ) ? esc_html($instance['style']) : 'center';

		if ($inline == 1) {
			$aside_style = 'aside-style';
		} else {
			$aside_style = '';
		}

		if ($whitebtn == 1) {
			$whitebtn = 'whitebtn';
		} else {
			$whitebtn = '';
		}

		echo $args['before_widget'];

		if ( $title ) echo $before_title . $title . $after_title;
?>
        <div class="roll-promobox <?php echo $aside_style; ?>">
			<div class="promo-wrap">
				<?php if ($action_text !='') : ?>
				<div class="promo-content">
					<h3 class="title"><?php echo $action_text; ?></h3>
				</div>
				<?php endif; ?>
				<div class="promo-controls" style="text-align:<?php echo $style; ?>;">
					<a href="<?php echo esc_url($action_btn_link); ?>" class="roll-button <?php echo $whitebtn; ?>"><?php echo esc_html($action_btn_text); ?></a>
				</div>
			</div>
        </div>
	<?php

		echo $args['after_widget'];

	}

}
