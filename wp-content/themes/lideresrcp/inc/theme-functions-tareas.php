<?php

add_action('init', function () {
    if (
        $_SERVER['REQUEST_METHOD'] === 'POST' &&
        isset($_POST['accion_formulario_grupal']) &&
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
            'post_title'  => 'Respuesta de ' . $equipo_id . "("  . wp_get_current_user()->display_name . ")",
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
                    update_field('imagen', $uploaded, $post_id);
                }
            }

            wp_redirect(add_query_arg('exito', 1, get_permalink()));
            exit;
        }
    }
});




add_action('init', function () {
    if (
        $_SERVER['REQUEST_METHOD'] === 'POST' &&
        isset($_POST['accion_formulario_algunavez']) &&
        isset($_POST['formulario_respuesta_nonce']) &&
        wp_verify_nonce($_POST['formulario_respuesta_nonce'], 'guardar_formulario_respuesta') &&
        is_user_logged_in()
    ) {
        $current_user_id = get_current_user_id();

        $descripcion = sanitize_textarea_field($_POST['anecdota'] ?? '');
        $subvideo = sanitize_textarea_field($_POST['subvideo'] ?? '');
        
        $post_id = wp_insert_post([
            'post_type'   => 'respuestas',
            'post_status' => 'publish',
            'post_title'  => 'Alguna Vez te pasó de ' . wp_get_current_user()->display_name,
            'post_content'  => $descripcion,
            'post_author' => $current_user_id,
        ]);

        if ($post_id && !is_wp_error($post_id)) {

            wp_set_object_terms($post_id,  ['videos', $subvideo], 'compromisos', false);

            require_once ABSPATH . 'wp-admin/includes/image.php';
            require_once ABSPATH . 'wp-admin/includes/file.php';
            require_once ABSPATH . 'wp-admin/includes/media.php';

            if (!empty($_FILES['imagen']['name'])) {
                require_once ABSPATH . 'wp-admin/includes/file.php';
                $uploaded = media_handle_upload('imagen', $post_id);
                if (!is_wp_error($uploaded)) {
                    update_field('imagen', $uploaded, $post_id);
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




function tarea_existe_para_usuario_y_term($user_id, $term_slug) {
    $query = new WP_Query([
        'post_type'      => 'respuestas',
        'posts_per_page' => 1,
        'author'         => $user_id,
        'tax_query'      => [
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




function obtener_autores_y_cantidad_por_term($term_slug) {
    $query = new WP_Query([
        'post_type'      => 'respuestas',
        'posts_per_page' => -1,
        'tax_query'      => [
            [
                'taxonomy' => 'compromisos',
                'field'    => 'slug',
                'terms'    => $term_slug,
            ]
        ],
        'fields' => 'ids',
    ]);

    $post_ids = $query->posts;
    $autores = [];

    foreach ($post_ids as $post_id) {
        $autor_id = get_post_field('post_author', $post_id);
        if ($autor_id) {
            $autores[] = (int) $autor_id;
        }
    }

    $autores_unicos = array_unique($autores);

    return [
        'cantidad' => count($post_ids),
        'autores'  => array_values($autores_unicos),
    ];
}




function obtener_inicio_aleatorio_anecdota() {
    $inicios = [
        'Eran las 17:52…',
        'Un cliente llamó diciendo que su impresora...',
        'Todo iba bien hasta que ...”',
        'La sala de reuniones estaba llena...',
        'Era un lunes tranquilo cuando...',
        'Un mail con el asunto “URGENTE”...',
        'El cliente juraba que su contraseña era...',
        'Nos miramos todos cuando dijo...',
        'El sistema colapsó justo cuando...',
        'Era viernes a las 18:59...',
        'El chat explotó con emojis...',
        'Cuando abrí el ticket...',
    ];

    return $inicios[array_rand($inicios)];
}