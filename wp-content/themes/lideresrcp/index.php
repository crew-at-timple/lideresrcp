<?php
get_header();

if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
    $logo_url = get_template_directory_uri() . '/RadicalClientPerspective.png';
    $nombre = esc_html($current_user->display_name);
    $email = esc_html($current_user->user_email);

    echo <<<HTML
    <div style="display: flex; justify-content: center; padding: 40px; font-family: Arial, sans-serif; background-color: #f7f7f7;">
      <div style="background: white; padding: 40px; max-width: 600px; text-align: center; border-radius: 8px;">
        <img src="{$logo_url}" alt="Logo" style="max-width: 200px; margin-bottom: 30px;">
        <h2 style="color: #333;">Hola, {$nombre}!</h2>
        <p style="color: #555; font-size: 16px;">Estás logueado con el email:</p>
        <p style="color: #000; font-size: 18px; font-weight: bold;">{$email}</p>
      </div>
    </div>
HTML;
} else {
    echo '<p>No estás logueado.</p>';
}

get_footer();