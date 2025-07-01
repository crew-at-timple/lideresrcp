<?php if (get_page_template_slug(get_the_ID()) != 'page-login.php') { ?>

<div class="footer">
  <?php if (is_user_logged_in()) : ?>
    <div style="text-align: center; margin-top: 40px;">
      <a href="<?php echo esc_url(wp_logout_url(site_url('/login'))); ?>" style="color: #1a73e8; text-decoration: none; font-weight: bold;">
        Cerrar sesión
      </a>
    </div>
  <?php endif; ?>
  
  <div class="footer-copy">
    LideresRCP.com es una iniciativa del equipo de Cultura y Transformación de BBVA Argentina
  </div>
</div>

<?php } ?>


<?php wp_footer(); ?>
</body>

</html>