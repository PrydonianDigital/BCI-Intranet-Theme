<?php

	// Post Types
	function app() {
		$labels = array(
			'name'                  => _x( 'Apps', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'App', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Apps', 'bci' ),
			'name_admin_bar'        => __( 'App', 'bci' ),
			'archives'              => __( 'App Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent App:', 'bci' ),
			'all_items'             => __( 'All Apps', 'bci' ),
			'add_new_item'          => __( 'Add New App', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New App', 'bci' ),
			'edit_item'             => __( 'Edit App', 'bci' ),
			'update_item'           => __( 'Update App', 'bci' ),
			'view_item'             => __( 'View App', 'bci' ),
			'search_items'          => __( 'Search App', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'App', 'bci' ),
			'description'           => __( 'Apps', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'page-attributes'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       => true,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-grid-view'
		);
		register_post_type( 'app', $args );
	}
	add_action( 'init', 'app', 0 );

	function announcement() {
		$labels = array(
			'name'                  => _x( 'Announcements', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'Announcement', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Announcements', 'bci' ),
			'name_admin_bar'        => __( 'Announcement', 'bci' ),
			'archives'              => __( 'Announcements Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent Announcement:', 'bci' ),
			'all_items'             => __( 'All Announcements', 'bci' ),
			'add_new_item'          => __( 'Add New Announcement', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New Announcement', 'bci' ),
			'edit_item'             => __( 'Edit Announcement', 'bci' ),
			'update_item'           => __( 'Update Announcement', 'bci' ),
			'view_item'             => __( 'View Announcement', 'bci' ),
			'search_items'          => __( 'Search Announcements', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'Announcement', 'bci' ),
			'description'           => __( 'Announcements', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       => true,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-info'
		);
		register_post_type( 'announcement', $args );
	}
	add_action( 'init', 'announcement', 0 );

	function newsletter() {
		$labels = array(
			'name'                  => _x( 'Newsletters', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'Newsletter', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Newsletters', 'bci' ),
			'name_admin_bar'        => __( 'Newsletter', 'bci' ),
			'archives'              => __( 'Newsletters Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent Newsletter:', 'bci' ),
			'all_items'             => __( 'All Newsletters', 'bci' ),
			'add_new_item'          => __( 'Add New Newsletter', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New Newsletter', 'bci' ),
			'edit_item'             => __( 'Edit Newsletter', 'bci' ),
			'update_item'           => __( 'Update Newsletter', 'bci' ),
			'view_item'             => __( 'View Newsletter', 'bci' ),
			'search_items'          => __( 'Search Newsletters', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'Newsletter', 'bci' ),
			'description'           => __( 'Newsletters', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', 'excerpt', 'page-attributes' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       	=> true,
			'rest_base'				=> 'Newsletter',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-newspaper'

		);
		register_post_type( 'newsletter', $args );
	}
	add_action( 'init', 'newsletter', 0 );

	function centre() {
		$labels = array(
			'name'                  => _x( 'Centres', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'Centre', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Centres', 'bci' ),
			'name_admin_bar'        => __( 'Centre', 'bci' ),
			'archives'              => __( 'Centres Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent Centre:', 'bci' ),
			'all_items'             => __( 'All Centres', 'bci' ),
			'add_new_item'          => __( 'Add New Centre', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New Centre', 'bci' ),
			'edit_item'             => __( 'Edit Centre', 'bci' ),
			'update_item'           => __( 'Update Centre', 'bci' ),
			'view_item'             => __( 'View Centre', 'bci' ),
			'search_items'          => __( 'Search Centres', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'Centre', 'bci' ),
			'description'           => __( 'Centres', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail','excerpt', 'page-attributes'   ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       	=> true,
			'rest_base'				=> 'centre',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-building'

		);
		register_post_type( 'centre', $args );
	}
	add_action( 'init', 'centre', 0 );

	function notice() {
		$labels = array(
			'name'                  => _x( 'Notices', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'Notice', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Notices', 'bci' ),
			'name_admin_bar'        => __( 'Notice', 'bci' ),
			'archives'              => __( 'Notices Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent Notice:', 'bci' ),
			'all_items'             => __( 'All Notices', 'bci' ),
			'add_new_item'          => __( 'Add New Notice', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New Notice', 'bci' ),
			'edit_item'             => __( 'Edit Notice', 'bci' ),
			'update_item'           => __( 'Update Notice', 'bci' ),
			'view_item'             => __( 'View Notice', 'bci' ),
			'search_items'          => __( 'Search Notices', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'Notice', 'bci' ),
			'description'           => __( 'Notices', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail','excerpt', 'page-attributes'   ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       	=> true,
			'rest_base'				=> 'notice',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-art'

		);
		register_post_type( 'notice', $args );
	}
	add_action( 'init', 'notice', 0 );

	function PotW() {
		$labels = array(
			'name'                  => _x( 'Pictures of the Week', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'Picture of the Week', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Pictures of the Week', 'bci' ),
			'name_admin_bar'        => __( 'Pictures of the Week', 'bci' ),
			'archives'              => __( 'Picture of the Week Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent Picture of the Week:', 'bci' ),
			'all_items'             => __( 'All Pictures of the Week', 'bci' ),
			'add_new_item'          => __( 'Add New Picture of the Week', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New Picture of the WeekotW', 'bci' ),
			'edit_item'             => __( 'Edit Picture of the Week', 'bci' ),
			'update_item'           => __( 'Update Picture of the Week', 'bci' ),
			'view_item'             => __( 'View Picture of the Week', 'bci' ),
			'search_items'          => __( 'Search Picture of the Week', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'Pictures of the Week', 'bci' ),
			'description'           => __( 'Picture of the Week', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       	=> true,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-format-image'
		);
		register_post_type( 'potw', $args );
	}
	add_action( 'init', 'PotW', 0 );

	function PotM() {
		$labels = array(
			'name'                  => _x( 'Papers of the Month', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'Paper of the Month', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Papers of the Month', 'bci' ),
			'name_admin_bar'        => __( 'Papers of the Month', 'bci' ),
			'archives'              => __( 'Paper of the Month Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent Paper of the Month:', 'bci' ),
			'all_items'             => __( 'All Papers of the Month', 'bci' ),
			'add_new_item'          => __( 'Add New Paper of the Month', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New Paper of the MonthotW', 'bci' ),
			'edit_item'             => __( 'Edit Paper of the Month', 'bci' ),
			'update_item'           => __( 'Update Paper of the Month', 'bci' ),
			'view_item'             => __( 'View Paper of the Month', 'bci' ),
			'search_items'          => __( 'Search Paper of the Month', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'Papers of the Month', 'bci' ),
			'description'           => __( 'Paper of the Month', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       	=> true,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-analytics'
		);
		register_post_type( 'potm', $args );
	}
	add_action( 'init', 'PotM', 0 );

	function antibody() {
		$labels = array(
			'name'                  => _x( 'Antibodies', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'Antibody', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Antibodies', 'bci' ),
			'name_admin_bar'        => __( 'Antibody', 'bci' ),
			'archives'              => __( 'Antibodies Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent Antibody:', 'bci' ),
			'all_items'             => __( 'All Antibodies', 'bci' ),
			'add_new_item'          => __( 'Add New Antibody', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New Antibody', 'bci' ),
			'edit_item'             => __( 'Edit Antibody', 'bci' ),
			'update_item'           => __( 'Update Antibody', 'bci' ),
			'view_item'             => __( 'View Antibody', 'bci' ),
			'search_items'          => __( 'Search Antibodies', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'Antibody', 'bci' ),
			'description'           => __( 'Antibodies', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       	=> true,
			'rest_base'				=> 'antibody',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-image-filter'
		);
		register_post_type( 'antibody', $args );
	}
	add_action( 'init', 'antibody', 0 );

	function cell_line() {
		$labels = array(
			'name'                  => _x( 'Cell Lines', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'Cell Line', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Cell Lines', 'bci' ),
			'name_admin_bar'        => __( 'Cell Line', 'bci' ),
			'archives'              => __( 'Cell Lines Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent Cell Line:', 'bci' ),
			'all_items'             => __( 'All Cell Lines', 'bci' ),
			'add_new_item'          => __( 'Add New Cell Line', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New Cell Line', 'bci' ),
			'edit_item'             => __( 'Edit Cell Line', 'bci' ),
			'update_item'           => __( 'Update Cell Line', 'bci' ),
			'view_item'             => __( 'View Cell Line', 'bci' ),
			'search_items'          => __( 'Search Cell Lines', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'Cell Line', 'bci' ),
			'description'           => __( 'Cell Lines', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       	=> true,
			'rest_base'				=> 'Cell Line',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-share-alt'
		);
		register_post_type( 'cell_line', $args );
	}
	add_action( 'init', 'cell_line', 0 );

	function equipment() {
		$labels = array(
			'name'                  => _x( 'Equipment', 'Post Type General Name', 'bci' ),
			'singular_name'         => _x( 'Equipment', 'Post Type Singular Name', 'bci' ),
			'menu_name'             => __( 'Equipment', 'bci' ),
			'name_admin_bar'        => __( 'Equipment', 'bci' ),
			'archives'              => __( 'Equipment Archives', 'bci' ),
			'parent_item_colon'     => __( 'Parent Equipment:', 'bci' ),
			'all_items'             => __( 'All Equipment', 'bci' ),
			'add_new_item'          => __( 'Add New Equipment', 'bci' ),
			'add_new'               => __( 'Add New', 'bci' ),
			'new_item'              => __( 'New Equipment', 'bci' ),
			'edit_item'             => __( 'Edit Equipment', 'bci' ),
			'update_item'           => __( 'Update Equipment', 'bci' ),
			'view_item'             => __( 'View Equipment', 'bci' ),
			'search_items'          => __( 'Search Equipment', 'bci' ),
			'not_found'             => __( 'Not found', 'bci' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'bci' ),
			'featured_image'        => __( 'Featured Image', 'bci' ),
			'set_featured_image'    => __( 'Set featured image', 'bci' ),
			'remove_featured_image' => __( 'Remove featured image', 'bci' ),
			'use_featured_image'    => __( 'Use as featured image', 'bci' ),
			'insert_into_item'      => __( 'Insert into item', 'bci' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'bci' ),
			'items_list'            => __( 'Items list', 'bci' ),
			'items_list_navigation' => __( 'Items list navigation', 'bci' ),
			'filter_items_list'     => __( 'Filter items list', 'bci' ),
		);
		$args = array(
			'label'                 => __( 'Equipment', 'bci' ),
			'description'           => __( 'Equipment', 'bci' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'       	=> true,
			'rest_base'				=> 'Equipment',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_icon'				=> 'dashicons-layout'
		);
		register_post_type( 'equipment', $args );
	}
	add_action( 'init', 'equipment', 0 );

	// Columns for Centres
	add_filter( 'manage_edit-centre_columns', 'my_edit_centre_columns' ) ;
	function my_edit_centre_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title' ),
			'lead' => __( 'Centre Lead' ),
			'link' => __( 'Centre Link' ),
		);
		return $columns;
	}

	add_action( 'manage_centre_posts_custom_column', 'my_manage_centre_columns', 10, 2 );
	function my_manage_centre_columns( $column, $post_id ) {
		global $post;
		switch( $column ) {
			case 'lead' :
				$lead = get_post_meta( $post_id, '_centre_lead', true );
				if ( empty( $lead ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $lead );
				break;
			case 'link' :
				$link = get_post_meta( $post_id, '_centre_link', true );
				if ( empty( $link ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $link );
				break;
			default :
				break;
		}
	}

	add_filter( 'manage_edit-centre_sortable_columns', 'my_centre_sortable_columns' );
	function my_centre_sortable_columns( $columns ) {
		$columns['lead'] = 'lead';
		$columns['link'] = 'link';
		return $columns;
	}

	// Columns for Apps
	add_filter( 'manage_edit-app_columns', 'my_edit_app_columns' ) ;
	function my_edit_app_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title' ),
			'icon' => __( 'Icon' ),
			'colour' => __( 'Colour' ),
			'link' => __( 'Link' ),
		);
		return $columns;
	}

	add_action( 'manage_app_posts_custom_column', 'my_manage_app_columns', 10, 2 );
	function my_manage_app_columns( $column, $post_id ) {
		global $post;
		switch( $column ) {
			case 'icon' :
				$icon = get_post_meta( $post_id, '_app_icon', true );
				if ( empty( $icon ) )
					echo __( '—' );
				else
					printf( __( '<i class="%s"></i>' ), $icon );
				break;
			case 'colour' :
				$colour = get_post_meta( $post_id, '_app_colour', true );
				if ( empty( $colour ) )
					echo __( '—' );
				else
					printf( __( '<div style="background: %s; width: 20px; height: 20px; border: 1px solid #777;"></div>' ), $colour );
				break;
			case 'link' :
				$link = get_post_meta( $post_id, '_app_link', true );
				if ( empty( $link ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $link );
				break;
			default :
				break;
		}
	}

	add_filter( 'manage_edit-app_sortable_columns', 'my_app_sortable_columns' );
	function my_app_sortable_columns( $columns ) {
		$columns['icon'] = 'icon';
		$columns['colour'] = 'colour';
		$columns['link'] = 'link';
		return $columns;
	}

	// Columns for Antibodies
	add_filter( 'manage_edit-antibody_columns', 'my_edit_antibody_columns' ) ;
	function my_edit_antibody_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title' ),
			'contact' => __( 'Contact' ),
			'centre' => __( 'Centre' ),
			'comment' => __( 'Comment' ),
			'company' => __( 'Company' ),
			'catalogue' => __( 'Catalogue' )
		);
		return $columns;
	}

	add_action( 'manage_antibody_posts_custom_column', 'my_manage_antibody_columns', 10, 2 );
	function my_manage_antibody_columns( $column, $post_id ) {
		global $post;
		switch( $column ) {
			case 'contact' :
				$contact = get_post_meta( $post_id, '_anti_user', true );
				if ( empty( $contact ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $contact );
				break;
			case 'centre' :
				$centre = get_post_meta( $post_id, '_anti_centre', true );
				if ( empty( $centre ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $centre );
				break;
			case 'comment' :
				$comment = get_post_meta( $post_id, '_anti_comment', true );
				if ( empty( $comment ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $comment );
				break;
			case 'company' :
				$company = get_post_meta( $post_id, '_anti_company', true );
				if ( empty( $company ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $company );
				break;
			case 'catalogue' :
				$catalogue = get_post_meta( $post_id, '_anti_catalogue', true );
				if ( empty( $catalogue ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $catalogue );
				break;
			default :
				break;
		}
	}

	add_filter( 'manage_edit-antibody_sortable_columns', 'my_antibody_sortable_columns' );
	function my_antibody_sortable_columns( $columns ) {
		$columns['contact'] = 'contact';
		$columns['centre'] = 'centre';
		$columns['comment'] = 'comment';
		$columns['company'] = 'company';
		$columns['catalogue'] = 'catalogue';
		return $columns;
	}

	// Columns for Cell Lines
	add_filter( 'manage_edit-cell_line_columns', 'my_edit_cell_line_columns' ) ;
	function my_edit_cell_line_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title' ),
			'contact' => __( 'Contact' ),
			'centre' => __( 'Centre' ),
			'comment' => __( 'Comment' ),
			'atcc' => __( 'ATCC' ),
			'str' => __( 'STR Profiled' )
		);
		return $columns;
	}

	add_action( 'manage_cell_line_posts_custom_column', 'my_manage_cell_line_columns', 10, 2 );
	function my_manage_cell_line_columns( $column, $post_id ) {
		global $post;
		switch( $column ) {
			case 'contact' :
				$contact = get_post_meta( $post_id, '_cell_user', true );
				if ( empty( $contact ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $contact );
				break;
			case 'centre' :
				$centre = get_post_meta( $post_id, '_cell_centre', true );
				if ( empty( $centre ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $centre );
				break;
			case 'comment' :
				$comment = get_post_meta( $post_id, '_cell_comment', true );
				if ( empty( $comment ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $comment );
				break;
			case 'atcc' :
				$atcc = get_post_meta( $post_id, '_cell_atcc', true );
				if ( empty( $atcc ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $atcc );
				break;
			case 'str' :
				$str = get_post_meta( $post_id, '_cell_str', true );
				if ( empty( $str ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $str );
				break;
			default :
				break;
		}
	}

	add_filter( 'manage_edit-cell_line_sortable_columns', 'my_cell_line_sortable_columns' );
	function my_cell_line_sortable_columns( $columns ) {
		$columns['contact'] = 'contact';
		$columns['centre'] = 'centre';
		$columns['comment'] = 'comment';
		$columns['atcc'] = 'atcc';
		$columns['str'] = 'str';
		return $columns;
	}

	// Columns for Equipment
	add_filter( 'manage_edit-equipment_columns', 'my_edit_equipment_columns' ) ;
	function my_edit_equipment_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title' ),
			'room' => __( 'Room #' ),
			'centre' => __( 'Centre' ),
			'contact' => __( 'Contact' ),
			'share' => __( 'Equipment for Shared Use' )
		);
		return $columns;
	}

	add_action( 'manage_equipment_posts_custom_column', 'my_manage_equipment_columns', 10, 2 );
	function my_manage_equipment_columns( $column, $post_id ) {
		global $post;
		switch( $column ) {
			case 'room' :
				$room = get_post_meta( $post_id, '_equip_room', true );
				if ( empty( $room ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $room );
				break;
			case 'centre' :
				$centre = get_post_meta( $post_id, '_equip_centre', true );
				if ( empty( $centre ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $centre );
				break;
			case 'contact' :
				$contact = get_post_meta( $post_id, '_equip_user', true );
				if ( empty( $contact ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $contact );
				break;
			case 'share' :
				$share = get_post_meta( $post_id, '_equip_share', true );
				if ( empty( $share ) )
					echo __( '—' );
				else
					printf( __( '%s' ), $share );
				break;
			default :
				break;
		}
	}

	add_filter( 'manage_edit-equipment_sortable_columns', 'my_equipment_sortable_columns' );
	function my_equipment_sortable_columns( $columns ) {
		$columns['room'] = 'room';
		$columns['centre'] = 'centre';
		$columns['contact'] = 'contact';
		$columns['share'] = 'share';
		return $columns;
	}

	// Columns for Documents
	add_filter( 'manage_edit-document_columns', 'my_edit_document_columns' ) ;
	function my_edit_document_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Title' ),
			'doccat' => __( 'Document Categories' )
		);
		return $columns;
	}

	add_action( 'manage_document_posts_custom_column', 'my_manage_document_columns', 10, 2 );
	function my_manage_document_columns( $column, $post_id ) {
		global $post;
		switch( $column ) {
			case 'doccat' :
				$terms = get_the_terms( $post_id, 'doc_cat' );
				if ( !empty( $terms ) ) {
					$out = array();
					foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'doc_cat' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'doc_cat', 'display' ) )
					);
				}

				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
				} else {
					_e( '—' );
				}
				break;
			default :
				break;
		}
	}

	add_filter( 'manage_edit-document_sortable_columns', 'my_document_sortable_columns' );
	function my_document_sortable_columns( $columns ) {
		$columns['doccat'] = 'doccat';
		return $columns;
	}

	// Newsletter Taxonomy
	function newsletter_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Newsletter Categories', 'Taxonomy General Name', 'bci' ),
			'singular_name'              => _x( 'Newsletter Category', 'Taxonomy Singular Name', 'bci' ),
			'menu_name'                  => __( 'Categories', 'bci' ),
			'all_items'                  => __( 'All Categories', 'bci' ),
			'parent_item'                => __( 'Parent Category', 'bci' ),
			'parent_item_colon'          => __( 'Parent Category:', 'bci' ),
			'new_item_name'              => __( 'New Category', 'bci' ),
			'add_new_item'               => __( 'Add New Category', 'bci' ),
			'edit_item'                  => __( 'Edit Category', 'bci' ),
			'update_item'                => __( 'Update Category', 'bci' ),
			'view_item'                  => __( 'View Category', 'bci' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'bci' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'bci' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'bci' ),
			'popular_items'              => __( 'Popular Items', 'bci' ),
			'search_items'               => __( 'Search Items', 'bci' ),
			'not_found'                  => __( 'Not Found', 'bci' ),
			'no_terms'                   => __( 'No items', 'bci' ),
			'items_list'                 => __( 'Items list', 'bci' ),
			'items_list_navigation'      => __( 'Items list navigation', 'bci' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'news_cat', array( 'newsletter' ), $args );
	}
	add_action( 'init', 'newsletter_taxonomy', 0 );

	// Document Taxonomy
	function document_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Document Categories', 'Taxonomy General Name', 'bci' ),
			'singular_name'              => _x( 'Document Category', 'Taxonomy Singular Name', 'bci' ),
			'menu_name'                  => __( 'Categories', 'bci' ),
			'all_items'                  => __( 'All Categories', 'bci' ),
			'parent_item'                => __( 'Parent Category', 'bci' ),
			'parent_item_colon'          => __( 'Parent Category:', 'bci' ),
			'new_item_name'              => __( 'New Category', 'bci' ),
			'add_new_item'               => __( 'Add New Category', 'bci' ),
			'edit_item'                  => __( 'Edit Category', 'bci' ),
			'update_item'                => __( 'Update Category', 'bci' ),
			'view_item'                  => __( 'View Category', 'bci' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'bci' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'bci' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'bci' ),
			'popular_items'              => __( 'Popular Items', 'bci' ),
			'search_items'               => __( 'Search Items', 'bci' ),
			'not_found'                  => __( 'Not Found', 'bci' ),
			'no_terms'                   => __( 'No items', 'bci' ),
			'items_list'                 => __( 'Items list', 'bci' ),
			'items_list_navigation'      => __( 'Items list navigation', 'bci' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'doc_cat', array( 'document' ), $args );
	}
	add_action( 'init', 'document_taxonomy', 0 );

	// Venue Taxonomy
	function venue_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Venue Categories', 'Taxonomy General Name', 'bci' ),
			'singular_name'              => _x( 'Venue Category', 'Taxonomy Singular Name', 'bci' ),
			'menu_name'                  => __( 'Categories', 'bci' ),
			'all_items'                  => __( 'All Categories', 'bci' ),
			'parent_item'                => __( 'Parent Category', 'bci' ),
			'parent_item_colon'          => __( 'Parent Category:', 'bci' ),
			'new_item_name'              => __( 'New Category', 'bci' ),
			'add_new_item'               => __( 'Add New Category', 'bci' ),
			'edit_item'                  => __( 'Edit Category', 'bci' ),
			'update_item'                => __( 'Update Category', 'bci' ),
			'view_item'                  => __( 'View Category', 'bci' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'bci' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'bci' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'bci' ),
			'popular_items'              => __( 'Popular Items', 'bci' ),
			'search_items'               => __( 'Search Items', 'bci' ),
			'not_found'                  => __( 'Not Found', 'bci' ),
			'no_terms'                   => __( 'No items', 'bci' ),
			'items_list'                 => __( 'Items list', 'bci' ),
			'items_list_navigation'      => __( 'Items list navigation', 'bci' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'venue_cat', array( 'tribe_venue' ), $args );
	}
	add_action( 'init', 'venue_taxonomy', 0 );

	// Notice Taxonomy
	function notice_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Notice Categories', 'Taxonomy General Name', 'bci' ),
			'singular_name'              => _x( 'Notice Category', 'Taxonomy Singular Name', 'bci' ),
			'menu_name'                  => __( 'Categories', 'bci' ),
			'all_items'                  => __( 'All Categories', 'bci' ),
			'parent_item'                => __( 'Parent Category', 'bci' ),
			'parent_item_colon'          => __( 'Parent Category:', 'bci' ),
			'new_item_name'              => __( 'New Category', 'bci' ),
			'add_new_item'               => __( 'Add New Category', 'bci' ),
			'edit_item'                  => __( 'Edit Category', 'bci' ),
			'update_item'                => __( 'Update Category', 'bci' ),
			'view_item'                  => __( 'View Category', 'bci' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'bci' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'bci' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'bci' ),
			'popular_items'              => __( 'Popular Items', 'bci' ),
			'search_items'               => __( 'Search Items', 'bci' ),
			'not_found'                  => __( 'Not Found', 'bci' ),
			'no_terms'                   => __( 'No items', 'bci' ),
			'items_list'                 => __( 'Items list', 'bci' ),
			'items_list_navigation'      => __( 'Items list navigation', 'bci' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'notice_cat', array( 'notice' ), $args );
	}
	add_action( 'init', 'notice_taxonomy', 0 );