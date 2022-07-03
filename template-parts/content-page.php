<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FleximpleTheme
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( ! is_front_page() ) : ?>
    <header class="entry-header">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

      <div class="entry-excerpt">
        <?php the_excerpt(); ?>
      </div>

      <?php fleximpletheme_post_thumbnail(); ?>

      <div class="entry-meta-share-buttons-wrapper">
        <?php if ( 'post' === get_post_type() ) { fleximpletheme_posted_on(); }
        fleximpletheme_entry_share_buttons(); ?>
      </div>
    </header><!-- .entry-header -->
  <?php endif; ?>

  <div class="entry-content">
    <?php
    the_content();

    wp_link_pages( array(
      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fleximpletheme' ),
      'after'  => '</div>',
    ) );
    ?>
  </div><!-- .entry-content -->

  <?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
      <?php fleximpletheme_entry_footer(); ?>
    </footer><!-- .entry-footer -->
  <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
