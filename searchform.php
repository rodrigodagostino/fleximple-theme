<?php
/**
 * Template for displaying search forms
 *
 * @package Fleximple Theme
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
	<label>
		<span class="sr-only"><?php echo _x('Search for:', 'label', 'fleximpletheme') ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search…', 'placeholder', 'fleximpletheme') ?>" value="<?php echo get_search_query() ?>" name="s" />
	</label>
	<button type="submit" class="search-submit">
		<span class="sr-only"><?php echo _x('Search', 'submit button', 'fleximpletheme'); ?></span>
		<i class="icon-magnifying-glass"></i>
	</button>
	<div class="tooltip tooltip--down animate-fade-in"><span><?php _e( 'This field cannot be empty.', 'fleximpletheme' ); ?></span></div>
</form>
