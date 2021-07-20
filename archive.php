<?php
/**
 * Template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FleximpleTheme
 */

get_header(); ?>

	<main id="main" class="site-main">
		<div class="container">
			<div id="primary-content" class="primary-content">
				<section class="archive-page">
					<?php
					if ( have_posts() ) : ?>
						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<div class="page-content">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								/**
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-archive-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'archive', get_post_format() );
							endwhile; ?>
						</div>

						<div class="page-footer">
							<?php fleximpletheme_page_navi(); ?>
						</div>

					<?php
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</section>
			</div><!-- #primary-content -->

			<?php
			get_sidebar();
			?>
		</div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
