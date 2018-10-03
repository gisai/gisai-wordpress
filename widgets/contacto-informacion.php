<?php

class Custom_Contacto_Info extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'sydney_contact_info_widget', 'description' => __( 'Muestra la información de contacto.', 'sydney'), 'panels_groups' => array('GISAI'), 'panels_icon' => 'dashicons dashicons-phone' );
        parent::__construct(false, $name = __('Información de contacto', 'sydney'), $widget_ops);
		$this->alt_option_name = 'custom_contact_info';
    }

	function form($instance) {

		$title    = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$address  = isset( $instance['address'] ) ? esc_html( $instance['address'] ) : '';
		$phone    = isset( $instance['phone'] ) ? esc_html( $instance['phone'] ) : '';
		$email    = isset( $instance['email'] ) ? esc_html( $instance['email'] ) : '';
	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Título', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<p><label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Especifica una dirección', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo $address; ?>" size="3" /></p>

	<p><label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Especifica un número de teléfono', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo $phone; ?>" size="3" /></p>

	<p><label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Especifica una dirección de correo electrónico', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo $email; ?>" size="3" /></p>

	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['phone'] = strip_tags($new_instance['phone']);
		$instance['email'] = sanitize_email($new_instance['email']);

		return $instance;
	}


	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		extract($args);

		$title 		= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 		= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$address   	= isset( $instance['address'] ) ? esc_html( $instance['address'] ) : '';
		$phone   	= isset( $instance['phone'] ) ? esc_html( $instance['phone'] ) : '';
		$email   	= isset( $instance['email'] ) ? antispambot(esc_html( $instance['email'] )) : '';

		echo $before_widget;

		if ( $title ) echo $before_title . $title . $after_title;

		if( ($address) ) {
			echo '<div class="contact-address">';
			echo '<span><i class="fa fa-home"></i></span>' . $address;
			echo '</div>';
		}
		if( ($phone) ) {
			echo '<div class="contact-phone">';
			echo '<span><i class="fa fa-phone"></i></span>' . $phone;
			echo '</div>';
		}
		if( ($email) ) {
			echo '<div class="contact-email">';
			echo '<span><i class="fa fa-envelope"></i></span>' . '<a href="mailto:' . $email . '">' . $email . '</a>';
			echo '</div>';
		}

		echo $after_widget;

	}

}
