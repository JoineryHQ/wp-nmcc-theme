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

 
 // Adds Read More text to Resource Links URL custom field
 // Content Views Pro - disable auto convert url to link
add_filter( 'pt_cv_wrap_ctf_value', '__return_false' );

// Content Views Pro - Set custom text for an URL custom field
add_filter( 'pt_cv_ctf_value', 'cvp_theme_ctf_url_custom_text', 100, 3 );
function cvp_theme_ctf_url_custom_text( $url, $key, $post ) {

	if ( $key === 'tc_website' ) {
		$url = '<a href="' . $url . '">Read More</a>';
	}

	return $url;
}