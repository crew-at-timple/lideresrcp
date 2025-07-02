<?php

add_action('init', function () {
    if (
        $_SERVER['REQUEST_METHOD'] === 'POST' &&
        isset($_POST['accion_formulario']) &&
        isset($_POST['formulario_respuesta_nonce']) &&
        wp_verify_nonce($_POST['formulario_respuesta_nonce'], 'guardar_formulario_respuesta') &&
        is_user_logged_in()
    ) {
        $current_user_id = get_current_user_id();

        $nombre      = sanitize_text_field($_POST['nombre'] ?? '');
        $descripcion = sanitize_textarea_field($_POST['descripcion'] ?? '');
        $cuando      = sanitize_textarea_field($_POST['cuando'] ?? '');
        $quien       = sanitize_textarea_field($_POST['quien'] ?? '');
        $que         = sanitize_textarea_field($_POST['que'] ?? '');
        $equipo_id   = get_team_id_by_user_id($current_user_id);

        $post_id = wp_insert_post([
            'post_type'   => 'respuestas',
            'post_status' => 'publish',
            'post_title'  => 'Respuesta de ' . wp_get_current_user()->display_name,
            'post_author' => $current_user_id,
        ]);

        if ($post_id && !is_wp_error($post_id)) {

            wp_set_object_terms($post_id, 'compromiso-grupal', 'compromisos', false);

            update_field('nombre', $nombre, $post_id);
            update_field('descripcion', $descripcion, $post_id);
            update_field('cuando', $cuando, $post_id);
            update_field('quien', $quien, $post_id);
            update_field('que', $que, $post_id);
            update_field('equipo', $equipo_id, $post_id);

            require_once ABSPATH . 'wp-admin/includes/image.php';
            require_once ABSPATH . 'wp-admin/includes/file.php';
            require_once ABSPATH . 'wp-admin/includes/media.php';

            if (!empty($_FILES['fotoMural']['name'])) {
                require_once ABSPATH . 'wp-admin/includes/file.php';
                $uploaded = media_handle_upload('fotoMural', $post_id);
                if (!is_wp_error($uploaded)) {
                    update_field('foto_mural', $uploaded, $post_id);
                }
            }

            wp_redirect(add_query_arg('exito', 1, get_permalink()));
            exit;
        }
    }
});



function tarea_existe_para_equipo_y_term($equipo_id, $term_slug) {

    
    $query = new WP_Query([
        'post_type'  => 'respuestas',
        'posts_per_page' => 1,
        'meta_query' => [
            [
                'key'     => 'equipo',
                'value'   => $equipo_id,
                'compare' => '='
            ]
        ],
        'tax_query' => [
            [
                'taxonomy' => 'compromisos',
                'field'    => 'slug',
                'terms'    => $term_slug,
            ]
        ],
        'fields' => 'ids',
    ]);

    return !empty($query->posts);
}