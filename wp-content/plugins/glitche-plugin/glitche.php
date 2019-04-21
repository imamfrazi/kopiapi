<?php
/**
 * Plugin Name: Glitche Plugin
 * Plugin URI: http://glitche.beshley.com
 * Description: This plugin it's designed for Glitche Theme
 * Version: 1.0
 * Author: beshleyua
 * Author URI: http://beshley.com
 * Text Domain: glitche
 * Domain Path: /language/
 * License: http://www.gnu.org/licenses/gpl.html
 */

/* Load plugin text-domain */
function glitche_plugin_load_textdomain() {
	load_plugin_textdomain( 'glitche-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'glitche_plugin_load_textdomain' );

/* Custom Post Types */
require plugin_dir_path( __FILE__ ) . 'custom-post-types.php';

// ACF Glitche fields extention
require plugin_dir_path( __FILE__ ) . 'acf-ext/acf-ui-google-font/acf-ui-google-font.php';
require plugin_dir_path( __FILE__ ) . 'acf-ext/acf-cf7/acf-cf7.php';
?>