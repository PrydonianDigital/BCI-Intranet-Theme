<?php
	$pages = Post_Connector::API()->get_children( 'page-to-link', get_the_ID() );
	if ( ! empty( $pages ) ) {
		echo '<div class="small-12 large-6 column">';
		echo '<h3>Related Links</h3>';
		echo '<ul class="links">';
		foreach( $pages as $page ) {
			$link = get_post_meta($page->ID, 'link_url', true);
			echo '<li>';
			echo '<a href="'. $link . '">'. $page->post_title . '</a>';
			echo '</li>';
		}
		echo '</ul>';
		echo '</div>';
	}
	$posts = Post_Connector::API()->get_children( 'post-to-link', get_the_ID() );
	if ( ! empty( $posts ) ) {
		echo '<div class="small-12 large-6 column">';
		echo '<h3>Related Links</h3>';
		echo '<ul class="links">';
		foreach( $posts as $post ) {
			$link = get_post_meta($posts->ID, 'link_url', true);
			echo '<li>';
			echo '<a href="'. $link . '">'. $posts->post_title . '</a>';
			echo '</li>';
		}
		echo '</ul>';
		echo '</div>';
	}
//	$centres = Post_Connector::API()->get_children( 'centre-to-link', get_the_ID() );
//	if ( ! empty( $centres ) ) {
//		echo '<div class="small-12 large-6 column">';
//		echo '<h3>Related Links</h3>';
//		echo '<ul class="links">';
//		foreach( $centres as $centre ) {
//			$link = get_post_meta($centres->ID, 'link_url', true);
//			echo '<li>';
//			echo '<a href="'. $link . '">'. $centres->post_title . '</a>';
//			echo '</li>';
//		}
//		echo '</ul>';
//		echo '</div>';
//	}
	$events = Post_Connector::API()->get_children( 'event-to-link', get_the_ID() );
	if ( ! empty( $events ) ) {
		echo '<div class="small-12 large-6 column">';
		echo '<h3>Related Links</h3>';
		echo '<ul class="links">';
		foreach( $events as $event ) {
			$link = get_post_meta($centres->ID, 'link_url', true);
			echo '<li>';
			echo '<a href="'. $link . '">'. $events->post_title . '</a>';
			echo '</li>';
		}
		echo '</ul>';
		echo '</div>';
	}
?>