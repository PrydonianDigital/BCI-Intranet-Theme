<?php

	// User Apps
	add_shortcode( 'cmb-form', 'cmb2_do_frontend_form_shortcode' );
	function cmb2_do_frontend_form_shortcode( $atts = array() ) {
	    global $post;
		$user_id = get_current_user_id();
	    if ( ! isset( $atts['user_id'] ) ) {
	        $atts['user_id'] = $user_id;
	    }
	    if ( empty( $atts['id'] ) ) {
	        return __( "Please add an 'id' attribute to specify the CMB2 form to display.", 'bci' );
	    }
	    $metabox_id = esc_attr( $atts['id'] );
		$object_id = absint( $atts['user_id'] );
	    $form = cmb2_get_metabox_form( $metabox_id, $object_id );
	    return $form;

	}