<?php if (is_user_logged_in()) { ?>

  <div class="footer">
    <div class="container-lg">

      <div class="footer--inner">

        <div class="footer-links">

          <a href="" class="btn btn-link c-blue-lt p-0 me-sm-3 mb-2 mb-sm-0">¿Necesitás ayuda?</a>

          <a href="<?php echo esc_url(wp_logout_url(site_url('/login'))); ?>" class="btn btn-link c-blue-lt fw-300 p-0">
            Cerrar sesión
          </a>
        </div>

        <div class="footer-copy">
          LideresRCP.com es una iniciativa del equipo de Cultura y Transformación de BBVA Argentina
        </div>

      </div>


    </div>
  </div>

<?php } ?>


<?php wp_footer(); ?>
</body>

</html>