<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
    $email = esc_html($current_user->user_email);
    ?>

    <div class="navbar">
      <div class="container-lg">
        <div class="navbar--inner">
          
          <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="BBVA logo"></a>
  
          <div class="user-logged">
            <span><?php echo  $email; ?></span>
            <div class="avatar">
              <span><?php echo get_user_initials(); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>