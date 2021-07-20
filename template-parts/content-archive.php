<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FleximpleTheme
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="entry-media">
		<?php fleximpletheme_post_thumbnail( 'thumbnail' ); ?>
	</div><!-- .entry-media -->

	<div class="entry-content">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		if ( 'post' === get_post_type() ) {
			fleximpletheme_posted_on();
		} ?>
		
		<div class="entry-excerpt"><?php the_excerpt(); ?></div>
	</div><!-- .entry-content -->

	<!--
	<footer class="entry-footer">
		<?php fleximpletheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<a class="entry-link-overlay" href="<?php echo esc_url( get_permalink() ); ?>" data-link-name="article" tabindex="-1" aria-hidden="true">
		<?php echo get_the_title(); ?>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
