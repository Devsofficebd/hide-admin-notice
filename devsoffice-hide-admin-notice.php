<?php
/**
 * Plugin Name: Hide Admin Notices
 * Description: A simple plugin to hide WordPress admin notifications for specific admin pages.
 * Version: 1.0
 * Author: Your Name
 */

// Hide WordPress Admin Notifications programmatically for specific admin pages
function pr_disable_admin_notices() {
    // Check if we are on the admin settings pages for your plugins
    if ( isset($_GET['page']) && ( $_GET['page'] === 'do_dynamic_ddownloads_settings' || $_GET['page'] === 'devsoffice' ) ) {
        // Disable admin notices
        global $wp_filter;
        if ( isset( $wp_filter['user_admin_notices'] ) ) {
            unset( $wp_filter['user_admin_notices'] );
        }
        if ( isset( $wp_filter['admin_notices'] ) ) {
            unset( $wp_filter['admin_notices'] );
        }
        if ( isset( $wp_filter['all_admin_notices'] ) ) {
            unset( $wp_filter['all_admin_notices'] );
        }
    }
}
add_action( 'admin_print_scripts', 'pr_disable_admin_notices' );
