<?php

function get_team_id_by_user_id($user_id) {
    if (empty($user_id)) {
        return false;
    }

    global $wpdb; // Accede al objeto global de la base de datos de WordPress

    // La clave meta_key para un campo repeater en ACF se almacena como 'field_nombrecampo' + un contador de fila + 'nombre_subcampo'
    // Sin embargo, el campo 'miembros_equipo' en sí almacena un conteo del número de filas.
    // Los datos reales de cada fila se almacenan como 'miembros_equipo_0_usuario', 'miembros_equipo_1_usuario', etc.

    // Buscamos directamente en los meta_values donde se almacena el ID del usuario dentro del repeater.
    // El formato del valor de un campo de usuario en ACF es simplemente el ID del usuario.
    // El campo se almacena con la meta_key: 'miembros_equipo_N_usuario' donde N es el índice de la fila.

    $query = $wpdb->prepare(
        "SELECT pm.post_id FROM {$wpdb->postmeta} AS pm
         INNER JOIN {$wpdb->posts} AS p ON pm.post_id = p.ID
         WHERE p.post_type = 'equipos'
         AND p.post_status = 'publish'
         AND pm.meta_key LIKE %s
         AND pm.meta_value = %s
         LIMIT 1", // Solo necesitamos el primer equipo encontrado
        'miembros_equipo_%_usuario', // Busca meta_keys como 'miembros_equipo_0_usuario', 'miembros_equipo_1_usuario', etc.
        strval($user_id) // El meta_value es directamente el ID del usuario (como string)
    );

    // Ejecutar la consulta y obtener el post_id
    $team_post_id = $wpdb->get_var($query);

    // get_var devuelve null si no se encuentra nada
    if ($team_post_id) {
        return (int) $team_post_id;
    }

    return false; // El usuario no fue encontrado en ningún equipo
}


/**
 * Obtiene la información completa de un equipo (título, miembros y sus roles)
 * dado el ID del post del equipo.
 *
 * @param int $team_post_id El ID del post del Custom Post Type 'equipos'.
 * @return array|false Un array con los detalles del equipo y sus miembros, o false si no se encuentra.
 */
function get_team_details_by_id($team_post_id) {
    if (empty($team_post_id)) {
        return false;
    }

    $team_post = get_post($team_post_id);

    if (!$team_post || $team_post->post_type !== 'equipos' || $team_post->post_status !== 'publish') {
        return false; // El post no existe, no es un equipo, o no está publicado
    }

    $team_name = get_the_title($team_post_id);
    $all_members = [];

    // Obtener el campo repetidor 'miembros_equipo' como un array directamente
    $miembros_equipo = get_field('miembros_equipo', $team_post_id);

    if (is_array($miembros_equipo) && !empty($miembros_equipo)) {
        foreach ($miembros_equipo as $row) {

            $member_user_object = isset($row['usuario']) ? $row['usuario'] : null;
            $member_role = isset($row['rol_en_equipo']) ? $row['rol_en_equipo'] : '';

            if ($member_user_object && !is_wp_error($member_user_object)) {
                $member_details = [
                    'ID'           => $member_user_object["ID"],
                    'user_email'   => $member_user_object["user_email"],
                ];

                if ($member_role) {
                    $member_details['rol_en_equipo'] = $member_role;
                }

                $all_members[] = $member_details;
            }
        }
    }

    return [
        'equipo_id'   => $team_post_id,
        'equipo_name' => $team_name,
        'miembros'    => $all_members,
    ];
}


/**
 * Agrega una columna 'Equipo' a la tabla de usuarios en el admin.
 *
 * @param array $columns Las columnas existentes.
 * @return array Las columnas con la nueva columna 'Equipo' añadida.
 */
function add_team_column_to_users_table($columns) {
    // Añade la columna 'user_team' antes de la columna 'posts' si existe, o al final.
    if (isset($columns['posts'])) {
        $new_columns = array();
        foreach ($columns as $key => $value) {
            $new_columns[$key] = $value;
            if ($key === 'posts') { // Puedes ajustar esto para colocarla donde prefieras
                $new_columns['user_team'] = 'Equipo';
            }
        }
        return $new_columns;
    }

    $columns['user_team'] = 'Equipo';
    return $columns;
}
add_filter('manage_users_columns', 'add_team_column_to_users_table');


/**
 * Rellena el contenido de la columna 'Equipo' para cada usuario.
 * Ahora usa la función optimizada get_team_id_by_user_id().
 *
 * @param string $output El contenido actual de la columna (normalmente vacío).
 * @param string $column_name El nombre de la columna actual.
 * @param int $user_id El ID del usuario actual.
 * @return string El contenido de la columna para este usuario.
 */
function display_team_in_users_table_column($output, $column_name, $user_id) {
    if ('user_team' === $column_name) {
        // Llama a la nueva función optimizada para encontrar solo el ID del equipo
        $team_id = get_team_id_by_user_id($user_id);

        if ($team_id) {
            // Obtenemos el título del post del equipo para mostrarlo
            $team_title = get_the_title($team_id);
            $edit_team_link = get_edit_post_link($team_id);

            if ($team_title) {
                // Enlaza el nombre del equipo a la página de edición del equipo
                $output = '<a href="' . esc_url($edit_team_link) . '">' . esc_html($team_title) . '</a>';
            } else {
                $output = 'N/A'; // En caso de que el post del equipo no tenga título
            }
        } else {
            $output = 'Sin equipo'; // Si el usuario no pertenece a ningún equipo
        }
    }
    return $output;
}
add_filter('manage_users_custom_column', 'display_team_in_users_table_column', 10, 3);



function set_current_user_team_global_direct() {
    if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        $GLOBALS['current_user_team_id'] = get_team_id_by_user_id($user_id);
    } else {
        $GLOBALS['current_user_team_id'] = false; // O null, o 0
    }
}
add_action('init', 'set_current_user_team_global_direct');



?>