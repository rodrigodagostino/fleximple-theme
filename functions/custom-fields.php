<?php

/**
 * Fleximple Theme Custom Fields
 *
 * @package FleximpleTheme
 * @since 1.0.1
 */

if (!function_exists('fleximpletheme_register_post_kicker_custom_field')) {
  function fleximpletheme_register_post_kicker_custom_field()
  {
    register_post_meta(
      'post',
      'kicker', // Does not start with an underscore so it can be visible to SEO tools.
      [
        'show_in_rest'  => true,
        'single'        => true,
        'type'          => 'string',
        'auth_callback' => function () {
          return current_user_can('edit_posts');
        }
      ]
    );
  }
  add_action('init', 'fleximpletheme_register_post_kicker_custom_field');
}
