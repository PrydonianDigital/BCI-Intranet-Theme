<?php

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


	// Custom oEmbed Template
	add_action( 'embed_head', 'embed_styles' );
	function embed_styles() {
		echo '<style>';
		echo '@import "https://fonts.googleapis.com/css?family=Roboto:400,500,700";';
		echo '.wp-embed-footer {display:none !important;}';
		echo '.wp-embed {font-family: "Roboto" !important; color: #222 !important;}';
		echo '.wp-embed-heading {color: #25023B !important;}';
		echo '</style>';
	}

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