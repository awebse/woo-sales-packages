<?php
/*
 * Plugin Name:       Sales Packages for WooCommerce
 * Description:       Effortlessly manage and offer exclusive discounts on bundled product packages for a streamlined shopping experience.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mahmudul Hasan
 * Author URI:        https://awebse.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       woo-sales-packages
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;

!defined('WOO_SALES_PACKAGES_PLUGIN_VERSION') && define('WOO_SALES_PACKAGES_PLUGIN_VERSION', '1.0.0');
!defined('WOO_SALES_PACKAGES_PLUGIN_DIR_PATH') && define('WOO_SALES_PACKAGES_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
!defined('WOO_SALES_PACKAGES_PLUGIN_DIR_URL') && define('WOO_SALES_PACKAGES_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));


if ( ! function_exists( 'woo_sales_package_init' ) ) {
    add_action( 'plugins_loaded', 'woo_sales_package_init', 12 );

    function woo_sales_package_init() {
        if ( ! class_exists( 'WooCommerce' ) )
            add_action( 'admin_notices', 'woo_sales_package_wc_notice' );
    }
}

   
if ( ! function_exists( 'woo_sales_package_wc_notice' ) ) {
    function woo_sales_package_wc_notice() {
        $text = esc_html__( 'WooCommerce', 'woo-sales-packages' );
            
            $args = array(
                'tab'       => 'plugin-information',
                'plugin'    => 'woocommerce',
                'TB_iframe' => 'true',
                'width'     => '640',
                'height'    => '500',
            );
            
            $link    = esc_url( add_query_arg( $args, admin_url( 'plugin-install.php' ) ) );
            $message = wp_kses( __( "<strong>Sales Packages for WooCommerce</strong> is an add-on of ", 'woo-sales-packages' ), array( 'strong' => array() ) );
            
            printf( '<div class="%1$s"><p>%2$s <a class="thickbox open-plugin-details-modal" href="%3$s"><strong>%4$s</strong></a></p></div>', 'notice notice-error', $message, $link, $text );
    }
}
    