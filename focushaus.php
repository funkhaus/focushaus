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

    function focushaus_edit_offset_fields( $form_fields, $post ) {

      ob_start();?>
        <label for="attachments[<?php echo $post->ID; ?>][_custom_offset_x]">
          <span class="name">X offset (%)</span>
          <input type="number" class="focushaus-offset x" name="attachments[<?php echo $post->ID; ?>][_custom_offset_x]" value="<?php echo $post->_custom_offset_x; ?>" />
        </label>
        <label for="attachments[<?php echo $post->ID; ?>][_custom_offset_y]">
          <span class="name">Y offset (%)</span>
          <input type="number" class="focushaus-offset y"  name="attachments[<?php echo $post->ID; ?>][_custom_offset_y]"  value="<?php echo $post->_custom_offset_y; ?>" />
        </label>
      <?php

      $html = ob_get_clean();

      $form_fields['focushaus'] = array(
        'input' => 'html',
        'label' => __( 'Focal Point' ),
        'html'  => $html
      );

      return $form_fields;
    }
    add_filter( 'attachment_fields_to_edit', 'focushaus_edit_offset_fields', 10, 2 );

    function focushaus_save_offset( $attachment_id ) {
      if ( isset( $_REQUEST['attachments'][$attachment_id]['_custom_offset_x'] ) ) {
          $offset_x = $_REQUEST['attachments'][$attachment_id]['_custom_offset_x'];
          update_post_meta( $attachment_id, '_custom_offset_x', $offset_x );
      }
      if ( isset( $_REQUEST['attachments'][$attachment_id]['_custom_offset_y'] ) ) {
          $offset_y = $_REQUEST['attachments'][$attachment_id]['_custom_offset_y'];
          update_post_meta( $attachment_id, '_custom_offset_y', $offset_y );
      }
    }
    add_action( 'edit_attachment', 'focushaus_save_offset' );



?>
