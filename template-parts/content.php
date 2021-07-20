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

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) {
			fleximpletheme_posted_on();
		} ?>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<?php fleximpletheme_post_thumbnail(); ?>

		<div class="entry-meta-share-buttons-wrapper">
			<?php if ( 'post' === get_post_type() ) { fleximpletheme_posted_on(); }
			fleximpletheme_entry_share_buttons(); ?>
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
