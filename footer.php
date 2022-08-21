<?php

/**
 * Template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FleximpleTheme
 */

?>
<?php if (!is_404()) : ?>
  <footer id="colophon" class="site-footer">
    <div class="container">
      <div class="site-footer__top">
        <div class="branding">
          <?php
          if (file_exists(get_theme_file_path() . '/assets/images/logo-inline.svg.php')) : ?>
            <a class="site-logo" title="<?php bloginfo('name'); ?>" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
              <?php get_template_part('assets/images/logo', 'inline.svg'); ?>
            </a>

            <?php
          else :
            if (is_front_page() && is_home()) : ?>
              <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
              <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php
            endif;

            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) : ?>
              <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
          <?php
            endif;
          endif; ?>
        </div><!-- .branding -->

        <?php if (is_active_sidebar('footer-1')) : ?>
          <aside class="widget-area footer-widget-area-1" role="complementary" aria-label="<?php esc_attr_e('Footer Widget Area 1', 'fleximpletheme'); ?>">
            <?php
            if (is_active_sidebar('footer-1')) {
              dynamic_sidebar('footer-1');
            } ?>
          </aside><!-- .widget-area -->
        <?php endif; ?>

        <?php if (is_active_sidebar('footer-2')) : ?>
          <aside class="widget-area footer-widget-area-2" role="complementary" aria-label="<?php esc_attr_e('Footer Widget Area 2', 'fleximpletheme'); ?>">
            <?php
            if (is_active_sidebar('footer-2')) {
              dynamic_sidebar('footer-2');
            } ?>
          </aside><!-- .widget-area -->
        <?php endif; ?>
      </div>

      <div class="site-footer__bottom">
        <div class="copyright">
          <p>&copy; <?php echo date('Y') . ' ' . get_bloginfo('name'); ?></p>
        </div><!-- .copyright -->
      </div><!-- .site-footer__bottom -->
    </div><!-- .container -->
  </footer><!-- #colophon -->
  </div><!-- #site -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>

</html>