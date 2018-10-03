<?php

class Custom_Contacto extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'sydney_contact_widget', 'description' => __( 'Muestra información de contacto en la página principal.', 'sydney'), 'panels_groups' => array('GISAI'), 'panels_icon' => 'dashicons dashicons-phone' );
        parent::__construct(false, $name = __('Página Principal: Información de contacto', 'sydney'), $widget_ops);
		$this->alt_option_name = 'sydney_contact_widget';

    }

	function form($instance) {

		$title    		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$above_address  = isset( $instance['above_address'] ) ? esc_html( $instance['above_address'] ) : '';
		$address  		= isset( $instance['address'] ) ? esc_html( $instance['address'] ) : '';
		$above_phone    = isset( $instance['above_phone'] ) ? esc_html( $instance['above_phone'] ) : '';
		$phone    		= isset( $instance['phone'] ) ? esc_html( $instance['phone'] ) : '';
		$above_email    = isset( $instance['above_email'] ) ? esc_html( $instance['above_email'] ) : '';
		$email    		= isset( $instance['email'] ) ? esc_html( $instance['email'] ) : '';
		$above_hours    = isset( $instance['above_hours'] ) ? esc_html( $instance['above_hours'] ) : '';
		$hours    		= isset( $instance['hours'] ) ? esc_html( $instance['hours'] ) : '';
		$show_map 		= isset( $instance['show_map'] ) ? (bool) $instance['show_map'] : false;

	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Título', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<p><label for="<?php echo $this->get_field_id( 'above_address' ); ?>"><?php _e( 'Texto que aparecerá encima de la dirección', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'above_address' ); ?>" name="<?php echo $this->get_field_name( 'above_address' ); ?>" type="text" value="<?php echo $above_address; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Especifica una dirección', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo $address; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'above_phone' ); ?>"><?php _e( 'Texto que aparecerá encima del número de teléfono', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'above_phone' ); ?>" name="<?php echo $this->get_field_name( 'above_phone' ); ?>" type="text" value="<?php echo $above_phone; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Especifique un número de teléfono', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo $phone; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'above_email' ); ?>"><?php _e( 'Texto que aparecerá encima de la dirección de correo electrónico', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'above_email' ); ?>" name="<?php echo $this->get_field_name( 'above_email' ); ?>" type="text" value="<?php echo $above_email; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Especifique una dirección de correo electrónico', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo $email; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'above_hours' ); ?>"><?php _e( 'Texto que aparecerá encima de las horas de atención', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'above_hours' ); ?>" name="<?php echo $this->get_field_name( 'above_hours' ); ?>" type="text" value="<?php echo $above_hours; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'hours' ); ?>"><?php _e( 'Especifica las horas de atención', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'hours' ); ?>" name="<?php echo $this->get_field_name( 'hours' ); ?>" type="text" value="<?php echo $hours; ?>" size="3" /></p>
	<p><input class="checkbox" type="checkbox" <?php checked( $show_map ); ?> id="<?php echo $this->get_field_id( 'show_map' ); ?>" name="<?php echo $this->get_field_name( 'show_map' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_map' ); ?>"><?php _e( 'Mostrar mapa (la dirección será la especificada en el campo <em>dirección</em>)', 'sydney' ); ?></label></p>
	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['phone'] = strip_tags($new_instance['phone']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['above_address'] = strip_tags($new_instance['above_address']);
		$instance['above_phone'] = strip_tags($new_instance['above_phone']);
		$instance['above_email'] = strip_tags($new_instance['above_email']);
 		$instance['show_map'] 		= isset( $new_instance['show_map'] ) ? (bool) $new_instance['show_map'] : false;
		$instance['hours'] = strip_tags($new_instance['hours']);
		$instance['above_hours'] = strip_tags($new_instance['above_hours']);

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
		$email   	= isset( $instance['email'] ) ? esc_html( $instance['email'] ) : '';
		$above_address  = isset( $instance['above_address'] ) ? esc_html( $instance['above_address'] ) : '';
		$above_phone   	= isset( $instance['above_phone'] ) ? esc_html( $instance['above_phone'] ) : '';
		$above_email   	= isset( $instance['above_email'] ) ? esc_html( $instance['above_email'] ) : '';
		$hours   	= isset( $instance['hours'] ) ? esc_html( $instance['hours'] ) : '';
		$above_hours   	= isset( $instance['above_hours'] ) ? esc_html( $instance['above_hours'] ) : '';
		$show_map 		= isset( $instance['show_map'] ) ? $instance['show_map'] : false;

		echo $before_widget;

		if ( $title ) echo $before_title . $title . $after_title;

		echo '<div class="fp-contact-wrapper">';
		if( ($address) ) {
			echo '<div class="fp-contact">';
			echo '<span><i class="fa fa-home"></i></span>';
			if( ($above_address) ) {
			echo '<span class="contact-above">' . $above_address . '</span>';
			}
			echo '<span>' . $address . '</span>';
			echo '</div>';
		}
		if( ($phone) ) {
			echo '<div class="fp-contact">';
			echo '<span><i class="fa fa-phone"></i></span>';
			if( ($above_phone) ) {
			echo '<span class="contact-above">' . $above_phone . '</span>';
			}
			echo '<span>' . '<a href="tel:' . $phone . '">' . $phone . '</a>' . '</span>';
			echo '</div>';
		}
		if( ($email) ) {
			echo '<div class="fp-contact">';
			echo '<span><i class="fa fa-envelope"></i></span>';
			if( ($above_email) ) {
			echo '<span class="contact-above">' . $above_email . '</span>';
			}
			echo '<span>' . '<a href="mailto:' . antispambot($email) . '">' . antispambot($email) . '</a>' . '</span>';
			echo '</div>';
		}
		if( ($hours) ) {
			echo '<div class="fp-contact">';
			echo '<span><i class="fa fa-clock-o"></i></span>';
			if( ($above_hours) ) {
			echo '<span class="contact-above">' . $above_hours . '</span>';
			}
			echo '<span>' . $hours . '</span>';
			echo '</div>';
		}
		if ( $show_map ) {
    		echo '<div id="map-widget" style="width: 100%; height: 560px"></div>';
		}
		echo '</div>';

		if ( $show_map ) {
		?>
		<script type="text/javascript">
		    jQuery(function($) {
		        if ( $().gmap3 ) {
					$('#map-widget')
					.gmap3({
					  	address: '<?php echo esc_html($address); ?>',
					  	zoom: 14,
				        mapTypeId: "shadeOfGrey",
				        mapTypeControlOptions: {
				          mapTypeIds: [google.maps.MapTypeId.ROADMAP]
				        }
					})
				    .marker(function (map) {
				        return {
				          position: map.getCenter(),
				          icon: 'https://maps.google.com/mapfiles/marker.png'
				        };
				    })
			        .styledmaptype(
				        "shadeOfGrey",
				        [
				          {"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},
				          {"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},
				          {"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
				          {"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},
				          {"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},
				          {"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},
				          {"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},
				          {"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},
				          {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},
				          {"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},
				          {"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},
				          {"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},
				          {"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}
				        ],
				        {name: "Shades of Grey"}
				      );
		           }
		    });
		</script>
		<?php
		}
		echo $after_widget;

	}

}
