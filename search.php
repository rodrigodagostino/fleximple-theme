<?php

/**
 * Template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package FleximpleTheme
 */

get_header(); ?>

<main id="main" class="site-main">
  <div class="container">
    <div id="primary-content" class="primary-content">
      <section class="archive-page">
        <?php
        if (have_posts()) : ?>
          <header class="page-header">
            <h1 class="page-title">
              <?php
              /* translators: %s: search query. */
              printf(esc_html__('Results for %s', 'fleximpletheme'), '<em>&ldquo;' . get_search_query() . '&rdquo;</em>');
              ?>
            </h1>

            <p class="search-results-count">
              <?php
              $results_count = $wp_query->found_posts;
              if (1 === $results_count) {
                printf(
                  /* translators: 1: title. */
                  esc_html_e('%d result found', 'fleximpletheme'),
                  $results_count
                );
              } else {
                printf( // WPCS: XSS OK.
                  /* translators: 1: comment count number */
                  esc_html(_nx('%d result found', '%d results found', $results_count, 'results count title', 'fleximpletheme')),
                  number_format_i18n($results_count)
                );
              } ?>
            </p>
          </header><!-- .page-header -->

          <div class="page-content">
            <?php
            get_search_form();

            /* Start the Loop */
            while (have_posts()) : the_post();
              /**
               * Run the loop for the search to output the results.
               * If you want to overload this in a child theme then include a file
               * called content-archive.php and that will be used instead.
               */
              get_template_part('template-parts/content', 'archive');
            endwhile; ?>
          </div>

          <div class="page-footer">
            <?php fleximpletheme_page_navi(); ?>
          </div>
        <?php
        else :
          get_template_part('template-parts/content', 'none');
        endif; ?>
      </section><!-- .archive-page -->
    </div><!-- #primary-content -->

    <?php
    get_sidebar();
    ?>
  </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
