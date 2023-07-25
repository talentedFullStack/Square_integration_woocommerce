<?php

/**
 * Plugin Name:       Woocommerce POS Integration
 * Plugin URI:        https://meeting.lpdevteam.com/
 * Description:       A simple front-end for taking WooCommerce orders at the Point of Sale. Requires <a href="https://meeting.lpdevteam.com/">WooCommerce</a>.
 * Version:           0.5.0-beta.2
 * Author:            Hovhannes
 * Author URI:        https://meeting.lpdevteam.com/
 * Text Domain:       woocommerce-pos
 * License:           GPL-2.0+
 * License URI:       https://meeting.lpdevteam.com/
 * Domain Path:       /languages
 * WC tested up to:   3.5
 * WC requires at least: 2.3.7
 *
 * @package   Woocommerce POS Integration
 * @author    Hovhannes
 * @link      https://meeting.lpdevteam.com/
 *
 */

namespace WCPOS;

/**
 * Define plugin constants.
 */
define( __NAMESPACE__ . '\VERSION', '0.5.0-beta.2' );
define( __NAMESPACE__ . '\PLUGIN_NAME', 'woocommerce-pos' );
define( __NAMESPACE__ . '\PLUGIN_FILE', plugin_basename( __FILE__ ) ); // 'woocommerce-pos/woocommerce-pos.php'
define( __NAMESPACE__ . '\PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( __NAMESPACE__ . '\PLUGIN_URL', trailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );

/**
 * Autoloader
 */
if ( ! function_exists( 'spl_autoload_register' ) ) {
	return;
}

spl_autoload_register( __NAMESPACE__ . '\\autoload' );
function autoload( $cls ) {
	$cls = ltrim( $cls, '\\' );
	if ( substr( $cls, 0, strlen( __NAMESPACE__ ) ) !== __NAMESPACE__ ) {
		return;
	}

	$cls  = str_replace( __NAMESPACE__, '', $cls );
	$file = PLUGIN_PATH . 'includes' . str_replace( '\\', DIRECTORY_SEPARATOR, strtolower( $cls ) ) . '.php';
	if ( is_readable( $file ) ) {
		require_once( $file );
	}
}

/**
 * Activate plugin
 */
new Activator();

/**
 * Deactivate plugin
 */
new Deactivator();
