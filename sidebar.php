<?php
/**
 * Template for the sidebar containing the main widget area
 *
 * @package FleximpleTheme
 * @since 1.0.0
 */
?>

<?php
if (
  is_active_sidebar( 'sidebar' ) &&
  get_theme_mod( 'sidebar_layout', 'no-sidebar' ) !== 'no-sidebar'
) : ?>
  <aside id="secondary-content" class="secondary-content sidebar widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar' ); ?>
  </aside><!-- .secondary-content .sidebar .widget-area -->
<?php
endif; ?>
