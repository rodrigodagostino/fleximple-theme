<?php
/**
 * Template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FleximpleTheme
 */

get_header(); ?>

	<main id="main" class="site-main">
		<div class="container">
			<div id="primary-content" class="primary-content">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) : ?>
						<div id="entry-comments" class="entry-comments">
							<h2 class="entry-comments-title"><?php _e( 'Comments', 'fleximpletheme' ) ?></h2>
							<div class="entry-comments-content">
								<?php comments_template(); ?>
							</div>
						</div>
					<?php
					endif; ?>
				<?php
				endwhile; // End of the loop.
				?>
			</div><!-- #primary-content -->

			<?php
			get_sidebar();
			?>
		</div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
