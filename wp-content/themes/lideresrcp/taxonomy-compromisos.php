<?php 
$term = get_queried_object();

// Si el término es "videos" o hijo de "videos"
if (
    $term->slug === 'videos' || 
    ($term->parent && get_term($term->parent, 'compromisos')->slug === 'videos')
) {
    // Forzar uso de taxonomy-compromisos-videos.php
    include get_template_directory() . '/taxonomy-compromisos-videos.php';
    return; // Muy importante para que no siga cargando este template
}

// Si no, seguir con el resto del template normal
get_header();
echo '<h1>Template general de compromisos</h1>';
// tu loop general acá...
get_footer();
