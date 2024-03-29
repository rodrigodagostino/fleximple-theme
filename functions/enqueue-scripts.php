<?php

/**
 * Enqueue admin scripts.
 */
//   if ( file_exists( get_template_directory_uri() . '/dist/admin-script.js' ) ) {
//     wp_enqueue_script(
//       'theme-admin-scripts',
//       get_template_directory_uri() . '/dist/admin-script.js',
//       array( 'jquery' ),
//       date( 'Ymd.His', filemtime( get_template_directory() . '/dist/admin-script.js' ) ),
//       true
//     );
//   }
// }
// add_action( 'admin_enqueue_scripts', 'fleximpletheme_enqueue_admin_assets', 10 );

/**
 * Enqueue customizer scripts.
 */
function fleximpletheme_enqueue_customizer_assets()
{
  if (file_exists(get_template_directory_uri() . '/dist/customizer-script.js')) {
    wp_enqueue_script(
      'theme-customizer-scripts',
      get_template_directory_uri() . '/dist/customizer-script.js',
      array('jquery'),
      date('Ymd.His', filemtime(get_template_directory() . '/dist/customizer-script.js')),
      true
    );
  }
}
add_action('customize_preview_init', 'fleximpletheme_enqueue_customizer_assets');

/**
 * Enqueue scripts and styles.
 */
function fleximpletheme_enqueue_assets()
{
  wp_enqueue_style(
    'theme-styles',
    get_template_directory_uri() . '/dist/style.css',
    false,
    date('Ymd.His', filemtime(get_template_directory() . '/dist/style.css'))
  );

  wp_enqueue_script(
    'theme-scripts',
    get_template_directory_uri() . '/dist/script.js',
    array(),
    date('Ymd.His', filemtime(get_template_directory() . '/dist/script.js')),
    true
  );

  wp_enqueue_style(
    'theme-icons-font',
    get_template_directory_uri() . '/assets/fonts/fleximple-icons/css/fleximple-icons.min.css',
    false,
    date('Ymd.His', filemtime(get_template_directory() . '/assets/fonts/fleximple-icons/css/fleximple-icons.min.css'))
  );

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'fleximpletheme_enqueue_assets', 10);

/**
 * Enqueue editor styles.
 */
function fleximpletheme_enqueue_editor_assets()
{
  // Scripts
  wp_enqueue_script(
    'theme-editor-scripts',
    get_template_directory_uri() . '/dist/editor-script.js',
    array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'),
    date('Ymd.His', filemtime(get_template_directory() . '/dist/editor-script.js')),
    true
  );

  // Styles
  wp_enqueue_style(
    'theme-editor-styles',
    get_template_directory_uri() . '/dist/editor-style.css',
    false,
    date('Ymd.His', filemtime(get_template_directory() . '/dist/editor-style.css')),
    'all'
  );

  // Translation JSON
  if (function_exists('wp_set_script_translations')) {
    wp_set_script_translations(
      'theme-editor-scripts',
      'fleximpletheme',
      get_template_directory() . '/languages'
    );
  }
}
add_action('enqueue_block_editor_assets', 'fleximpletheme_enqueue_editor_assets', 10);

/**
 * Enqueue login styles.
 */
function fleximpletheme_enqueue_login_styles()
{
  wp_enqueue_style(
    'theme-login-styles',
    get_template_directory_uri() . '/dist/login-style.css',
    false,
    date('Ymd.His', filemtime(get_template_directory() . '/dist/login-style.css'))
  );
}
//This loads the function above on the login page
add_action('login_enqueue_scripts', 'fleximpletheme_enqueue_login_styles');
