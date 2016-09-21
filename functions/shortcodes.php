<?php

	// Newsletters shortcode
	function events_list($atts){
	   extract(shortcode_atts(array(
		  'category'	=> '',
		  'tag'			=> '',
		  'limit'		=> '',
	   ), $atts));
		$args = array (
			'post_type'			=> array( 'tribe_events' ),
			'posts_per_page'	=> $limit,
			'tax_query'			=> array(
				'relation'		=> 'OR',
				array(
					'taxonomy' 	=> 'tribe_events_cat',
					'field' 	=> 'slug',
					'terms' 	=> $category,
				),
				array(
					'taxonomy'	=> 'post_tag',
					'field'		=> 'slug',
					'terms'		=> $tag,
				),
			)
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ):
		$news ='';
		while ( $query->have_posts() ) : $query->the_post();
		$venue_details = tribe_get_venue_details();
		$event_id = get_the_ID();
		$mini_cal_event_atts = tribe_events_get_widget_event_atts();
		$postDate = tribe_events_get_widget_event_post_date();
		$news .= '<div class="type-tribe_events tribe-clearfix tribe-events-category-social tribe-events-first tribe-events-last">';
		$news .= '<div class="tribe-mini-calendar-event event-0  first  last ">';
		$news .= '<div class="list-date">';
		$news .= '<span class="list-dayname">' . apply_filters( 'tribe-mini_helper_tribe_events_ajax_list_dayname', date_i18n( 'M', $postDate ), $postDate, $mini_cal_event_atts['class'] ) . '</span>';
		$news .= '<span class="list-daynumber">' . apply_filters( 'tribe-mini_helper_tribe_events_ajax_list_dayname', date_i18n( 'd', $postDate ), $postDate, $mini_cal_event_atts['class'] ) . '</span>';
		$news .= '</div>';
		$news .= '<div class="list-info">';
		$news .= '<h2 class="tribe-events-title">';
		$news .= '<a href="' . get_the_permalink() . '" rel="bookmark">'. get_the_title() .'</a>';
		$news .= '</h2>';
		$news .= '<div class="tribe-events-duration">';
		$news .= tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' );
		$news .= '</div>';
		$news .= '<div class="tribe-events-location">';
		$news .= implode( ', ', $venue_details );
		$news .= '</div>';
		$news .= '</div>';
		$news .= '</div>';
		$news .= '</div>';
		endwhile;
		endif;
		wp_reset_query();
		return $news;
	}
	add_shortcode( 'events_list','events_list' );

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
					$return_string .=  '<a href="' . $doc . '" target="_blank" rel="noopener">' . get_the_title() . '</a>';
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
						$return_string .= '<a href="' . $doc . '" target="_blank" rel="noopener">' . $content . '</a>';
					}
			}
			endwhile;
		endif;
		wp_reset_query();
		return $return_string;
	}
	add_shortcode( 'doc','show_doc_text' );