<?php

/**
 *
 * @link              http://athemes.com
 * @since             1.0
 * @package           Sydney_Toolbox
 *
 * @wordpress-plugin
 * Plugin Name:       Sydney Toolbox
 * Plugin URI:        http://athemes.com/plugins/sydney-toolbox
 * Description:       Registers custom post types and custom fields for the Sydney theme
 * Version:           1.02
 * Author:            aThemes
 * Author URI:        http://athemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sydney-toolbox
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class Sydney_Toolbox {

	private static $instance;

	/**
	 * Actions setup
	 */
	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 3 );
		add_action( 'plugins_loaded', array( $this, 'includes' ), 4 );
		add_action( 'admin_notices', array( $this, 'admin_notice' ), 4 );
	}

	/**
	 * Constants
	 */
	function constants() {

		define( 'ST_DIR', get_stylesheet_directory() . '/' ); // CHANGED: prepared to import post types and metaboxes from child theme
		define( 'ST_URI', get_stylesheet_directory_uri() . '/' ); // CHANGED: to import post types and metaboxes from child theme
	}

	/**
	 * Includes
	 */
	function includes() {

		//Post types
		require_once( ST_DIR . 'inc/post-type-investigaciones.php' );
		require_once( ST_DIR . 'inc/post-type-miembros.php' );
		require_once( ST_DIR . 'inc/post-type-colaboraciones.php' );
		require_once( ST_DIR . 'inc/post-type-proyectos.php' );
		require_once( ST_DIR . 'inc/post-type-publicaciones.php' );
        require_once( ST_DIR . 'inc/post-type-tecnologias.php' );
        
		//Metaboxes
		require_once( ST_DIR . 'inc/metaboxes/investigaciones-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/miembros-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/colaboraciones-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/proyectos-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/publicaciones-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/singles-metabox.php' );
        require_once( ST_DIR . 'inc/metaboxes/tecnologias-metabox.php' );
	}

	/**
	 * Translations
	 */
	function i18n() {
		load_plugin_textdomain( 'sydney-toolbox', false, 'sydney-toolbox/languages' );
	}

	/**
	 * Admin notice
	 */
	function admin_notice() {
		$theme  = wp_get_theme();
		$parent = wp_get_theme()->parent();
		if ( ($theme != 'Sydney' ) && ($theme != 'Sydney Pro' ) && ($parent != 'Sydney') && ($parent != 'Sydney Pro') ) {
		    echo '<div class="error">';
		    echo 	'<p>' . __('Please note that the <strong>Sydney Toolbox</strong> plugin is meant to be used only with the <a href="http://wordpress.org/themes/sydney/" target="_blank">Sydney theme</a></p>', 'sydney-toolbox');
		    echo '</div>';
		}
	}

	/**
	 * Returns the instance.
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}
}

function sydney_toolbox_plugin() {
	if ( !function_exists('wpcf_init') ) //Make sure the Types plugin isn't active
		return Sydney_Toolbox::get_instance();
}
add_action('plugins_loaded', 'sydney_toolbox_plugin', 1);
