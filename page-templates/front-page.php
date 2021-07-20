<?php
/**
 * Template Name: Front Page
 *
 * @package FleximpleTheme
 * @since   1.0.0
 */

get_header(); ?>

	<main id="main" class="site-main">
		<div class="container">
			<div id="primary-content" class="primary-content">
				<?php
				while ( have_posts() ) : the_post(); ?>
					<section id="front-page" <?php post_class( 'front-page' ); ?>>
						<header class="page-header">
							<?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
						</header><!-- .front-page-header -->
					
						<div class="page-content">
							<?php
							the_content();
							?>
						</div><!-- .front-page-content -->
					
						<?php if ( get_edit_post_link() ) : ?>
							<footer class="page-footer">
							</footer><!-- .front-page-footer -->
						<?php endif; ?>
					</section><!-- #front-page -->
					
				<?php
				endwhile; // End of the loop.
				?>
			</div><!-- #primary-content -->
		</div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
