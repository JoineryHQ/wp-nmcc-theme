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
  wp_enqueue_style('nmcc-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_NMCC_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);

/**
 * Add Read More text to Resource Links URL custom field
 */
// Content Views Pro - disable auto convert url to link
add_filter('pt_cv_wrap_ctf_value', '__return_false');

// Content Views Pro - Set custom text for an URL custom field
add_filter('pt_cv_ctf_value', 'cvp_theme_ctf_url_custom_text', 100, 3);

function cvp_theme_ctf_url_custom_text($url, $key, $post) {

  if ($key === 'tc_website') {
    $url = '<a href="' . $url . '" target="_blank">Read More</a>';
  }

  return $url;
}
// Content Views Pro - use custom field value as custom link
add_filter('pt_cv_field_href', 'tc_cvp_theme_use_custom_url_by_customfield', 100, 2);

function tc_cvp_theme_use_custom_url_by_customfield($href, $post) {
  $custom_url = get_post_meta($post->ID, 'tc_website', true);
  if ($custom_url) {
    $href = $custom_url;
  }
  return $href;
}
