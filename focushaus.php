<?php
/*
Plugin Name: Focushaus
Description: Give images focal points.
Version: 1.0.0
Author: Sander Moolin, Funkhaus
*/

    function load_custom_wp_admin_style($hook) {
        wp_enqueue_script( 'bundle', plugins_url('dist/bundle.js', __FILE__) );
    }
    add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );



?>
