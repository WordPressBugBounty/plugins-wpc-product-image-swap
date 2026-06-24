<?php
/*
Plugin Name: WPC Product Image Swap for WooCommerce
Plugin URI: https://wpclever.net/
Description: It presents products visually engagingly to customers by offering attention-drawing swapping effects for images of products on archive/shop pages.
Version: 1.2.4
Author: WPClever
Author URI: https://wpclever.net
Text Domain: wpc-product-image-swap
Domain Path: /languages/
Requires Plugins: woocommerce
Requires at least: 5.9
Tested up to: 7.0
WC requires at least: 3.0
WC tested up to: 10.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) || exit;

! defined( 'WPCIS_VERSION' ) && define( 'WPCIS_VERSION', '1.2.4' );
! defined( 'WPCIS_LITE' ) && define( 'WPCIS_LITE', __FILE__ );
! defined( 'WPCIS_FILE' ) && define( 'WPCIS_FILE', __FILE__ );
! defined( 'WPCIS_URI' ) && define( 'WPCIS_URI', plugin_dir_url( __FILE__ ) );
! defined( 'WPCIS_DIR' ) && define( 'WPCIS_DIR', plugin_dir_path( __FILE__ ) );
! defined( 'WPCIS_SUPPORT' ) && define( 'WPCIS_SUPPORT', 'https://wpclever.net/support?utm_source=support&utm_medium=wpcis&utm_campaign=wporg' );
! defined( 'WPCIS_REVIEWS' ) && define( 'WPCIS_REVIEWS', 'https://wordpress.org/support/plugin/wpc-product-image-swap/reviews/' );
! defined( 'WPCIS_CHANGELOG' ) && define( 'WPCIS_CHANGELOG', 'https://wordpress.org/plugins/wpc-product-image-swap/#developers' );
! defined( 'WPCIS_DISCUSSION' ) && define( 'WPCIS_DISCUSSION', 'https://wordpress.org/support/plugin/wpc-product-image-swap' );

// WPC Core
require_once __DIR__ . '/includes/wpc-core/wpc-core.php';
wpc_core_register( [
	'file'    => __FILE__,
	'version' => WPCIS_VERSION,
	'prefix'  => 'wpcis',
] );

if ( ! function_exists( 'wpcis_init' ) ) {
    add_action( 'plugins_loaded', 'wpcis_init', 11 );

    function wpcis_init() {
        if ( ! function_exists( 'WC' ) || ! version_compare( WC()->version, '3.0', '>=' ) ) {
            add_action( 'admin_notices', 'wpcis_notice_wc' );

            return null;
        }

        include_once 'includes/class-backend.php';
        include_once 'includes/class-frontend.php';
    }
}

if ( ! function_exists( 'wpcis_notice_wc' ) ) {
    function wpcis_notice_wc() {
        ?>
        <div class="error">
            <p><strong>WPC Product Image Swap</strong> requires WooCommerce version 3.0 or greater.</p>
        </div>
        <?php
    }
}
