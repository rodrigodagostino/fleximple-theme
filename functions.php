<?php
/**
 * Fleximple Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FleximpleTheme
 */

if ( ! function_exists( 'fleximpletheme_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function fleximpletheme_setup() {
    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on fleximpletheme, use a find and replace
    * to change 'fleximpletheme' to the name of your theme in all the template files.
    */
    load_theme_textdomain( 'fleximpletheme', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support( 'title-tag' );

    /*
    * Add excerpt for pages.
    */
    add_post_type_support( 'page', 'excerpt' );

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support( 'post-thumbnails' );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
      'header-text' => array( 'page-title', 'site-description' ),
    ) );

    // Adding support for core block visual styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for custom color scheme.
    add_theme_support( 'editor-color-palette', array(
      array(
        'name'  => __( 'Lighter Primary', 'fleximpletheme' ),
        'slug'  => 'primary-lighter',
        'color' => '#4da6ff',
      ),
      array(
        'name'  => __( 'Light Primary', 'fleximpletheme' ),
        'slug'  => 'primary-light',
        'color' => '#2693ff',
      ),
      array(
        'name'  => __( 'Primary', 'fleximpletheme' ),
        'slug'  => 'primary',
        'color' => '#0080ff',
      ),
      array(
        'name'  => __( 'Dark Primary', 'fleximpletheme' ),
        'slug'  => 'primary-dark',
        'color' => '#006dd9',
      ),
      array(
        'name'  => __( 'Darker Primary', 'fleximpletheme' ),
        'slug'  => 'primary-darker',
        'color' => '#005ab3',
      ),
      array(
        'name'  => __( 'Lighter Accent', 'fleximpletheme' ),
        'slug'  => 'accent-lighter',
        'color' => '#ff694d',
      ),
      array(
        'name'  => __( 'Light Accent', 'fleximpletheme' ),
        'slug'  => 'accent-light',
        'color' => '#ff4826',
      ),
      array(
        'name'  => __( 'Accent', 'fleximpletheme' ),
        'slug'  => 'accent',
        'color' => '#ff2800',
      ),
      array(
        'name'  => __( 'Dark Accent', 'fleximpletheme' ),
        'slug'  => 'accent-dark',
        'color' => '#d92200',
      ),
      array(
        'name'  => __( 'Darker Accent', 'fleximpletheme' ),
        'slug'  => 'accent-darker',
        'color' => '#b31c00',
      ),
      array(
        'name'  => __( 'Lighter Gray', 'fleximpletheme' ),
        'slug'  => 'gray-lighter',
        'color' => '#e1e1e6',
      ),
      array(
        'name'  => __( 'Light Gray', 'fleximpletheme' ),
        'slug'  => 'gray-light',
        'color' => '#a4a6b5',
      ),
      array(
        'name'  => __( 'Gray', 'fleximpletheme' ),
        'slug'  => 'gray',
        'color' => '#686a84',
      ),
      array(
        'name'  => __( 'Dark Gray', 'fleximpletheme' ),
        'slug'  => 'gray-dark',
        'color' => '#494a5c',
      ),
      array(
        'name'  => __( 'Darker Gray', 'fleximpletheme' ),
        'slug'  => 'gray-darker',
        'color' => '#2a2a35',
      ),
      array(
        'name'  => __( 'White', 'fleximpletheme' ),
        'slug'  => 'white',
        'color' => '#f3f3f5',
      ),
      array(
        'name'  => __( 'Black', 'fleximpletheme' ),
        'slug'  => 'black',
        'color' => '#15151a',
      ),
    ) );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );
  }
endif;
add_action( 'after_setup_theme', 'fleximpletheme_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fleximpletheme_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'fleximpletheme_content_width', 910 );
}
add_action( 'after_setup_theme', 'fleximpletheme_content_width', 0 );


/**
 * Load icons in the front-end.
 */
function fleximpletheme_frontend_favicon() {
  // If Site Icon isn't set in customizer
  if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
    $favicon_path = get_theme_file_uri() . '/assets/images/favicon.png';
    $apple_icon_path = get_theme_file_uri() . '/assets/images/apple-icon-touch.png';
    echo '<link rel="icon" href="' . esc_url( $favicon_path ) . '" />';
    echo '<link rel="apple-touch-icon" href="' . esc_url( $apple_icon_path ) . '">';
  }
}
add_action( 'wp_head', 'fleximpletheme_frontend_favicon' );


/**
 * Load icons in the backend.
 */
function fleximpletheme_backend_favicon() {
  // If Site Icon isn't set in customizer
  if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
    $favicon_path = get_theme_file_uri() . '/assets/images/favicon-admin.png';
    $apple_icon_path = get_theme_file_uri() . '/assets/images/apple-icon-touch-admin.png';
    echo '<link rel="icon" href="' . esc_url( $favicon_path ) . '" />';
    echo '<link rel="apple-touch-icon" href="' . esc_url( $apple_icon_path ) . '">';
  }
}
add_action( 'admin_head', 'fleximpletheme_backend_favicon' );


/**
 * Removes unnecessary image sizes.
 */
function fleximpletheme_remove_additional_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
        if ( !in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            remove_image_size( $size );
        }
    }
}
add_action( 'init', 'fleximpletheme_remove_additional_image_sizes' );


/**
 * Enables upload for WebP image files.
 */
function radiofueguinatheme_enable_additional_mime_types($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter( 'mime_types', 'radiofueguinatheme_enable_additional_mime_types' );

/**
 * Enables preview for WebP image files.
 */
function radiofueguinatheme_webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );
        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}
add_filter( 'file_is_displayable_image', 'radiofueguinatheme_webp_is_displayable', 10, 2 );


// Register scripts and stylesheets.
require get_template_directory() . '/functions/enqueue-scripts.php';

// Register custom menus and menu walkers.
require get_template_directory() . '/functions/menu.php';

// Register sidebars/widget areas.
require get_template_directory() . '/functions/sidebar.php'; 

// Replace 'older/newer' post links with numbered navigation
require get_template_directory() . '/functions/page-navi.php'; 

// Custom template tags for this theme.
require get_template_directory() . '/functions/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/functions/template-functions.php';

// Customizer additions.
require get_template_directory() . '/functions/customizer.php';

// Register custom fields.
require get_template_directory() . '/functions/custom-fields.php';
