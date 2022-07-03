<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FleximpleTheme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <!-- Force IE to use the latest rendering engine available -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Mobile Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <?php wp_head(); ?>

  <?php get_template_part( 'includes/tagmanager' ); ?>
</head>

<body <?php body_class(); ?>>
  <?php get_template_part( 'includes/tagmanager', 'noscript' ); ?>

  <div id="site" class="site">
    <a class="skip-link sr-only" href="#primary-content"><?php esc_html_e( 'Skip to content', 'fleximpletheme' ); ?></a>

    <?php
    $header_classes = array();
    $header_classes[] = 'is-' . get_theme_mod( 'header_layout', 'default' );
    $header_classes[] = 'is-' . get_theme_mod( 'header_behavior', 'static' );
    ?>

    <header id="header" class="site-header<?php if ( ! empty( $header_classes ) ) { echo ' '. join( ' ', $header_classes ); } ?>">
      <div class="container">
        <?php if (
          get_theme_mod( 'header_layout' ) === 'custom' &&
          file_exists( get_stylesheet_directory() . '/template-parts/custom-navigation.php' )
        ) {
          get_template_part( 'template-parts/custom-navigation' );
        } else if (
          get_theme_mod( 'header_layout' ) === 'custom' &&
          !file_exists( get_stylesheet_directory() . '/template-parts/custom-navigation.php' ) 
        ) {
          _e( 'You have chosen to use a custom header layout, but the <code>custom-navigation.php</code> file was not found. You can either select a different header layout or create a custom layout in <code>template-parts/custom-navigation.php</code>.', 'fleximpletheme' );
        } else {
          get_template_part( 'template-parts/navigation' );
        } ?>
      </div><!-- .container -->
    </header><!-- #header -->
