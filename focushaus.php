<?php
/*
Plugin Name: Focushaus
Description: Give images focal points.
Version: 1.0.0
Author: Sander Moolin, Funkhaus
*/

    function load_custom_wp_admin_style($hook) {
        wp_enqueue_media();
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'bundle', plugins_url('dist/bundle.js', __FILE__) );
    }
    add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

    function edit_offset( $form_fields, $post ) {

      $field_value = get_post_meta( $post->ID, '_custom_offset_x', true );
      $form_fields['_custom_offset_x'] = array(
          'value' => $field_value ? $field_value : '',
          'label' => __( 'Horizontal Offset (%)' )
      );

      // $field_value = get_post_meta( $post->ID, '_custom_offset_y', true );
      // $form_fields['_custom_offset_y'] = array(
      //     'value' => $field_value ? $field_value : '',
      //     'label' => __( 'Vertical Offset (%)' )
      // );

      return $form_fields;
    }
    add_filter( 'attachment_fields_to_edit', 'edit_offset', 10, 2 );

    function save_offset( $attachment_id ) {
      if ( isset( $_REQUEST['attachments'][$attachment_id]['_custom_offset_x'] ) ) {
          $offset_x = $_REQUEST['attachments'][$attachment_id]['_custom_offset_x'];
          update_post_meta( $attachment_id, '_custom_offset_x', $offset_x );
      }
      // if ( isset( $_REQUEST['attachments'][$attachment_id]['_custom_offset_y'] ) ) {
      //     $offset_y = $_REQUEST['attachments'][$attachment_id]['_custom_offset_y'];
      //     update_post_meta( $attachment_id, '_custom_offset_y', $offset_y );
      // }
    }
    add_action( 'edit_attachment', 'save_offset' );




?>
