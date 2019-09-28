<?php
/*
Plugin Name: Focushaus
Description: Give images focal points.
Version: 2.0
Author: Funkhaus
Plugin URI:  https://github.com/funkhaus/focushaus
Author URI:  http://funkhaus.us
*/

/*
 * Enqueue scripts
 */
    function focushaus_admin_scripts() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('focal-point', plugin_dir_path( __FILE__ ) . 'js/focal-point.js', 'jquery', '2.0b');
    }
    add_action( 'admin_enqueue_scripts', 'focushaus_admin_scripts' );

/*
 * Enqueue styles
 */
    function focushaus_admin_styles() {
        wp_enqueue_style('focal-point', plugin_dir_path( __FILE__ ) . 'css/focal-point.css', null, '2.0b');
    }
    add_action( 'admin_print_styles', 'focushaus_admin_styles' );
?>
