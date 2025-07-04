<?php

// Evita el acceso directo al archivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_theme_support('post-thumbnails');


/**
 * Registra el tipo de post personalizado "Equipos"
 */
function registrar_post_type_equipos() {
    $labels = array(
        'name'                  => _x( 'Equipos', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Equipo', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Equipos', 'text_domain' ),
        'name_admin_bar'        => __( 'Equipo', 'text_domain' ),
        'archives'              => __( 'Archivo de Equipos', 'text_domain' ),
        'attributes'            => __( 'Atributos de Equipo', 'text_domain' ),
        'parent_item_colon'     => __( 'Equipo Padre:', 'text_domain' ),
        'all_items'             => __( 'Todos los Equipos', 'text_domain' ),
        'add_new_item'          => __( 'Añadir Nuevo Equipo', 'text_domain' ),
        'add_new'               => __( 'Añadir Nuevo', 'text_domain' ),
        'new_item'              => __( 'Nuevo Equipo', 'text_domain' ),
        'edit_item'             => __( 'Editar Equipo', 'text_domain' ),
        'update_item'           => __( 'Actualizar Equipo', 'text_domain' ),
        'view_item'             => __( 'Ver Equipo', 'text_domain' ),
        'view_items'            => __( 'Ver Equipos', 'text_domain' ),
        'search_items'          => __( 'Buscar Equipo', 'text_domain' ),
        'not_found'             => __( 'No encontrado', 'text_domain' ),
        'not_found_in_trash'    => __( 'No encontrado en la papelera', 'text_domain' ),
        'featured_image'        => __( 'Imagen Destacada', 'text_domain' ),
        'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
        'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
        'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
        'insert_into_item'      => __( 'Insertar en equipo', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Subido a este equipo', 'text_domain' ),
        'items_list'            => __( 'Lista de equipos', 'text_domain' ),
        'items_list_navigation' => __( 'Navegación de lista de equipos', 'text_domain' ),
        'filter_items_list'     => __( 'Filtrar lista de equipos', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Equipo', 'text_domain' ),
        'description'           => __( 'Contenido relacionado con los equipos', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => false, // NO es público
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false, // NO tiene archivo
        'exclude_from_search'   => true, // Excluir de la búsqueda
        'publicly_queryable'    => false, // NO es consultable públicamente
        'capability_type'       => 'post',
        'show_in_rest'          => false, // Deshabilitar REST API si no es necesario
    );
    register_post_type( 'equipos', $args );
}
add_action( 'init', 'registrar_post_type_equipos', 0 );


/**
 * Registra el tipo de post personalizado "Respuestas"
 */
function registrar_post_type_respuestas() {
    $labels = array(
        'name'                  => _x( 'Respuestas', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Respuesta', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Respuestas', 'text_domain' ),
        'name_admin_bar'        => __( 'Respuesta', 'text_domain' ),
        'archives'              => __( 'Archivo de Respuestas', 'text_domain' ),
        'attributes'            => __( 'Atributos de Respuesta', 'text_domain' ),
        'parent_item_colon'     => __( 'Respuesta Padre:', 'text_domain' ),
        'all_items'             => __( 'Todas las Respuestas', 'text_domain' ),
        'add_new_item'          => __( 'Añadir Nueva Respuesta', 'text_domain' ),
        'add_new'               => __( 'Añadir Nueva', 'text_domain' ),
        'new_item'              => __( 'Nueva Respuesta', 'text_domain' ),
        'edit_item'             => __( 'Editar Respuesta', 'text_domain' ),
        'update_item'           => __( 'Actualizar Respuesta', 'text_domain' ),
        'view_item'             => __( 'Ver Respuesta', 'text_domain' ),
        'view_items'            => __( 'Ver Respuestas', 'text_domain' ),
        'search_items'          => __( 'Buscar Respuesta', 'text_domain' ),
        'not_found'             => __( 'No encontrado', 'text_domain' ),
        'not_found_in_trash'    => __( 'No encontrado en la papelera', 'text_domain' ),
        'featured_image'        => __( 'Imagen Destacada', 'text_domain' ),
        'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
        'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
        'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
        'insert_into_item'      => __( 'Insertar en respuesta', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Subido a esta respuesta', 'text_domain' ),
        'items_list'            => __( 'Lista de respuestas', 'text_domain' ),
        'items_list_navigation' => __( 'Navegación de lista de respuestas', 'text_domain' ),
        'filter_items_list'     => __( 'Filtrar lista de respuestas', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Respuesta', 'text_domain' ),
        'description'           => __( 'Contenido relacionado con las respuestas', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true, // SÍ tiene archivo
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'respuestas' ), // Slug personalizado para el archivo
        'show_in_sitemap'       => false, // NO debe estar en el sitemap (requiere plugin de SEO como Yoast/Rank Math)
    );
    register_post_type( 'respuestas', $args );
}
add_action( 'init', 'registrar_post_type_respuestas', 0 );


/**
 * Registra el tipo de post personalizado "Videos"
 */
function registrar_post_type_videos()
{
    $labels = array(
        'name'                  => _x('Videos', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Video', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Videos', 'text_domain'),
        'name_admin_bar'        => __('Video', 'text_domain'),
        'archives'              => __('Archivo de Videos', 'text_domain'),
        'attributes'            => __('Atributos de Videos', 'text_domain'),
        'parent_item_colon'     => __('Video Padre:', 'text_domain'),
        'all_items'             => __('Todos los Videos', 'text_domain'),
        'add_new_item'          => __('Añadir Nuevo Video', 'text_domain'),
        'add_new'               => __('Añadir Nuevo', 'text_domain'),
        'new_item'              => __('Nuevo Video', 'text_domain'),
        'edit_item'             => __('Editar Video', 'text_domain'),
        'update_item'           => __('Actualizar Video', 'text_domain'),
        'view_item'             => __('Ver Video', 'text_domain'),
        'view_items'            => __('Ver Videos', 'text_domain'),
        'search_items'          => __('Buscar Respuesta', 'text_domain'),
        'not_found'             => __('No encontrado', 'text_domain'),
        'not_found_in_trash'    => __('No encontrado en la papelera', 'text_domain'),
        'featured_image'        => __('Imagen Destacada', 'text_domain'),
        'set_featured_image'    => __('Establecer imagen destacada', 'text_domain'),
        'remove_featured_image' => __('Eliminar imagen destacada', 'text_domain'),
        'use_featured_image'    => __('Usar como imagen destacada', 'text_domain'),
        'insert_into_item'      => __('Insertar en video', 'text_domain'),
        'uploaded_to_this_item' => __('Subido a este video', 'text_domain'),
        'items_list'            => __('Lista de videos', 'text_domain'),
        'items_list_navigation' => __('Navegación de lista de videos', 'text_domain'),
        'filter_items_list'     => __('Filtrar lista de videos', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Video', 'text_domain'),
        'description'           => __('Contenido relacionado con los videos', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'videos'), // Slug personalizado para el archivo
        'show_in_sitemap'       => false, // NO debe estar en el sitemap (requiere plugin de SEO como Yoast/Rank Math)
    );
    register_post_type('videos', $args);
}
add_action('init', 'registrar_post_type_videos', 0);



/**
 * Registra la taxonomía personalizada "Compromisos" para "Respuestas"
 */
function registrar_taxonomy_compromisos() {
    $labels = array(
        'name'                       => _x( 'Compromisos', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Compromiso', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Compromisos', 'text_domain' ),
        'all_items'                  => __( 'Todos los Compromisos', 'text_domain' ),
        'parent_item'                => __( 'Compromiso Padre', 'text_domain' ),
        'parent_item_colon'          => __( 'Compromiso Padre:', 'text_domain' ),
        'new_item_name'              => __( 'Nuevo Nombre de Compromiso', 'text_domain' ),
        'add_new_item'               => __( 'Añadir Nuevo Compromiso', 'text_domain' ),
        'edit_item'                  => __( 'Editar Compromiso', 'text_domain' ),
        'update_item'                => __( 'Actualizar Compromiso', 'text_domain' ),
        'view_item'                  => __( 'Ver Compromiso', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separar compromisos con comas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Añadir o eliminar compromisos', 'text_domain' ),
        'choose_from_most_used'      => __( 'Elegir de los compromisos más usados', 'text_domain' ),
        'popular_items'              => __( 'Compromisos Populares', 'text_domain' ),
        'search_items'               => __( 'Buscar Compromisos', 'text_domain' ),
        'not_found'                  => __( 'No encontrado', 'text_domain' ),
        'no_terms'                   => __( 'No hay compromisos', 'text_domain' ),
        'items_list'                 => __( 'Lista de compromisos', 'text_domain' ),
        'items_list_navigation'      => __( 'Navegación de lista de compromisos', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true, // SÍ es jerárquico
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'show_in_rest'               => true, // Habilitar REST API
        'rewrite'                    => array( 'slug' => 'compromiso' ),
    );
    register_taxonomy( 'compromisos', array( 'respuestas' ), $args );
}
add_action( 'init', 'registrar_taxonomy_compromisos', 0 );