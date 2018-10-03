<?php
/**
 * Sydney child functions
 *
 */


/**
 * Enqueues the parent stylesheet. Do not remove this function.
 *
 */
add_action( 'wp_enqueue_scripts', 'sydney_pro_child_enqueue' );

function sydney_pro_child_enqueue() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function add_myjavascript(){
  wp_enqueue_script( 'ajax-implementation.js', get_bloginfo('template_directory') . '/scripts/ajax-implementation.js', array( 'jquery' ) );
  wp_enqueue_script( 'bibtex-implementation.js', get_template_directory_uri() . '/scripts/bibtex-implementation.js', array( 'jquery' ) );
  wp_enqueue_script( 'filter-implementation.js', get_bloginfo('template_directory') . '/scripts/filter-implementation.js', array( 'jquery' ) );
  wp_register_script( 'clipboardJS', 'https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js', null, null, true );
  wp_enqueue_script('clipboardJS');
}

add_action( 'init', 'add_myjavascript' );


/* ADD YOUR CUSTOM FUNCTIONS BELOW */

/* ALLOW DO SHORTCODES FOR CONTACT-FORM 7 */

function shortcodes_in_cf7( $form ) {
  $form = do_shortcode( $form );
  return $form;
}

add_filter( 'wpcf7_form_elements', 'shortcodes_in_cf7' );

/* GET IMPLODED META */
function implode_meta ($meta) {
  return implode("", $meta);
}

function custom_get_meta($post_id) {

  $meta = get_post_meta( $post_id, '', true );

	return array_map("implode_meta", $meta);
}

/* REMOVE PARENT FEATURES */

function remove_parent_theme_features(){
  remove_action('init', 'sydney_tables_module_cpt');
  remove_action('init', 'sydney_toolbox_register_testimonials', 0);
  remove_action('load-post.php', 'call_Sydney_PT_Metabox' );
  add_filter( 'theme_page_templates', 'remove_page_templates' );
}

function remove_page_templates( $templates ) {
    unset( $templates['page-templates/page_fullwidth.php'] );
    unset( $templates['page-templates/page_no-header-wide.php'] );
    unset( $templates['page-templates/page_single-header-wide.php'] );
    unset( $templates['page-templates/page_single-header.php'] );
    unset( $templates['page-templates/page_no-header.php'] );
    return $templates;
}

/* CHANGE EXCERPT DEFAULT */
function custom_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/* REQUIRE CUSTOM SYDNEY BASED WIDGETS */

// add GISAI tab to widgets menu
function add_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('GISAI widgets', 'GISAI'),
        'filter' => array(
            'groups' => array('GISAI')
        )
    );
    // TODO: Remove Sydney empty tab from sidebar
    return $tabs;
}

// import custom widget files
require get_stylesheet_directory() . "/widgets/lista.php";
require get_stylesheet_directory() . "/widgets/investigacion-A.php";
require get_stylesheet_directory() . "/widgets/investigacion-B.php";
require get_stylesheet_directory() . "/widgets/colaboraciones.php";
require get_stylesheet_directory() . "/widgets/accion.php";
require get_stylesheet_directory() . "/widgets/video.php";
require get_stylesheet_directory() . "/widgets/redes-sociales.php";
require get_stylesheet_directory() . "/widgets/miembros-A.php";
require get_stylesheet_directory() . "/widgets/miembros-B.php";
require get_stylesheet_directory() . "/widgets/ultimas-noticias-A.php";
require get_stylesheet_directory() . "/widgets/ultimas-noticias-B.php";
require get_stylesheet_directory() . "/widgets/publicaciones.php";
require get_stylesheet_directory() . "/widgets/contacto.php";
require get_stylesheet_directory() . "/widgets/proyectos.php";
require get_stylesheet_directory() . "/widgets/imagen.php";
require get_stylesheet_directory() . "/widgets/contacto-informacion.php";

// register custom widgets
function custom_widgets_init() {
    register_widget( 'Custom_Lista' );
		register_widget( 'Custom_Investigacion_A' );
		register_widget( 'Custom_Investigacion_B' );
		register_widget( 'Custom_Colaboraciones' );
		register_widget( 'Custom_Accion' );
		register_widget( 'Custom_Video' );
		register_widget( 'Custom_Redes_Sociales' );
		register_widget( 'Custom_Miembros_A' );
		register_widget( 'Custom_Miembros_B' );
		register_widget( 'Custom_Ultimas_Noticias_A' );
		register_widget( 'Custom_Ultimas_Noticias_B' );
		register_widget( 'Custom_Publicaciones' );
		register_widget( 'Custom_Contacto' );
		register_widget( 'Custom_Contacto_Info' );
		register_widget( 'Custom_Proyectos' );
		register_widget( 'Custom_Imagen' );
}


/* CUSTOM POST TYPES CONFIGURATION */

function configurar_entradas ($etiquetas, $nombre_singular, $nombre_plural, $nombre_singular_mayus, $nombre_plural_mayus, $genero){
  $etiquetas->name = $nombre_plural_mayus;
  $etiquetas->singular_name = $nombre_plural_mayus;
  $etiquetas->menu_name = $nombre_plural_mayus;
  $etiquetas->name_admin_bar = $nombre_plural_mayus;
  $etiquetas->all_items = 'Tod' . $genero . 's l' . $genero . 's ' . $nombre_plural;
  $etiquetas->add_new = 'Añadir ' . $nombre_singular;
  $etiquetas->add_new_item = 'Añadir ' .$nombre_singular;
  $etiquetas->edit_item = 'Editar ' . $nombre_singular;
  $etiquetas->update_item  = 'Actualizar ' . $nombre_singular;
  $etiquetas->new_item = 'Nuev' . $genero . ' ' . $nombre_singular;
  $etiquetas->view_item = 'Ver ' . $nombre_plural;
  $etiquetas->search_items = 'Buscar ' . $nombre_plural;
  $etiquetas->not_found = 'No se han encontrado ' . $nombre_plural;
  $etiquetas->not_found_in_trash = 'No se han encontrado ' . $nombre_plural . ' en la papelera';
  $etiquetas->featured_image = 'Imagen destacada';
  $etiquetas->set_featured_image = 'Establecer como imagen descatada';
  $etiquetas->remove_featured_image  = 'Eliminar imagen destacada';
  $etiquetas->use_featured_image = 'Usar como imagen destacada';
  return $etiquetas;
}

function cambiar_etiquetas_noticias() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels = configurar_entradas($labels, 'noticia', 'noticias', 'Noticia', 'Noticias', 'a');
    $menu_icon = &$wp_post_types['post']->menu_icon;
    $menu_icon = 'dashicons-analytics';
    $position = &$wp_post_types['post']->menu_position;
    $position = 27;
}


/* ADD ACTIONS AND FILTERS */
add_action( 'init', 'cambiar_etiquetas_noticias' );
add_action( 'widgets_init', 'custom_widgets_init' );
add_action( 'after_setup_theme', 'remove_parent_theme_features', 10 );
add_filter( 'siteorigin_panels_widget_dialog_tabs', 'add_widget_tabs', 20 );
