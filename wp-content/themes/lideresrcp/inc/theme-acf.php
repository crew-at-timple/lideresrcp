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

endif;
?>