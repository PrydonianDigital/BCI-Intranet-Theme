<?php

	require 'theme-updates/theme-update-checker.php';
	$example_update_checker = new ThemeUpdateChecker(
		'bci_intranet',
		'http://prydonian.digital/themes/bci_intranet.json' //URL of the metadata file.
	);

	// Init CMB2
	if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/cmb2/init.php';
	} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/CMB2/init.php';
	}

	// Require functions
	require_once('wp-advanced-search/wpas.php');
	require_once('functions/theme.php');
	require_once('functions/post_types.php');
	require_once('functions/menus.php');
	require_once('functions/meta.php');
	require_once('functions/p2p.php');
	require_once('functions/shortcodes.php');
	require_once('functions/widgets.php');
	require_once('functions/users.php');
	require_once('functions/options.php');
	require_once('functions/lessc.inc.php');
	require_once('icons.php');

	add_action('login_form', 'acme_autocomplete_login_form');
	function acme_autocomplete_login_form() {
	    $content = ob_get_contents();
	    ob_end_clean();
	    $content = str_replace('id="user_pass"', 'id="user_pass" autocomplete="off"', $content);
	    echo $content;
	}

	add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_2_years' );

	function keep_me_logged_in_for_2_years( $expirein ) {
	    return 63113904; // 2 years in seconds
	}

	// Custom oEmbed Template
	add_action( 'embed_head', 'embed_styles' );
	function embed_styles() {
		echo '<style>';
		echo '@import "https://fonts.googleapis.com/css?family=Roboto:400,500,700";';
		echo '.wp-embed-footer {display:none !important;}';
		echo '.wp-embed {font-family: "Roboto" !important; color: #222 !important;}';
		echo '.wp-embed-heading {color: #25023B !important;}';
		echo '.wp-embed-featured-image.square {max-width: 100px !important;}';
		echo '</style>';
	}

	// Fix Menu Hightlighting
	add_filter('nav_menu_css_class', 'mytheme_custom_type_nav_class', 10, 2);
	function mytheme_custom_type_nav_class($classes, $item) {
		$post_type = get_post_type();
		if ($post_type != 'post' && $item->object_id == get_option('page_for_posts')) {
			$current_value = "current_page_parent";
			$classes = array_filter($classes, function ($element) use ($current_value) { return ($element != $current_value); } );
		}
		$this_type_class = 'post-type-' . $post_type;
		if (in_array( $this_type_class, $classes )) {
			array_push($classes, 'current_page_parent');
		};

		return $classes;
	}

	// Footer text in Dashboard
	function remove_footer_admin () {
		echo "Barts Cancer Institute Intranet";
	}
	add_filter('admin_footer_text', 'remove_footer_admin');

	// Searches
	function main_search() {
		$args = array();
		$args['wp_query'] = array(
			'post_type' => array('page', 'post', 'tribe_events', 'centre', 'doc'),
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$args['form'] = array(
			'auto_submit' => false
		);
		$args['form']['ajax'] = array(
			'enabled' => true,
			'show_default_results' => false,
			'results_template' => 'searches/template-ajax-results.php',
			'button_text' => 'Load More Results'
		);
		$args['fields'][] = array(
			'type' => 'search',
			'placeholder' => 'Enter search terms'
		);
		$args['fields'][] = array(
			'type' => 'submit',
			'class' => 'button',
			'value' => 'Search'
		);
		$args['fields'][] = array(
			'type' => 'reset',
			'class' => 'button',
			'value' => 'Reset'
		);
		$args['fields'][] = array(
			'type' => 'post_type',
			'format' => 'checkbox',
			'label' => 'Search by:',
			'values' => array('page' => '<i class="nav-file"></i> Pages', 'centre' => '<i class="nav-office"></i> Centres', 'post' => '<i class="nav-newspaper"></i> News', 'tribe_events' => '<i class="nav-calendar"></i> Events', 'doc' => '<i class="nav-file-text-o"></i> Documents') ,
			'default_all' => true
		);
		$args['fields'][] = array(
			'type' => 'posts_per_page',
			'format' => 'select',
			'label' => 'Results per page',
			'values' => array(10=>10, 20=>20, 50=>50, 100=>100),
			'default' => 10
		);
		register_wpas_form('mainsearch', $args);
	}
	add_action('init', 'main_search');

	function antibody_search() {
		$args = array();
		$args['wp_query'] = array( 'post_type' => array('antibody'),
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$args['form'] = array(
			'auto_submit' => false
		);
		$args['form']['ajax'] = array(
			'enabled' => true,
			'show_default_results' => false,
			'results_template' => 'searches/antibody-ajax.php',
			'button_text' => 'Load More Results'
		);
		$args['fields'][] = array(
			'type' => 'search',
			'placeholder' => 'Enter search terms'
		);
		$args['fields'][] = array(
			'type' => 'submit',
			'class' => 'button',
			'value' => 'Search'
		);
		$args['fields'][] = array(
			'type' => 'reset',
			'class' => 'button',
			'value' => 'Reset'
		);
		$args['fields'][] = array(
			'type' => 'posts_per_page',
			'format' => 'select',
			'label' => 'Results per page',
			'values' => array(10=>10, 20=>20, 50=>50, 100=>100),
			'default' => 10
		);
		register_wpas_form('antibody', $args);
		}
	add_action('init', 'antibody_search');

	function cell_search() {
		$args = array();
		$args['wp_query'] = array( 'post_type' => array('cell_line'),
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$args['form'] = array(
			'auto_submit' => false
		);
		$args['form']['ajax'] = array(
			'enabled' => true,
			'show_default_results' => false,
			'results_template' => 'searches/cell-ajax.php',
			'button_text' => 'Load More Results'
		);
		$args['fields'][] = array(
			'type' => 'search',
			'placeholder' => 'Enter search terms'
		);
		$args['fields'][] = array(
			'type' => 'submit',
			'class' => 'button',
			'value' => 'Search'
		);
		$args['fields'][] = array(
			'type' => 'reset',
			'class' => 'button',
			'value' => 'Reset'
		);
		$args['fields'][] = array(
			'type' => 'posts_per_page',
			'format' => 'select',
			'label' => 'Results per page',
			'values' => array(10=>10, 20=>20, 50=>50, 100=>100),
			'default' => 10
		);
		register_wpas_form('cell', $args);
		}
	add_action('init', 'cell_search');

	function equip_search() {
		$args = array();
		$args['wp_query'] = array( 'post_type' => array('equipment'),
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$args['form'] = array(
			'auto_submit' => false
		);
		$args['form']['ajax'] = array(
			'enabled' => true,
			'show_default_results' => false,
			'results_template' => 'searches/equipment-ajax.php',
			'button_text' => 'Load More Results'
		);
		$args['fields'][] = array(
			'type' => 'search',
			'placeholder' => 'Enter search terms'
		);
		$args['fields'][] = array(
			'type' => 'submit',
			'class' => 'button',
			'value' => 'Search'
		);
		$args['fields'][] = array(
			'type' => 'reset',
			'class' => 'button',
			'value' => 'Reset'
		);
		$args['fields'][] = array(
			'type' => 'posts_per_page',
			'format' => 'select',
			'label' => 'Results per page',
			'values' => array(10=>10, 20=>20, 50=>50, 100=>100),
			'default' => 10
		);
		register_wpas_form('equipment', $args);
		}
	add_action('init', 'equip_search');

	function recent_posts($no_posts = 1) {
		global $wpdb;
		$request = "SELECT ID, post_title, post_content FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='announcement' ORDER BY post_date DESC LIMIT $no_posts";
		$posts = $wpdb->get_results($request);
		if($posts) {
			foreach ($posts as $posts) {
				$post_title = stripslashes($posts->post_title);
				$text = bci_get_option('text');
				$bg = bci_get_option('bg');
				$permalink = get_permalink($posts->ID);
				$output .= '<div id="announcement" class="' . $text . '-text ' . $bg . '">';
				$output .= '<style>#announcement:before, #announcement #announcementClose a, header.site-header #announcement a {color:' . $text . '} #announcement:before {content: "\ea0c"; font-family: \'nav\'; font-size: 2rem; display: block; float: left; margin: 0.2em 1em 0 0;}</style>';
				$output .= '<div id="announcementClose">';
				$output .= '<i class="nav-close2"></i>';
				$output .= '</div>';
				$output .= '<div>';
				$output .= '<h2>' . htmlspecialchars($post_title, ENT_COMPAT) . '</h2>';
				$output .= stripslashes($posts->post_content);
				$output .= '</div>';
				$output .= '</div>';
			}
		} else {
		}
		echo $output;
	}

	function has_announcements() {
		global $wpdb;
		$request = "SELECT ID, post_title, post_content FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='announcement' ORDER BY post_date DESC LIMIT 1";
		$posts = $wpdb->get_results($request);
		if($posts) {
			$output .=  ' announcements';
		}
		echo $output;
	}