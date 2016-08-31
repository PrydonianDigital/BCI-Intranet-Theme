<?php

	// Theme Options
	if ( ! isset( $content_width ) )
		$content_width = 600;

	function bcc_theme()	{
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'slider', '815', '228', true );
		add_image_size( 'header', '1172', '200', true );
		add_image_size( 'display', '300', '250', true );
		add_image_size( 'thumbnail-news', '227', '108', true );
		add_theme_support( 'title-tag' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'start_post_rel_link' );
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'adjacent_posts_rel_link' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		show_admin_bar( false );
		add_theme_support('custom-logo', array(
			'height'		=> 125,
			'width'			=> 180,
			'flex-width' 	=> true,
		));
	}
	add_action( 'after_setup_theme', 'bcc_theme' );

	if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(
			array(
				'label' => 'Square Feed Featured Image',
				'id' => 'secondary-image',
				'post_type' => 'post'
			)
		);
	}

	function bci_news_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'News';
		$submenu['edit.php'][5][0] = 'News';
		$submenu['edit.php'][10][0] = 'Add News';
		$submenu['edit.php'][16][0] = 'News Tags';
	}
	function bci_news_object() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'News';
		$labels->singular_name = 'News';
		$labels->add_new = 'Add News';
		$labels->add_new_item = 'Add News';
		$labels->edit_item = 'Edit News';
		$labels->new_item = 'News';
		$labels->view_item = 'View News';
		$labels->search_items = 'Search News';
		$labels->not_found = 'No News found';
		$labels->not_found_in_trash = 'No News found in Trash';
		$labels->all_items = 'All News';
		$labels->menu_name = 'News';
		$labels->name_admin_bar = 'News';
	}
	add_action( 'admin_menu', 'bci_news_label' );
	add_action( 'init', 'bci_news_object' );

	function bci_editor_styles() {
		add_editor_style( 'bci-editor-style.css' );
	}
	add_action( 'admin_init', 'bci_editor_styles' );

	function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
		}
		return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );

	function bci_js() {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script('owl-carousel-js', get_template_directory_uri().'/js/owl.js', array( 'jquery' ), '2.0', true);
		wp_register_script( 'select', get_template_directory_uri() . '/js/select2.min.js', false, '4.0.2', true );
		wp_register_script( 'tour', get_template_directory_uri() . '/js/tour.js', false, '0.10.3', true );
		wp_register_script( 'bci', get_template_directory_uri() . '/js/bci.js', false, '1.0', true );
		wp_enqueue_script( 'owl-carousel-js' );
		wp_enqueue_script( 'select' );
		wp_enqueue_script( 'tour' );
		wp_enqueue_script( 'bci' );
	}
	add_action( 'wp_enqueue_scripts', 'bci_js' );

	function tour() {
		wp_register_style( 'tour', get_template_directory_uri() . '/css/tour.css', false, '0.10.3' );
		wp_enqueue_style( 'tour' );
	}
	add_action( 'wp_enqueue_scripts', 'tour' );

	function fontawesome_dashboard() {
		wp_enqueue_style('apps', get_template_directory_uri() . '/css/nav.css', '', '4.5.0', 'all');
	}
	add_action('admin_init', 'fontawesome_dashboard');

	add_action('admin_head', 'my_custom_fonts');
	function my_custom_fonts() {
		echo '<style> .menu-item-edit-active .menu-item-settings { overflow: hidden !important; } .cmb2_select { font-family: "nav"; } #tagsdiv-link_category { display: none; } </style>';
	}

	function wpdocs_custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}

	add_filter( 'image_send_to_editor',
		function( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
			if( current_theme_supports( 'html5' ) && ! $caption )
				$html = sprintf( '<figure>%s</figure>', $html );
			return $html;
		}
	, 10, 8 );

	function annointed_admin_bar_remove() {
			global $wp_admin_bar;
	 		$wp_admin_bar->remove_menu('wp-logo');
	}
	add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

function bci_update_messages( $messages ) {
	global $post, $post_ID;
	$post_types = get_post_types( array( 'show_ui' => true, '_builtin' => false ), 'objects' );
	foreach( $post_types as $post_type => $post_object ) {
		$messages[$post_type] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf( __( '%s updated. <a href="%s">View %s</a>' ), $post_object->labels->singular_name, esc_url( get_permalink( $post_ID ) ), $post_object->labels->singular_name ),
			2  => __( 'Custom field updated.' ),
			3  => __( 'Custom field deleted.' ),
			4  => sprintf( __( '%s updated.' ), $post_object->labels->singular_name ),
			5  => isset( $_GET['revision']) ? sprintf( __( '%s restored to revision from %s' ), $post_object->labels->singular_name, wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => sprintf( __( '%s published. <a href="%s">View %s</a>' ), $post_object->labels->singular_name, esc_url( get_permalink( $post_ID ) ), $post_object->labels->singular_name ),
			7  => sprintf( __( '%s saved.' ), $post_object->labels->singular_name ),
			8  => sprintf( __( '%s submitted. <a target="_blank" href="%s">Preview %s</a>'), $post_object->labels->singular_name, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ), $post_object->labels->singular_name ),
			9  => sprintf( __( '%s scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview %s</a>'), $post_object->labels->singular_name, date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ), $post_object->labels->singular_name ),
			10 => sprintf( __( '%s draft updated. <a target="_blank" href="%s">Preview %s</a>'), $post_object->labels->singular_name, esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ), $post_object->labels->singular_name ),
		);
	}
	return $messages;
}
add_filter( 'post_updated_messages', 'bci_update_messages' );


	if (!function_exists('is_admin')) {
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
	}
	if (!class_exists("Custom_Post_Type_Archive_Menu_Links")) :
	class Custom_Post_Type_Archive_Menu_Links {
		public static function init(){
		add_action( 'admin_head-nav-menus.php', array(__CLASS__, 'inject_cpt_archives_menu_meta_box' ));
		add_filter( 'wp_get_nav_menu_items', array(__CLASS__, 'cpt_archive_menu_filter'), 10, 3 );
		}
		public static function inject_cpt_archives_menu_meta_box() {
		add_meta_box( 'add-cpt', __( 'Other Post Types', 'default' ), array(__CLASS__, 'wp_nav_menu_cpt_archives_meta_box'), 'nav-menus', 'side', 'default' );
		}
		public static function wp_nav_menu_cpt_archives_meta_box() {
		global $nav_menu_selected_id;
		$post_types = get_post_types( array( 'show_in_nav_menus' => true, 'has_archive' => true ), 'object' );
		foreach ( $post_types as &$post_type ) {
			$post_type->classes = array();
			$post_type->type = $post_type->name;
			$post_type->object_id = $post_type->name;
			$post_type->title = $post_type->labels->name;
			$post_type->object = 'cpt-archive';
			$post_type->menu_item_parent = 0;
			$post_type->url = 0;
			$post_type->target = 0;
			$post_type->attr_title = 0;
			$post_type->xfn = 0;
			$post_type->db_id = 0;
		}
		$walker = new Walker_Nav_Menu_Checklist( array() );
		?>
		<div id="cpt-archive" class="posttypediv">
			<div id="tabs-panel-cpt-archive" class="tabs-panel tabs-panel-active">
			<ul id="ctp-archive-checklist" class="categorychecklist form-no-clear">
				<?php
				echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $post_types), 0, (object) array( 'walker' => $walker) );
				?>
			</ul>
			</div><!-- /.tabs-panel -->
		</div>
		<p class="button-controls">
			<span class="add-to-menu">
			<img class="waiting" src="<?php echo esc_url( admin_url( 'images/wpspin_light.gif' ) ); ?>" alt="" />
			<input type="submit"<?php disabled( $nav_menu_selected_id, 0 ); ?> class="button-secondary submit-add-to-menu" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-ctp-archive-menu-item" id="submit-cpt-archive" />
			</span>
		</p>
		<?php
		}
		public static function cpt_archive_menu_filter( $items, $menu, $args ) {
		foreach ( $items as &$item ) {
			if ( $item->object != 'cpt-archive' ) continue;
			$item->url = get_post_type_archive_link( $item->type );
			if ( get_query_var( 'post_type' ) == $item->type ) {
			$item->classes []= 'current-menu-item';
			$item->current = true;
			}
		}
		return $items;
		}
	} // end class
	endif;
	if (class_exists("Custom_Post_Type_Archive_Menu_Links")) Custom_Post_Type_Archive_Menu_Links::init();

	add_action( 'dashboard_glance_items', 'cor_right_now_content_table_end' );
	function cor_right_now_content_table_end() {
		$args = array(
			'public' => true,
			'_builtin' => false
		);
		$output = 'object';
		$operator = 'and';
		$post_types = get_post_types( $args, $output, $operator );
		foreach ( $post_types as $post_type ) {
			$num_posts = wp_count_posts( $post_type->name );
			$num = number_format_i18n( $num_posts->publish );
			$text = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
			if ( current_user_can( 'edit_posts' ) ) {
				$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . '&nbsp;' . $text . '</a>';
			}
			echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
		}
		$taxonomies = get_taxonomies( $args, $output, $operator );
		foreach ( $taxonomies as $taxonomy ) {
			$num_terms = wp_count_terms( $taxonomy->name );
			$num = number_format_i18n( $num_terms );
			$text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, intval( $num_terms ) );
			if ( current_user_can( 'manage_categories' ) ) {
				$output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '">' . $num . '&nbsp;' . $text . '</a>';
			}
			echo '<li class="taxonomy-count ' . $taxonomy->name . '-count">' . $output . '</li>';
		}
	}
	function custom_colors() {

		echo '<style type="text/css">
			.announcement-count a:before {content:"\f488"!important}
			.app-count a:before {content:"\f509"!important}
			.tribe_events-count a:before {content:"\f145"!important}
			.tribe_organizer-count a:before {content:"\f110"!important}
			.document-count a:before {content:"\f491"!important}
			.tribe_events_cat-count a:before, .workflow_state-count a:before {content:"\f325"!important}
			.tribe_venue-count a:before {content:"\f513"!important}
			.centre-count a:before {content:"\f512"!important}
			.antibody-count a:before {content:"\f533"!important}
			.cell_line-count a:before {content:"\f240"!important}
			.equipment-count a:before {content:"\f538"!important}
			.potw-count a:before {content:"\f128"!important}
			.potm-count a:before {content:"\f183"!important}
			.bug-library-bugs-count a:before {content:"\f227"!important}
			.notice-count a:before {content:"\f309"!important}
			.newsletter-count a:before {content:"\f1ea"!important; font-family: "nav" !important;}
			.link-count a:before {content:"\f103"!important;}
			.doc-count a:before {content:"\f330"!important;}
			</style>';
	}
	add_action('admin_head', 'custom_colors');

	add_action('admin_head', 'my_custom_logo');
	function my_custom_logo() {
		echo '<style type="text/css">#header-logo { background-image: url('.get_bloginfo('template_directory').'/img/wp-logo.png) !important; }</style>';
	}

	add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
	function add_current_nav_class($classes, $item) {
		global $post;
		$current_post_type = get_post_type_object(get_post_type($post->ID));
		$current_post_type_slug = $current_post_type->rewrite[slug];
		$menu_slug = strtolower(trim($item->url));
		if (strpos($menu_slug,$current_post_type_slug) !== false) {
		   $classes[] = 'current-menu-item';
		}
		return $classes;
	}

	// All actions related to emojis
	add_action( 'init', function () {
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		// Filter to remove TinyMCE emojis
		add_filter( 'tiny_mce_plugins', function ( $plugins ) {
			if ( is_array( $plugins ) ) {
				return array_diff( $plugins, array( 'wpemoji' ) );
			}
			return array();
		});
	});

	// Remove Dashboard Boxes
	add_action( 'admin_init', function () {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
		remove_meta_box( 'tribe_dashboard_widget', 'dashboard', 'normal' );
	});

	function my_custom_login() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/custom-login-styles.css" />';
	}
	add_action('login_head', 'my_custom_login');

	function login_function() {
		add_filter( 'gettext', 'username_change', 20, 3 );
		function username_change( $translated_text, $text, $domain ) {
			if ($text === 'Username or Email') {
				$translated_text = 'QMCR Username';
			}
			return $translated_text;
		}
	}
	add_action( 'login_head', 'login_function' );

	function no_wordpress_errors() {
		return '';
	}
	add_filter( 'login_errors', 'no_wordpress_errors' );

	function remove_loginshake() {
		remove_action('login_head', 'wp_shake_js', 12);
	}
	add_action('login_head', 'remove_loginshake');

	function login_checked_remember_me() {
		add_filter( 'login_footer', 'rememberme_checked' );
	}
	add_action( 'init', 'login_checked_remember_me' );

	function rememberme_checked() {
		echo "<script>document.getElementById('rememberme').checked = true;</script>";
	}

	function v_getUrl() {
		$url  = isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
		$url .= '://' . $_SERVER['SERVER_NAME'];
		$url .= in_array( $_SERVER['SERVER_PORT'], array('80', '443') ) ? '' : ':' . $_SERVER['SERVER_PORT'];
		$url .= $_SERVER['REQUEST_URI'];
		return $url;
	}
	function v_forcelogin() {
		if( !is_user_logged_in() ) {
			$url = v_getUrl();
			$whitelist = apply_filters('v_forcelogin_whitelist', array());
			$redirect_url = apply_filters('v_forcelogin_redirect', $url);
			if( preg_replace('/\?.*/', '', $url) != preg_replace('/\?.*/', '', wp_login_url()) && !in_array($url, $whitelist) ) {
				wp_safe_redirect( wp_login_url( $redirect_url ), 302 ); exit();
			}
		}
	}
	add_action('init', 'v_forcelogin');

	function users_login_redirect($redirect_to, $request, $user) {
		if(in_array('administrator', $user->roles)) {
			return admin_url();
		} else {
			return site_url();
		}
	}
	add_filter( 'login_redirect', 'users_login_redirect', 10, 3);

	remove_action('tribe_events_single_event_after_the_content', array('Tribe__Events__iCal', 'single_event_links'));
	add_action('tribe_events_single_event_after_the_content', 'customized_tribe_single_event_links');

	function customized_tribe_single_event_links()	{
		if (is_single() && post_password_required()) {
			return;
		}
		echo '<div class="tribe-events-cal-links">';
		echo '<a class="tribe-events-ical tribe-events-button" href="' . tribe_get_single_ical_link() . '">+ <i class="nav-calendar"></i> Export to Calendar </a>';
		echo '</div><!-- .tribe-events-cal-links -->';
	}

	add_filter( 'tribe_events_ical_export_text', 'filter_ical_export_text' );

	function filter_ical_export_text() {
		return '<i class="nav-calendar"></i> Export to Calendar';
	}

	function my_myme_types($mime_types){
		$mime_types['json'] = 'application/json';
		return $mime_types;
	}
	add_filter('upload_mimes', 'my_myme_types', 1, 1);

	add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
	function my_embed_oembed_html($html, $url, $attr, $post_id) {
		return '<div class="oEmbed">' . $html . '</div>';
	}

	// Hide Centre Events from main Events page
	add_action( 'pre_get_posts', 'tribe_exclude_events_category_month_list' );
	function tribe_exclude_events_category_month_list( $query ) {

		if ( isset( $query->query_vars['eventDisplay'] ) && ! is_singular( 'tribe_events' ) ) {

			if ( $query->query_vars['eventDisplay'] == 'list' && ! is_tax( Tribe__Events__Main::TAXONOMY ) || $query->query_vars['eventDisplay'] == 'month' && $query->query_vars['post_type'] == Tribe__Events__Main::POSTTYPE && ! is_tax( Tribe__Events__Main::TAXONOMY ) && empty( $query->query_vars['suppress_filters'] ) ) {

				$query->set( 'tax_query', array(

					array(
						'taxonomy' => Tribe__Events__Main::TAXONOMY,
						'field'    => 'slug',
						'terms'    => array( 'centres' ),
						'operator' => 'NOT IN'
					)
				) );
			}

		}

		return $query;
	}