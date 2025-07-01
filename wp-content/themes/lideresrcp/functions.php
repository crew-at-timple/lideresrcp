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

    /**
     * Functions explanation:
     * 
     * JS:
     * wp_enqueue_script( {name-of-script}, {source}, {version}, {dependencies}, {in_footer} );
     * 
     *    name-of-script (string) -> used internally by wordpress and added to the html tag as id prop
     *    source (string) -> may be remote or local
     *    version (string) -> version number, appendend internally as query param to the source url; useful to force new version download
     *    dependencies (array) -> list of name-of-scripts that this file depends on; determines the load order
     *    in_footer (bool) -> whether the include has to be placed in the footer or in the header
     * 
     *    Example:
     *    wp_enqueue_script( 'moment-script', get_template_directory_uri() . "/path/to/file.js", array('jquery'), SCRIPTS_VERSION, true );
     * 
     * CSS:
     * wp_enqueue_style( {name-of-stylesheet}, {source}, {dependencies}, {version}, {media-target} );
     * 
     *    name-of-stylesheet (string) -> used internally by wordpress and added to the html tag as id prop
     *    source (string) -> may be remote or local
     *    dependencies (array) -> list of name-of-stylesheet that this file depends on; determines the load order
     *    version (string) -> version number, appendend internally as query param to the source url; useful to force new version download
     *    media-target -> The media for which this stylesheet has been defined. Accepts media types like 'all', 'print' and 'screen', or 
     *                    media queries like '(orientation: portrait)' and '(max-width: 640px)'; defaults to 'all'
     * 
     *    Example:
     *    wp_enqueue_style( 'theme-main-styles', get_template_directory_uri() . "/path/to/file.css", array(), SCRIPTS_VERSION, 'all' );
     */

    // ============================================================================
    // * CSS
    // * This files will be included with the wp_head wordpress function
    // ============================================================================

    // WP default
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), SCRIPTS_VERSION);
    wp_enqueue_style('theme-main-styles', get_template_directory_uri() . '/css/main.css', array(), SCRIPTS_VERSION);

    // ?
    wp_style_add_data('theme-style', 'rtl', 'replace');


    // ============================================================================
    // * JS
    // * This files will be included with the wp_footer wordpress function
    // ============================================================================




    if (is_singular() && comments_open() && get_option('thread_comments')) {
        //wp_enqueue_script( 'comment-reply' ); /* Solo si están habilitados los comentarios. No se si funciona. Evaluar. */
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');