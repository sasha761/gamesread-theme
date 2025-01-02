<?php
if ( ! function_exists('is_plugin_active') ) {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if ( ! is_plugin_active('advanced-custom-fields-pro/acf.php') ) {
  // Define path and URL to the ACF plugin.
  define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
  define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

  // Include the ACF plugin.
  include_once( MY_ACF_PATH . 'acf.php' );

  // Customize the URL setting to fix incorrect asset URLs.
  add_filter('acf/settings/url', 'my_acf_settings_url');
  function my_acf_settings_url( $url ) {
      return MY_ACF_URL;
  }
}

/**
 * Функция для импорта настроек ACF.
 */
function import_acf_settings() {
  include_once get_template_directory() . '/includes/acf-settings.php';
}
import_acf_settings();


// add_action('after_switch_theme', 'import_acf_settings');
// add_action('activated_plugin', 'import_acf_settings');
// add_action('switch_theme', 'import_acf_settings');
// add_action('acf/init', 'import_acf_settings');