<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package FleximpleTheme
 */

if ( ! function_exists( 'fleximpletheme_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function fleximpletheme_post_thumbnail( $image_size = '' ) {
		if ( is_singular() ) :
			if ( has_post_thumbnail() ) : ?>
			<figure class="entry-featured-figure">
				<?php the_post_thumbnail( $image_size, [ 'class' => 'entry-featured-image' ] ); ?>
				<figcaption class="entry-figure-caption"><?php the_post_thumbnail_caption(); ?></figcaption>
			</figure><!-- .entry-thumbnail -->
		<?php endif;

		else :
			if ( has_post_thumbnail() ) : ?>
				<figure class="entry-featured-figure">
					<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
						<?php the_post_thumbnail( $image_size, [ 'class' => 'entry-featured-image' ] ); ?>
					</a>
				</figure>
			<?php else :
				if ( file_exists( get_theme_file_path() . '/assets/images/placeholder-image-1x1.svg.php' ) ) : ?>
					<figure class="entry-featured-figure">
						<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
							<?php get_template_part( 'assets/images/placeholder', 'image-1x1.svg' ); ?>
						</a>
					</figure>
				<?php endif; // End file_exists().
			endif; // End has_post_thumbnail().
		endif; // End is_singular().
	}
endif;


if ( ! function_exists( 'fleximpletheme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function fleximpletheme_posted_on() {
		$time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$byline =
			/* translators: %s: post author. */
			'<span class="entry-byline-label sr-only">'. esc_html_x( 'Published by ', 'post author', 'fleximpletheme' ) .'</span>'.
			'<a class="author vcard" href="'. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .'">'. esc_html( get_the_author() ) .'</a>';

		$posted_on =
			/* translators: %s: post date. */
			'<span class="entry-date-label sr-only">'. esc_html_x( 'Published on ', 'post date', 'fleximpletheme' ) .'</span>'. $time_string;

		echo
		'<div class="entry-meta">
			<div class="entry-date">'. $posted_on .'</div>
		</div>';
		// <div class="entry-byline"> '. $byline .'</div>
	}
endif;


if ( ! function_exists( 'fleximpletheme_entry_categories' ) ) :
	/**
	 * Prints HTML with meta information for the categories.
	 */
	function fleximpletheme_entry_categories() {
		// Hide category text for pages.
		if ( 'post' === get_post_type() ) {
			$categories = get_the_category( $post->ID );
			$categories_list = '';
			foreach ( $categories as $category ) {
				$categories_list .= '<a class="entry-category" href="'. esc_url( get_category_link( $category->term_id ) ) .'" rel="category" data-category-slug="'. esc_html( $category->slug ) .'">'. esc_html( $category->name ) .'</a>';
			}
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf(
					'<div class="entry-categories"><span class="entry-categories-label sr-only">'. esc_html__( 'Posted in', 'fleximpletheme' ) .'</span>%1$s</div>',
					$categories_list
				); // WPCS: XSS OK.
			}
		}
	}
endif;


if ( ! function_exists( 'fleximpletheme_entry_share_buttons' ) ) :
	/**
	 * Prints HTML with meta information for the share buttons.
	 */
	function fleximpletheme_entry_share_buttons() {
		$url = urlencode( get_the_permalink() ); /* Getting the current post link */
		$title = urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ); /* Get the post title */
		$media = urlencode( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); /* Get the current post image thumbnail */

		echo '<ul class="entry-share-buttons">
			<li class="entry-share-button entry-share-button--facebook">
				<a href="https://www.facebook.com/sharer/sharer.php?u='. get_the_permalink() .'" title="'. __( 'Share on Facebook', 'fleximpletheme' ) .'" target="_blank">
					<i class="icon-facebook-f"></i>
				</a>
			</li>
			<li class="entry-share-button entry-share-button--twitter">
				<a href="https://twitter.com/intent/tweet?url='. get_the_permalink() .'&text='. get_the_title() .'&via='. get_the_author_meta( 'twitter' ) .'" title="'. __( 'Share on Twitter', 'fleximpletheme' ) .'" target="_blank">
					<i class="icon-twitter"></i>
				</a>
			</li>
			<li class="entry-share-button entry-share-button--linkedin">
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title='. get_the_title() .'&source=Jonaky_Blog" title="'. __( 'Share on LinkedIn', 'fleximpletheme' ) .'" target="_blank">
					<i class="icon-linkedin"></i>
				</a>
			</li>
			<li class="entry-share-button entry-share-button--whatsapp">
				<a href="https://api.whatsapp.com/send?text='. get_the_title() .': '. get_the_permalink() .'" data-action="share/whatsapp/share" title="'. __( 'Share on WhatsApp', 'fleximpletheme' ) .'" target="_blank">
					<i class="icon-whatsapp"></i>
				</a>
			</li>
			<li class="entry-share-button entry-share-button--email">
				<a href="mailto:type%20email%20address%20here?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20'. get_bloginfo('name') .'&body='. get_the_title() .' - '. get_the_permalink() .'" title="'. __( 'Share by e-mail', 'fleximpletheme' ) .'" target="_blank">
					<i class="icon-envelope-outline"></i>
				</a>
			</li>
		</ul>';
	}
endif;


if ( ! function_exists( 'fleximpletheme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function fleximpletheme_entry_footer() {
		// Hide tag text for pages.
		if ( 'post' === get_post_type() ) {
			$tags_list = get_the_tag_list();
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf(
					'<div class="entry-tags"><span class="entry-tags-label sr-only">'. esc_html__( 'Tags', 'fleximpletheme' ) .'</span>%1$s</div>',
					$tags_list
				); // WPCS: XSS OK.
			}
		}

		// if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		// 	comments_popup_link(
		// 		sprintf(
		// 			wp_kses(
		// 				/* translators: %s: post title */
		// 				__( 'Leave a Comment<span class="sr-only"> on %s</span>', 'fleximpletheme' ),
		// 				array(
		// 					'span' => array(
		// 						'class' => array(),
		// 					),
		// 				)
		// 			),
		// 			get_the_title()
		// 		),
		// 		__( '1 Comment', 'fleximpletheme' ), 
		// 		__( '% Comments', 'fleximpletheme' ),
		// 		'entry-comments',
		// 		__( 'Comments are Closed', 'fleximpletheme' )
		// 	);
		// }
	}
endif;
