<?php
// Borrowed with love from FoundationPress
function fleximpletheme_page_navi() {
  global $wp_query;
  $big = 999999999; // This needs to be an unlikely integer
  // For more options and info view the docs for paginate_links()
  // http://codex.wordpress.org/Function_Reference/paginate_links
  $paginate_links = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'prev_next' => true,
    'prev_text' => __( '&laquo;', 'fleximpletheme' ),
    'next_text' => __( '&raquo;', 'fleximpletheme' ),
    ) );

  // Display the pagination if more than one page is found.
  if ( $paginate_links ) {
    echo '<div class="pagination">';
    echo $paginate_links;
    echo '</div><!-- .pagination -->';
  }
}
