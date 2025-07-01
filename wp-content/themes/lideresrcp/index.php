<?php
get_header();

if (is_user_logged_in()) {
  $current_user = wp_get_current_user();
?>

<section>
    <div class="container-lg">
      <div class="home--header">
        <div class="home--header_text">
          <h1 class="home--header_logo logo tiempos my-auto">Radical Client Perspective</h1>
          <div class="fw-500 c-green">Bienvenido a tu espacio personal de trabajo</div>
        </div>
        <div class="home--header_icon">
          <img src="<?php echo get_template_directory_uri(); ?>/images/ico-profile-login-alt.png">
        </div>
      </div>
  
      <div class="home--categories">
        <div class="home--categories_title">Selecciona tu actividad</div>
        <div class="row g-3">
          <div class="col-md-6">
            <a href="" class="capsule-tax inprogress">
              <div class="capsule-tax--content">
                <span class="capsule-tax--tag">En progreso</span>
                <div class="mt-auto">
                  <div class="capsule-tax--title">EnergíaRCP</div>
                  <div class="capsule-tax--desc">Gerentes de sucursales y áreas que prestan servicio a la red</div>
                </div>
              </div>
              <div class="capsule-tax--image">
                <img src="<?php echo get_template_directory_uri(); ?>/temp/tax-img.png">
              </div>
            </a>
          </div>
  
          <div class="col-md-6">
            <a href="" class="capsule-tax disabled">
              <div class="capsule-tax--content">
                <span class="capsule-tax--tag"></span>
                <div class="mt-auto">
                  <div class="capsule-tax--title">Supermentores</div>
                  <div class="capsule-tax--desc">Proximamente</div>
                </div>
              </div>
              <div class="capsule-tax--image">
                <img src="<?php echo get_template_directory_uri(); ?>/temp/tax-img.png">
              </div>
            </a>
          </div>
  
        </div>
      </div>
  
  
    </div>
</section>

<?php
} else {
  echo '<p>No estás logueado.</p>';
}

get_footer();
