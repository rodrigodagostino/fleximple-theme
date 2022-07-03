<?php
/**
 * fleximpletheme Theme Customizer
 *
 * @package FleximpleTheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fleximpletheme_customize_register( $wp_customize ) {

  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
      'selector'        => '.page-title a',
      'render_callback' => 'fleximpletheme_customize_partial_blogname',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
      'selector'        => '.site-description',
      'render_callback' => 'fleximpletheme_customize_partial_blogdescription',
    ) );
  }
  $wp_customize->add_section( 'fleximpletheme_layout' , array(
    'title'     => __( 'Layout', 'fleximpletheme' ),
    'priority'  => 30,
  ) );


  $wp_customize->add_setting( 'header_layout', array(
    'default'   => 'default',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( 'header_layout', array(
    'label'         => __( 'Header Layout', 'fleximpletheme' ),
    'section'       => 'fleximpletheme_layout',
    'settings'      => 'header_layout',
    'priority'      => 10, // Optional. Order priority to load the control. Default: 10
    'type'          => 'select',
    'choices'       => array(
      'default'     => __( 'Default', 'fleximpletheme' ),
      'slim'        => __( 'Slim', 'fleximpletheme' ),
      'centered'    => __( 'Centered', 'fleximpletheme' ),
      'full-width'  => __( 'Full-Width', 'fleximpletheme' ),
      'custom'      => __( 'Custom', 'fleximpletheme' ),
    ),
    'capability'    => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
  ) );


  $wp_customize->add_setting( 'header_behavior', array(
    'default'   => 'static',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( 'header_behavior', array(
    'label'       => __( 'Header Behavior', 'fleximpletheme' ),
    'section'     => 'fleximpletheme_layout',
    'settings'    => 'header_behavior',
    'priority'    => 10, // Optional. Order priority to load the control. Default: 10
    'type'        => 'select',
    'choices'     => array(
      'static'  => __( 'Static', 'fleximpletheme' ),
      'sticky'  => __( 'Sticky', 'fleximpletheme' ),
    ),
    'capability'  => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
  ) );


  $wp_customize->add_setting( 'header_position', array(
    'default'   => 'top',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( 'header_position', array(
    'label'       => __( 'Header Position', 'fleximpletheme' ),
    'section'     => 'fleximpletheme_layout',
    'settings'    => 'header_position',
    'priority'    => 10, // Optional. Order priority to load the control. Default: 10
    'type'        => 'select',
    'choices'     => array(
      'top'             => __( 'Top of the page', 'fleximpletheme' ),
      'below-the-fold'  => __( 'Below the fold', 'fleximpletheme' ),
    ),
    'capability'  => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
  ) );


  $wp_customize->add_setting( 'collapsible_menu_position', array(
    'default'   => 'absolute',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( 'collapsible_menu_position', array(
    'label'       => __( 'Collapsible Menu Position', 'fleximpletheme' ),
    'section'     => 'fleximpletheme_layout',
    'settings'    => 'collapsible_menu_position',
    'priority'    => 10, // Optional. Order priority to load the control. Default: 10
    'type'        => 'select',
    'choices'     => array(
      'absolute'  => __( 'Absolute', 'fleximpletheme' ),
      'fixed'     => __( 'Fixed', 'fleximpletheme' ),
    ),
    'capability'  => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
  ) );


  $wp_customize->add_setting( 'header_search_field', array(
    'default'   => 1,
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( 'header_search_field', array(
    'label'       => __( 'Display Header Search Field', 'fleximpletheme' ),
    'section'     => 'fleximpletheme_layout',
    'settings'    => 'header_search_field',
    'priority'    => 10, // Optional. Order priority to load the control. Default: 10
    'type'        => 'checkbox',
    'capability'  => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
  ) );


  $wp_customize->add_setting( 'sidebar_layout', array(
    'default'   => 'no-sidebar',
    'transport' => 'refresh',
  ) );
  $wp_customize->add_control( 'sidebar_layout', array(
    'label'       => __( 'Sidebar Layout', 'fleximpletheme' ),
    'section'     => 'fleximpletheme_layout',
    'settings'    => 'sidebar_layout',
    'priority'    => 10, // Optional. Order priority to load the control. Default: 10
    'type'        => 'select',
    'choices'     => array(
      'no-sidebar'    => __( 'No Sidebar', 'fleximpletheme' ),
      'left-sidebar'  => __( 'Left Sidebar', 'fleximpletheme' ),
      'right-sidebar' => __( 'Right Sidebar', 'fleximpletheme' ),
    ),
    'capability'  => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
  ) );
}
add_action( 'customize_register', 'fleximpletheme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fleximpletheme_customize_partial_blogname() {
  bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fleximpletheme_customize_partial_blogdescription() {
  bloginfo( 'description' );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fleximpletheme_customizer_body_classes( $classes ) {
  // Sidebar Layout.
  if (
    get_theme_mod( 'sidebar_layout', 'no-sidebar' ) !== 'no-sidebar' &&
    ! is_page_template( 'page-templates/front-page.php' )
  ) {
    $classes[] = 'has-' . get_theme_mod( 'sidebar_layout', 'no-sidebar' );
  }
  return $classes;
}
add_filter( 'body_class', 'fleximpletheme_customizer_body_classes' );


/**
 * Load dynamic logic for the customizer controls area.
 */
// function fleximpletheme_panels_js() {
//   wp_enqueue_script( 'fleximpletheme-customize-controls', get_theme_file_uri( '/js/customize-controls.js' ), array(), '20181231', true );
// }
// add_action( 'customize_controls_enqueue_scripts', 'fleximpletheme_panels_js' );


/**
 * Generate Live CSS
 */
/* function fleximpletheme_customize_css() { ?>
  <style type="text/css">
    h1 { color: <?php echo get_theme_mod( 'header_color', '#000000' ); ?>; }
  </style>
<?php }
add_action( 'wp_head', 'fleximpletheme_customize_css'); */