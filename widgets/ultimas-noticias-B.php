<?php

class Custom_Ultimas_Noticias_B extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'sydney_latest_news_widget', 'description' => __( 'Muestra las últimas noticias del grupo.', 'sydney'), 'panels_groups' => array('GISAI'), 'panels_icon' => 'dashicons dashicons-analytics' );
        parent::__construct(false, $name = __('Página Principal: Últimas noticias (modelo B)', 'sydney'), $widget_ops);
		$this->alt_option_name = 'ultimas_noticias_a';

    }

	function form($instance) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$category  		= isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$number    		= isset( $instance['number'] ) ? intval( $instance['number'] ) : 4;
		$see_all_text  	= isset( $instance['see_all_text'] ) ? esc_html( $instance['see_all_text'] ) : '';
		$style  		= isset( $instance['style'] ) ? esc_attr( $instance['style'] ) : '';

	?>

	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'sydney'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'sydney' ); ?></label>
	<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Enter the slug for your category or leave empty to show posts from all categories.', 'sydney' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo $category; ?>" size="3" /></p>
    <p><label for="<?php echo $this->get_field_id('see_all_text'); ?>"><?php _e('Add the text for the button here if you want to change the default <em>See all our news</em>', 'sydney'); ?></label>
	<input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'see_all_text' ); ?>" name="<?php echo $this->get_field_name( 'see_all_text' ); ?>" type="text" value="<?php echo $see_all_text; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Pick the style for this widget:', 'sydney'); ?></label>
        <select name="<?php echo $this->get_field_name('style'); ?>" id="<?php echo $this->get_field_id('style'); ?>">
			<option value="style1" <?php if ( 'style1' == $style ) echo 'selected="selected"'; ?>><?php echo __('Style 1', 'sydney'); ?></option>
			<option value="style2" <?php if ( 'style2' == $style ) echo 'selected="selected"'; ?>><?php echo __('Style 2', 'sydney'); ?></option>
       	</select>
    </p>
	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['number'] 		= strip_tags($new_instance['number']);
		$instance['category'] 		= strip_tags($new_instance['category']);
		$instance['see_all_text'] 	= strip_tags($new_instance['see_all_text']);
	    $instance['style'] 			= sanitize_text_field($new_instance['style']);
		return $instance;
	}

	// display widget
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number 		= ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : 4;
		if ( ! $number )
			$number 	= 4;
		$category = isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		$see_all_text = isset( $instance['see_all_text'] ) ? esc_html($instance['see_all_text']) : __( 'See all our news', 'sydney' );
		if ($see_all_text == '') {
			$see_all_text = __( 'See all our news', 'sydney' );
		}
		$style = isset( $instance['style'] ) ? esc_html($instance['style']) : 'style1';

		$r = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'category_name'		  => $category,
			'posts_per_page'	  => $number
		) );

		echo $args['before_widget'];

		if ($r->have_posts()) :
?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>

		<div class="latest-news-wrapper carousel owl-carousel row <?php echo $style; ?>">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<div class="blog-post">
			<?php if ( has_post_thumbnail() && $style == 'style1' ) : ?>
				<div class="entry-thumb">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('medium-thumb'); ?>
					</a>
				</div>
			<?php else : ?>
				<?php global $post; ?>
				<?php $image_id = get_post_thumbnail_id( $post->ID ); ?>
				<?php $image_src = wp_get_attachment_image_src( $image_id, 'medium-thumb' ); ?>
				<div class="post-background" style="background-image: url( <?php echo esc_url($image_src[0]); ?> )"></div>
			<?php endif; ?>
			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
				<div class="entry-summary">
				<?php
					if ( $style == 'style1' ) {
						the_excerpt();
					} else {
						echo '<div class="meta-post">';
							sydney_post_date();
							sydney_get_first_cat();
						echo '</div>';
						echo esc_html( wp_trim_words( get_the_content(), 12 ) );
					}
				?></div>
			</div>
		<?php endwhile; ?>
		</div>

		<?php $cat = get_term_by('slug', $category, 'category') ?>
		<?php if ($category) : //Link to the category page instead of blog page if a category is selected ?>
			<a href="<?php echo esc_url(get_category_link(get_cat_ID($cat -> name))); ?>" class="roll-button more-button"><?php echo $see_all_text; ?></a>
		<?php elseif ( get_option( 'page_for_posts' ) ) : ?>
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="roll-button more-button"><?php echo $see_all_text; ?></a>
		<?php endif; ?>
	<?php
		echo $args['after_widget'];
		wp_reset_postdata();

		endif;

	}

}
