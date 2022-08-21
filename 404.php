<?php

/**
 * Template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package FleximpleTheme
 */

get_header(); ?>

<main id="main" class="site-main">
  <div class="container">
    <div id="primary-content" class="primary-content">
      <section class="error-404-page">
        <header class="page-header">
          <h1 class="page-title">
            <span>404</span>
            <span><?php esc_html_e('Oops! The page you were looking for doesn’t exist.', 'fleximpletheme'); ?></span>
          </h1>
        </header><!-- .page-header -->

        <div class="page-content">
          <p><?php printf(
                __('You may have followed an outdated link or an incorrect URL, but you can use the search or <a href="%s">go to the front page</a> to try and find what you’re looking for.', 'fleximpletheme'),
                site_url()
              ); ?></p>

          <?php get_search_form(); ?>
        </div><!-- .page-content -->
      </section><!-- .error-404 -->
    </div><!-- #primary-content -->
  </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
