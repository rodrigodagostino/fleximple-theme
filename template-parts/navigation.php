<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FleximpleTheme
 * @since 1.0.0
 */
?>

<nav id="main-nav" class="site-navigation" aria-label="<?php _e( 'Main navigation', 'fleximpletheme' ); ?>">
	<div class="site-navigation__top">
		<div class="branding">
			<?php
			if ( has_custom_logo() ) : ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>
			<?php
			else :
				if ( file_exists( get_theme_file_path() . '/assets/images/logo-inline.svg.php' ) ) : ?>
					<a class="site-logo" title="<?php bloginfo( 'name' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php get_template_part( 'assets/images/logo', 'inline.svg' ); ?>
					</a>

				<?php
				else :
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif;
				endif; ?>
			<?php endif; ?>
		</div><!-- .branding -->

		<button class="menu-toggle" aria-controls="collapsible-navigation" aria-pressed="false" aria-expanded="false">
			<span class="menu-toggle-label sr-only"><?php echo _x( 'Display menu', 'toggle button', 'fleximpletheme' ); ?></span>
			<span class="menu-toggle__line" aria-hidden="true"></span>
		</button><!-- .menu-toggle -->
	</div><!-- .site-navigation__top -->

	<div class="site-navigation__bottom">
		<?php if ( has_nav_menu( 'main-menu-location' ) ) {
			fleximpletheme_main_menu();
		} ?>

		<?php if ( get_theme_mod( 'header_search_field', 1 ) ) { ?>
			<button class="search-toggle" aria-pressed="false" aria-expanded="false">
				<span class="search-toggle-label sr-only"><?php echo _x( 'Display search bar', 'toggle button', 'fleximpletheme' ); ?></span>
				<span class="search-toggle__glass" aria-hidden="true"></span>
				<span class="search-toggle__handle" aria-hidden="true"></span>
				<span class="search-toggle__line" aria-hidden="true"></span>
			</button>
		<?php } ?>

		<?php if ( get_theme_mod( 'header_search_field', 1 ) ) { ?>
			<div class="search-container" aria-hidden="true">
				<?php get_search_form(); ?>
			</div>
		<?php } ?>
	</div><!-- .site-navigation__bottom -->
</nav><!-- .site-navigation -->

<nav id="collapsible-nav" class="collapsible-navigation <?php echo 'is-'. get_theme_mod( 'collapsible_menu_position', 'absolute' ) ?> is-hidden" aria-label="<?php _e( 'Collapsible navigation', 'radiofueguinatheme' ); ?>">
	<?php if ( has_nav_menu( 'live-menu-location' ) ) {
		radiofueguinatheme_live_menu();
	}

	if ( get_theme_mod( 'header_search_field', 1 ) ) {
		get_search_form();
	}

	if ( has_nav_menu( 'main-menu-location' ) ) {
		fleximpletheme_main_menu();
	}

	if ( has_nav_menu( 'top-menu-location' ) ) {
		fleximpletheme_top_menu();
	} ?>
</nav><!-- .collapsible-navigation -->
