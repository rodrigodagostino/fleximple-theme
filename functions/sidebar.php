<?php
// Sidebars and widgetized areas
function fleximpletheme_register_sidebars()
{
  register_sidebar(array(
    'id'            => 'sidebar',
    'name'          => __('Sidebar', 'fleximpletheme'),
    'description'   => __('The primary sidebar.', 'fleximpletheme'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-1',
    'name'          => __('Footer Area 1', 'fleximpletheme'),
    'description'   => __('The first footer sidebar area.', 'fleximpletheme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-2',
    'name'          => __('Footer Area 2', 'fleximpletheme'),
    'description'   => __('The second footer sidebar area.', 'fleximpletheme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-3',
    'name'          => __('Footer Area 3', 'fleximpletheme'),
    'description'   => __('The second footer sidebar area.', 'fleximpletheme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  /*
  to add more sidebars or widgetized areas, just copy
  and edit the above sidebar code. In order to call
  your new sidebar just use the following code:

  Just change the name to whatever your new
  sidebar's id is, for example:

  register_sidebar( array(
    'id' => 'sidebar2',
    'name' => __('Sidebar 2', 'fleximpletheme'),
    'description' => __('The second (secondary) sidebar.', 'fleximpletheme'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  To call the sidebar in your template, you can just copy
  the sidebar.php file and rename it to your sidebar's name.
  So using the above example, it would be:
  sidebar-sidebar2.php

  */
} /* end register sidebars */

add_action('widgets_init', 'fleximpletheme_register_sidebars');
