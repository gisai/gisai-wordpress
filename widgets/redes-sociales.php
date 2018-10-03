<?php
 class Custom_Redes_Sociales extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => __('Muestra las redes sociales en la página principal.', 'sydney'), 'panels_groups' => array('GISAI'), 'panels_icon' => 'dashicons dashicons-share' );
		parent::__construct( 'custom_social', __('Página Principal: Redes sociales', 'sydney'), $widget_ops );
	}

	function widget($args, $instance) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
		$style = isset( $instance['style'] ) ? esc_html($instance['style']) : 'style1';

		if ( !$nav_menu )
			return;

		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		?>
		<?php
		if ( !empty($instance['title']) )
			echo $args['before_title'] . '<span class="wow bounce">' . $instance['title'] . '</span>' . $args['after_title'];
		?>
			<div class="social-section social-links <?php echo $style; ?>">
				<?php wp_nav_menu(
					array(
						'fallback_cb' => false,
						'menu' => $nav_menu,
						'link_before' => '<span class="screen-reader-text">',
						'link_after' => '</span>',
						'menu_class' => 'menu social-menu-widget clearfix'
						)
				); ?>
			</div>
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['nav_menu'] = (int) $new_instance['nav_menu'];
	    $instance['style'] 			= sanitize_text_field($new_instance['style']);

		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
		$style  		= isset( $instance['style'] ) ? esc_attr( $instance['style'] ) : '';

		// Get menus
		$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );

		// If no menus exists, direct the user to go and create some.
		if ( !$menus ) {
			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.', 'sydney'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'sydney') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p><label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Pick the style for this widget:', 'sydney'); ?></label>
	        <select name="<?php echo $this->get_field_name('style'); ?>" id="<?php echo $this->get_field_id('style'); ?>">
				<option value="style1" <?php if ( 'style1' == $style ) echo 'selected="selected"'; ?>><?php echo __('Style 1', 'sydney'); ?></option>
				<option value="style2" <?php if ( 'style2' == $style ) echo 'selected="selected"'; ?>><?php echo __('Style 2', 'sydney'); ?></option>
	       	</select>
	    </p>
		<p><em><?php _e('In order to display your social icons in a widget, all you need to do is go to <strong>Appearance > Menus</strong> and create a menu containing links to your social profiles, then assign that menu here. Supported networks: Facebook, Twitter, Google Plus, Instagram, Dribble, Vimeo, Linkedin, Youtube, Flickr, Pinterest, Tumblr, Foursquare, Behance.', 'sydney'); ?></em></p>
		<p>
			<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select your social menu:', 'sydney'); ?></label>
			<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;', 'sydney' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_menu, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>
		</p>
		<?php
	}
}
