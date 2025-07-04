<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_equipo_miembros', // Clave única para este grupo de campos
        'title' => 'Miembros del Equipo', // Título que se mostrará en el editor de WordPress
        'fields' => array(
            array(
                'key' => 'field_equipo_miembros_repeater', // Clave única para el campo Repeater
                'label' => 'Miembros', // Etiqueta del campo Repeater
                'name' => 'miembros_equipo', // Nombre del campo (usado para obtener los valores)
                'type' => 'repeater', // Tipo de campo: Repeater
                'instructions' => 'Añade los miembros de este equipo.', // Instrucciones para el usuario
                'required' => 0, // No es obligatorio
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '', // Puedes poner el 'key' de un subcampo para que se muestre colapsado
                'min' => 0, // Número mínimo de filas
                'max' => 0, // Número máximo de filas (0 para ilimitado)
                'layout' => 'block', // 'table', 'block' o 'row'
                'button_label' => 'Añadir Miembro', // Texto del botón para añadir nuevas filas
                'sub_fields' => array(
                    array(
                        'key' => 'field_miembro_usuario', // Clave única para el subcampo de usuario
                        'label' => 'Usuario', // Etiqueta del subcampo
                        'name' => 'usuario', // Nombre del subcampo (usado para obtener el usuario)
                        'type' => 'user', // Tipo de campo: Usuario
                        'instructions' => 'Selecciona un usuario existente.',
                        'required' => 1, // Este subcampo es obligatorio
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'role' => '', // Puedes especificar roles de usuario (ej: 'editor', 'author')
                        'allow_null' => 0, // No permitir valor nulo
                        'multiple' => 0, // No permitir selección múltiple de usuarios en este subcampo
                    ),
                    array(
                         'key' => 'field_miembro_rol_en_equipo',
                         'label' => 'Rol en el Equipo',
                         'name' => 'rol_en_equipo',
                         'type' => 'text',
                         'instructions' => 'Introduce el rol de este miembro en el equipo.',
                         'required' => 0,
                         'wrapper' => array(
                             'width' => '',
                             'class' => '',
                             'id' => '',
                         ),
                    ),
                ),
            ),
        ),
        'location' => array( // Dónde se mostrará este grupo de campos
            array(
                array(
                    'param' => 'post_type', // El tipo de post
                    'operator' => '==',
                    'value' => 'equipos', // Tu Custom Post Type "Equipos"
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true, // Asegúrate de que esté activo
        'description' => 'Campos para gestionar los miembros de un equipo.',
    ));


    acf_add_local_field_group([
            'key' => 'group_respuesta_equipo',
            'title' => 'Respuesta de equipo',
            'fields' => [
                [
                    'key' => 'field_nombre',
                    'label' => 'Nombre del compromiso',
                    'name' => 'nombre',
                    'type' => 'textarea',
                ],
                [
                    'key' => 'field_descripcion',
                    'label' => 'Descripción del compromiso',
                    'name' => 'descripcion',
                    'type' => 'textarea',
                ],
                [
                    'key' => 'field_cuando',
                    'label' => '¿Cuándo?',
                    'name' => 'cuando',
                    'type' => 'textarea',
                ],
                [
                    'key' => 'field_quien',
                    'label' => '¿Quién o quiénes lo hacen?',
                    'name' => 'quien',
                    'type' => 'textarea',
                ],
                [
                    'key' => 'field_que',
                    'label' => '¿Qué debería cambiar o mejorar gracias a esta acción?',
                    'name' => 'que',
                    'type' => 'textarea',
                ],
                [
                    'key' => 'field_equipo',
                    'label' => 'Equipo',
                    'name' => 'equipo',
                    'type' => 'text',
                    'readonly' => 1,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'respuestas',
                    ],
                ],
            ],
            'position' => 'normal',
            'style' => 'default',
            'active' => true,
        ]);

    acf_add_local_field_group([
            'key' => 'group_respuesta_individual',
            'title' => 'Respuesta Individuales',
            'fields' => [
                [
                    'key' => 'field_imagen',
                    'label' => 'Imagen',
                    'name' => 'Imagen',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ]
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'respuestas',
                    ],
                ],
            ],
            'position' => 'normal',
            'style' => 'default',
            'active' => true,
        ]);

    acf_add_local_field_group(array(
        'key' => 'group_686542cb4e378',
        'title' => 'Configuración de video',
        'fields' => array(
            array(
                'key' => 'field_686542cd0cd78',
                'label' => 'Video',
                'name' => 'video',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_686542cd0c378',
                'label' => 'Video Hover',
                'name' => 'video_cut',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'videos',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_68654a30ce3bf',
        'title' => 'Configuración compromiso > videos',
        'fields' => array(
            array(
                'key' => 'field_68654a3149d12',
                'label' => 'Video',
                'name' => 'video',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'videos',
                ),
                'taxonomy' => '',
                'return_format' => 'id',
                'multiple' => 0,
                'allow_null' => 0,
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'compromisos',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

endif;
?>