
    <div id="desktop-logo-overlay" class="only-desktop">
      <?php echo url_get_contents(get_bloginfo('stylesheet_directory') . '/img/dist/moxon_logo_outlined.svg'); ?>
    </div>

  <?php
    if (is_front_page()) {
  ?>
    <div id="mobile-logo-overlay" class="only-mobile text-align-center">
      <div class="u-flex-center">
        <?php echo url_get_contents(get_bloginfo('stylesheet_directory') . '/img/dist/moxon-mobile-logo.svg'); ?>
      </div>
    </div>
  <?php
    }
  ?>

  </section>

  <?php
    get_template_part('partials/scripts');
    get_template_part('partials/schema-org');
  ?>

  </body>
</html>