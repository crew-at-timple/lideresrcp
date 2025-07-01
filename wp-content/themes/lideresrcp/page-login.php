<?php
/*
Template Name: Custom Login Page
*/
get_header();

$logo_url = get_template_directory_uri() . '/RadicalClientPerspective.png';
$mensaje = '';
$show_confirmation = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && is_email($_POST['email'])) {
  $user = get_user_by('email', $_POST['email']);
  if ($user) {
    $token = wp_generate_password(20, false);
    update_user_meta($user->ID, 'one_time_token', $token);
    update_user_meta($user->ID, 'one_time_token_expiry', time() + 900); // 15 min

    $login_url = add_query_arg([
      'login-token' => $token,
      'user' => $user->ID
    ], site_url('/'));

    $subject = '🔑 Acceso a la plataforma Líderes RCP';

    $message = <<<HTML
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 40px;">
  <tr>
    <td align="center">
      <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden;">
        <tr>
          <td style="padding: 40px 20px 20px 20px;" align="center">
            <img src="{$logo_url}" alt="Logo" style="max-width: 200px;">
          </td>
        </tr>
        <tr>
          <td style="padding: 20px 40px; text-align: center;">
            <h2 style="color: #333;">Tu enlace de acceso</h2>
            <p style="color: #555; font-size: 16px;">
              Hacé clic en el botón para ingresar a tu cuenta. Este enlace es válido por 15 minutos.
            </p>
            <a href="{$login_url}" style="display: inline-block; background-color: #1a73e8; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 4px; font-weight: bold; margin-top: 20px;">
              Ingresar al sitio
            </a>
            <p style="margin-top: 30px; color: #777; font-size: 14px;">
              Si el botón no funciona, copiá y pegá este enlace en tu navegador:
            </p>
            <p style="word-break: break-all; color: #1a73e8; font-size: 13px;">
              {$login_url}
            </p>
          </td>
        </tr>
        <tr>
          <td style="padding: 30px 20px; text-align: center; color: #999; font-size: 12px;">
            Si no solicitaste este acceso, podés ignorar este mensaje.
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
HTML;

    $headers = ['Content-Type: text/html; charset=UTF-8'];

    wp_mail($user->user_email, $subject, $message, $headers);
    // $mensaje = '<p style="color: green;">Revisá tu email. Te enviamos un enlace de acceso.</p>';
    $show_confirmation = true;
  } else {
    $mensaje = '<p style="color: red;">Email no encontrado.</p>';
  }
}
?>

<div class="login-container">
  <div class="login-container--header">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="BBVA logo">
  </div>
  <div class="login-container--inner">


    <?php if (!$show_confirmation) { ?>

      <div class="login-container--header">
        <h1 class="login-container--header_logo logo tiempos">Radical Client Perspective</h1>
        <div class="login-container--header_icon">
          <img src="<?php echo get_template_directory_uri(); ?>/images/ico-profile-login.png">
        </div>
      </div>

      <div class="login-container--label fw-300">
        <div class="fw-500">¿Listo para comenzar tu compromiso RCP?</div>
        Ingresa tu e-mail bbva.com y recibirás un link de acceso.
      </div>

      <div class="login-container--message">
        <?php echo $mensaje; ?>
      </div>

      <form method="post">

        <div class="form-floating mb-3">
          <input type="email" name="email" required class="form-control" id="email" autocomplete="off" placeholder=" ">
          <label for="email">Ingresá tu e-mail</label>
        </div>

        <button type="submit" class="btn btn-white w-100">Recibir link de acceso</button>
      </form>

    <?php } else { ?>
      <div class="login-container--confirmation text-center">
        <div class="login-container--confirmation_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/ico-send.png" alt=""></div>

        <div class="login-container--label fw-300">
          <div class="fw-500">El link de acceso fue enviado a tu e-mail</div>
          Podrás utilizarlo para ingresar durante 15 minutos.
        </div>
        <a href="" class="btn btn-link d-block mt-3 c-white">Abrir correo</a>
      </div>
    <?php } ?>

    <a href="" class="btn btn-link d-block mt-3 c-blue-lt">¿Necesitás ayuda?</a>
  </div>

  <div class="login-container--footer">

    <div class="footer-copy">
      LideresRCP.com es una iniciativa del equipo de Cultura y Transformación de BBVA Argentina
    </div>

  </div>
</div>

<?php get_footer(); ?>