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
define('CHILD_THEME_NMCC_VERSION', '1.0');

/**
 * Enqueue styles
 */
function child_enqueue_styles() {
  wp_enqueue_style('nmcc-theme-css', get_stylesheet_directory_uri() . '/css/style.css', array('astra-theme-css'), CHILD_THEME_NMCC_VERSION, 'all');
  if ($_GET['lightbox'] ?? FALSE) {
    // If page is viewed in a lightbox (per url query params), enqueue lightbox styles.
    wp_enqueue_style('nmcc-lightbox-css', get_stylesheet_directory_uri() . '/css/lightbox.css', array('nmcc-theme-css'), CHILD_THEME_NMCC_VERSION, 'all');
  }
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);

add_filter('the_content', function ($content) {
  if (!empty($_GET['lightbox']) && is_singular()) {
    // If page is viewed in a lightbox (per url query params), append a break-out link.
    $title = get_the_title();
    $url   = esc_url(remove_query_arg('lightbox'));
    $content .= '<p class="lightbox-full-link"><a target="_top" href="' . $url . '">View full page: ' . esc_html($title) . '</a></p>';
  }
  return $content;
});