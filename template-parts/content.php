<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FleximpleTheme
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
  <header class="entry-header">
    <?php fleximpletheme_entry_categories(); ?>

    <?php if ( is_singular() ) : ?>
      <h1 class="entry-title">
        <?php if ( get_post_meta( $post->ID, 'kicker', true ) ) {
          ?><span class="entry-kicker"><?php echo get_post_meta( $post->ID, 'kicker', true ); ?></span><?php
        } ?><span class="entry-heading"><?php echo get_the_title( $post->ID ); ?></span>
      </h1>
    <?php else : ?>
      <h2 class="entry-title">
        <a href="<?php esc_url( get_permalink() ); ?>" rel="bookmark">
          <?php if ( get_post_meta( $post->ID, 'kicker', true ) ) {
            ?><span class="entry-kicker"><?php echo get_post_meta( $post->ID, 'kicker', true ); ?></span><?php
          } ?><span class="entry-heading"><?php echo get_the_title( $post->ID ); ?></span>
        </a>
      </h2>
    <?php endif;

    if ( 'post' === get_post_type() ) {
      fleximpletheme_posted_on();
    } ?>

    <div class="entry-excerpt">
      <?php the_excerpt(); ?>
    </div>

    <?php fleximpletheme_post_thumbnail(); ?>

    <div class="entry-meta-share-buttons-wrapper">
      <?php fleximpletheme_entry_share_buttons(); ?>
    </div>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php
      the_content( sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Continue reading<span class="sr-only"> "%s"</span>', 'fleximpletheme' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      ) );

      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fleximpletheme' ),
        'after'  => '</div>',
      ) );
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php fleximpletheme_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
