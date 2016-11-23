<?php

	$lcp_display_output = '';
	$lcp_display_output .= $this->get_category_link('strong');
	$lcp_display_output .= $this->get_conditional_title();
	global $post;
	while ( have_posts() ) : the_post();
		$lcp_display_output .= "<div class='news hentry'>";
		$lcp_display_output .= $this->get_post_title($post, 'h2', 'lcp_post');
		$lcp_display_output .= "<div class='attachment-post-secondary-image-thumbnail size-post-secondary-image-thumbnail'>";
		$lcp_display_output .= $this->get_thumbnail($post);
		$lcp_display_output .= "</div>";
		$lcp_display_output .= $this->get_content($post, 'p', 'lcp_content');
		$lcp_display_output .= $this->get_excerpt($post, 'div', 'lcp_excerpt');
		$lcp_display_output .= $this->get_posts_morelink($post);
		$lcp_display_output .= '<small class="meta">' . $this->get_date($post) . '</small>';
		$lcp_display_output .= $this->get_custom_fields($post);
		$lcp_display_output .= '</div>';
	endwhile;
	$lcp_display_output .= $this->get_morelink();
	$lcp_display_output .= $this->get_category_count();
	$lcp_display_output .= $this->get_pagination();
	$this->lcp_output = $lcp_display_output;