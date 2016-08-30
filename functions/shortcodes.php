<?php

	// Newsletters shortcode
	function newsletter_year($atts){
	   extract(shortcode_atts(array(
		  'year'					=> '',
		  'category'				=> ''
	   ), $atts));
		$args = array (
			'year'				=> $year,
			'post_type'			=> array( 'newsletter' ),
			'posts_per_page'	=> -1,
			'tax_query'			=> array(
				array(
					'taxonomy' 	=> 'news_cat',
					'field' 	=> 'slug',
					'terms' 	=> $category,
				)
			)
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ):
		$news ='';
		$news .= '<h3>'. $year .'</h3>';
		$news .= '<ul>';
		while ( $query->have_posts() ) : $query->the_post();
		$news .= '<li><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></li>';
		endwhile;
		$news .= '</ul>';
		endif;
		wp_reset_query();
		return $news;
	}
	add_shortcode( 'newsletters','newsletter_year' );

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

	// Doc shortcode
	function show_doc($atts){
	   extract(shortcode_atts(array(
		  'p'					=> '',
	   ), $atts));
		$args = array (
			'p'					=> $p,
			'post_type'			=> array( 'doc' ),
			'posts_per_page'	=> '1',
		);
		$query = new WP_Query( $args );
		if ($query->have_posts()) :
			while ($query->have_posts()) : $query->the_post();
		$entries = get_post_meta( get_the_ID(), 'doc_version', true );
		foreach ((array) $entries as $key => $entry) {
			$doc = '';
			if ( isset( $entry['_doc'] ) )
				$doc = esc_html( $entry['_doc'] );
				if(end($entries) == $entry) {
					$return_string .=  '<a href="' . $doc . '" target="_blank">' . get_the_title() . '</a>';
				}
		}
			endwhile;
		endif;
		wp_reset_query();
		return $return_string;
	}
	add_shortcode( 'document','show_doc' );

	// Doc with custom text shortcode
	function show_doc_text($atts, $content = null){
	   extract(shortcode_atts(array(
		  'p'					=> '',
	   ), $atts));
		$args = array (
			'p'					=> $p,
			'post_type'			=> array( 'doc' ),
			'posts_per_page'	=> '1',
		);
		$query = new WP_Query( $args );
		if ($query->have_posts()) :
			while ($query->have_posts()) : $query->the_post();
			$entries = get_post_meta( get_the_ID(), 'doc_version', true );
			foreach ((array) $entries as $key => $entry) {
				$doc = '';
				if ( isset( $entry['_doc'] ) )
					$doc = esc_html( $entry['_doc'] );
					if(end($entries) == $entry) {
						$return_string .= '<a href="' . $doc . '" target="_blank">' . $content . '</a>';
					}
			}
			endwhile;
		endif;
		wp_reset_query();
		return $return_string;
	}
	add_shortcode( 'doc','show_doc_text' );