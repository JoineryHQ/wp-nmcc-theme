<?php
/**
 * NMCC Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NMCC
 * @since 1.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_NMCC_VERSION', '1.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'nmcc-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_NMCC_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

// Add content to astra_header_before()
// this adds the title to the blog page
/*add_action( 'astra_primary_content_top', 'tc_add_blog_title' );
function tc_add_blog_title() {
	if ( is_home() ){
	ob_start();
	?>
      <header class="entry-header ast-no-thumbnail ast-no-meta blog-header">
		<h1 class="entry-title" itemprop="headline">Blog</h1>
	</header>
<?php
	$output = ob_get_clean();
	wp_reset_postdata();
	echo $output;
	}
 }*/