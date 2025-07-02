<?php if (is_user_logged_in()) { ?>

  <div class="footer">
    <div class="container-lg">

      <div class="footer--inner">

        <div class="footer-links">

          <a href="#" class="btn btn-link c-blue-lt p-0 me-sm-3 mb-2 mb-sm-0" data-bs-toggle="modal" data-bs-target="#helpModal">¿Necesitás ayuda?</a>

          <a href="<?php echo esc_url(wp_logout_url(site_url('/login'))); ?>" class="btn btn-link c-white p-0">
            Cerrar sesión
          </a>
        </div>

        <div class="footer-copy">
          LideresRCP.com es una iniciativa del equipo de Talento y Cultura de BBVA Argentina.
        </div>

      </div>


    </div>
  </div>

<?php } ?>


<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="helpModalLabel">¿Necesitás ayuda?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          ¡Hola! Esta es una iniciativa del equipo de Talento y Cultura de BBVA Argentina para acompañarte.
          Si tenés alguna duda técnica o problema con la plataforma, podés escribir a
          <a href="mailto:soporte@lideresrcp.com">soporte@lideresrcp.com</a>.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<?php wp_footer(); ?>
</body>

</html>