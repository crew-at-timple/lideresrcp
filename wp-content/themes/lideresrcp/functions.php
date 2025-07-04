<?php
define('SCRIPTS_VERSION',time());


add_action('init', function () {
    if (isset($_GET['login-token'], $_GET['user'])) {
        $user_id = intval($_GET['user']);
        $user = get_user_by('ID', $user_id);
        $token = get_user_meta($user_id, 'one_time_token', true);
        $expiry = get_user_meta($user_id, 'one_time_token_expiry', true);

        if ($token && $_GET['login-token'] === $token && time() < $expiry) {
            wp_set_auth_cookie($user_id, false, false);
            //delete_user_meta($user_id, 'one_time_token');
            //delete_user_meta($user_id, 'one_time_token_expiry');
            wp_redirect(home_url('/'));
            exit;
        } else {
            wp_die('Token inválido o expirado.');
        }
    }
});

add_action('template_redirect', function () {
    if (!is_user_logged_in() && !is_page_template('page-login.php')) {
        wp_redirect(site_url('/login')); // assumes the login page uses slug /login
        exit;
    }
});

add_filter('show_admin_bar', function ($show) {
    return current_user_can('administrator');
});


add_action('admin_init', function () {
    if (!current_user_can('administrator') && !wp_doing_ajax()) {
        wp_redirect(home_url('/'));
        exit;
    }
});



/**
 * Imports CSS and JS files into the header and footer
 * @function and action
 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
function theme_scripts()
{
    // Define a version for your scripts and styles (assuming SCRIPTS_VERSION is defined elsewhere)
    // If not, you can define it here or use null for development to avoid caching issues
    if ( ! defined( 'SCRIPTS_VERSION' ) ) {
        define( 'SCRIPTS_VERSION', '1.0.0' ); // Or a dynamic version like time() for development
    }

    // ============================================================================
    // * CSS
    // * This files will be included with the wp_head wordpress function
    // ============================================================================

    // Bootstrap 5 CSS - ADD THIS LINE
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all' );

    // WP default
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), SCRIPTS_VERSION);
    wp_enqueue_style('theme-main-styles', get_template_directory_uri() . '/css/main.css', array(), SCRIPTS_VERSION);
    wp_enqueue_style('slick-styles', get_template_directory_uri() . '/assets/slick-1.8.1/slick.css', array(), SCRIPTS_VERSION);
    wp_enqueue_style('slick-theme-styles', get_template_directory_uri() . '/assets/slick-1.8.1/slick-theme.css', array(), SCRIPTS_VERSION);

    // ?
    wp_style_add_data('theme-style', 'rtl', 'replace');


    // ============================================================================
    // * JS
    // * This files will be included with the wp_footer wordpress function
    // ============================================================================

    // Bootstrap 5 JS Bundle (includes Popper.js) - ADD THIS LINE
    // It's crucial to load this before any of your scripts that might interact with Bootstrap components.
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true );
    wp_enqueue_script( 'bootstrap-masonry-js', 'https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js', array(), '1.0', true );

    wp_enqueue_script( 'slick-script', get_template_directory_uri() . "/assets/slick-1.8.1/slick.min.js", array('jquery'), SCRIPTS_VERSION, true );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . "/js/main.js", array('jquery'), SCRIPTS_VERSION, true );


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        //wp_enqueue_script( 'comment-reply' ); /* Solo si están habilitados los comentarios. No se si funciona. Evaluar. */
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');



require get_template_directory() . '/inc/theme-structure.php';
require get_template_directory() . '/inc/theme-acf.php';
require get_template_directory() . '/inc/theme-teams-functions.php';
require get_template_directory() . '/inc/theme-functions-tareas.php';


function get_user_initials($user_id = null)
{
    // If no user_id is provided, get the current logged-in user's ID
    if (! $user_id) {
        $user_id = get_current_user_id();
    }

    // Get user data based on the ID
    $user = get_userdata($user_id);

    // If user data can't be retrieved, return an empty string
    if (! $user) {
        return '';
    }

    // Get the user's email address
    $email = $user->user_email;

    // Initialize initials string
    $initials = '';

    // Check if the email is not empty
    if (! empty($email)) {
        // Extract the part of the email before the '@' symbol
        $email_prefix = explode('@', $email)[0];

        // Replace '.' and '-' with a space to make splitting easier
        $cleaned_prefix = str_replace(['.', '-'], ' ', $email_prefix);

        // Split the cleaned prefix into parts based on spaces
        $parts = explode(' ', $cleaned_prefix);

        // Loop through each part to get the first letter
        foreach ($parts as $part) {
            // Ensure the part is not empty before taking a character
            if ($part !== '') {
                $initials .= strtoupper(mb_substr($part, 0, 1));
            }
        }
    }

    // Return the generated initials
    return $initials;
}


/**
 * Embebe un archivo SVG directamente en el HTML.
 *
 * @param string $svg_name El nombre del archivo SVG (sin la extensión .svg).
 * @param string $class Opcional. Una clase CSS para el SVG.
 * @return string El contenido del SVG o una cadena vacía si no se encuentra.
 */
function get_svg_icon( $svg_name, $class = '' ) {
    // Ruta a la carpeta de imágenes de tu tema
    $svg_path = get_template_directory() . '/images/' . sanitize_file_name( $svg_name ) . '.svg';

    if ( file_exists( $svg_path ) ) {
        $svg_content = file_get_contents( $svg_path );

        // Añadir una clase si se proporciona para facilitar el control con CSS
        if ( ! empty( $class ) ) {
            // Usa DOMDocument para añadir la clase de forma segura
            $dom = new DOMDocument();
            // Suprimir errores por si el SVG no es XML válido, aunque debería serlo.
            libxml_use_internal_errors(true);
            $dom->loadXML( $svg_content );
            libxml_clear_errors();

            $svg_element = $dom->getElementsByTagName('svg')->item(0);
            if ( $svg_element ) {
                $current_class = $svg_element->getAttribute('class');
                if ( ! empty( $current_class ) ) {
                    $svg_element->setAttribute('class', $current_class . ' ' . esc_attr($class));
                } else {
                    $svg_element->setAttribute('class', esc_attr($class));
                }
                $svg_content = $dom->saveXML( $svg_element );
            }
        }
        return $svg_content;
    }
    return ''; // Retorna vacío si el archivo no existe
}


add_filter('show_admin_bar', function($show) {
    return current_user_can('administrator') ? $show : false;
});


add_action('admin_init', function() {
    if (!current_user_can('administrator') && !defined('DOING_AJAX')) {
        wp_redirect(home_url());
        exit;
    }
});