<?php

	// Metaboxes

	// WORD
	add_action( 'cmb2_admin_init', 'word' );
	function word() {
		$prefix = '_word_';
		$cmb_anti = new_cmb2_box( array(
			'id' => $prefix . 'twat',
			'title' => __( 'INFO', 'bci' ),
			'object_types' => array( 'page', 'post', 'tribe_event' ),
			'context'	  => 'side',
			'priority'	 => 'core',
		) );
		$cmb_anti->add_field( array(
			'name' => 'MS Word',
			'description' => __( 'Please do not copy & paste text directly from MS Word as it breaks the formatting.', 'bci' ),
			'id'   => $prefix . 'argh',
			'type' => 'title',
		) );
		$cmb_anti->add_field( array(
			'name' => 'Page Title',
			'description' => __( 'Hide page title?.', 'bci' ),
			'id'   => $prefix . 'title',
			'type' => 'checkbox',
		) );
	}

	// Categories
	add_action( 'cmb2_admin_init', 'category_hide' );
	function category_hide() {
		$prefix = '_cat_';
		$cmb_anti = new_cmb2_box( array(
			'id' => $prefix . 'twat',
			'title' => __( 'Home Page', 'bci' ),
			'object_types' => array( 'term' ),
			'taxonomies' => array( 'category' ),
		) );
		$cmb_anti->add_field( array(
			'name' => 'Hide on home page',
			'id'   => $prefix . 'hide',
			'type' => 'checkbox',
		) );
	}

	// Apps
	add_action( 'cmb2_init', 'App_Details' );
	function App_Details() {
		$prefix = '_app_';
		$cmb_recipe = new_cmb2_box( array(
			'id'			=> $prefix . 'metabox',
			'title'		 => __( 'App Details', 'bci' ),
			'object_types'  => array( 'app', ),
		) );
		$cmb_recipe->add_field( array(
			'name' => __( 'Icon', 'bci' ),
			'desc' => __( 'Select icon', 'bci' ),
			'id'   => $prefix . 'icon',
			'type' => 'select',
			'options' => array(
'nav-Agresso' => 'Agresso &#xe905;',
'nav-aid-kit' => 'aid-kit &#xe998;',
'nav-android2' => 'android2 &#xeac0;',
'nav-angry' => 'angry &#xe9ed;',
'nav-bubbles' => 'bubbles &#xe96c;',
'nav-bullhorn' => 'bullhorn &#xe91a;',
'nav-calendar2' => 'calendar2 &#xe953;',
'nav-clipboard' => 'clipboard &#xe9b8;',
'nav-coin-pound' => 'coin-pound &#xe93d;',
'nav-connection' => 'connection &#xe91b;',
'nav-crying' => 'crying &#xea01;',
'nav-equalizer2' => 'equalizer2 &#xe993;',
'nav-eyedropper' => 'eyedropper &#xe90e;',
'nav-folder-plus' => 'folder-plus &#xe931;',
'nav-google-plus' => 'google-plus &#xea8b;',
'nav-google-plus2' => 'google-plus2 &#xea8c;',
'nav-google-plus3' => 'google-plus3 &#xea8d;',
'nav-google2' => 'google2 &#xea89;',
'nav-home2' => 'home2 &#xe900;',
'nav-hour-glass' => 'hour-glass &#xe979;',
'nav-cake' => 'cake &#xe91c;',
'nav-images' => 'images &#xe914;',
'nav-infinite' => 'infinite &#xea2f;',
'nav-info' => 'info &#xea0c;',
'nav-key' => 'key &#xe98d;',
'nav-lab' => 'lab &#xe9aa;',
'nav-library' => 'library &#xe921;',
'nav-linkedin' => 'linkedin &#xeac9;',
'nav-linkedin2' => 'linkedin2 &#xeaca;',
'nav-map' => 'map &#xe94b;',
'nav-menu' => 'menu &#xe919;',
'nav-mug' => 'mug &#xe9a2;',
'nav-office' => 'office &#xe903;',
'nav-page-break' => 'page-break &#xea68;',
'nav-pinterest' => 'pinterest &#xead1;',
'nav-pinterest2' => 'pinterest2 &#xead2;',
'nav-price-tags' => 'price-tags &#xe936;',
'nav-printer' => 'printer &#xe954;',
'nav-quill' => 'quill &#xe917;',
'nav-sad' => 'sad &#xe9e5;',
'nav-shocked' => 'shocked &#xe9f1;',
'nav-smile' => 'smile &#xe9e1;',
'nav-stopwatch' => 'stopwatch &#xe952;',
'nav-table' => 'table &#xea71;',
'nav-ticket2' => 'ticket2 &#xe939;',
'nav-useredit' => 'useredit &#xe918;',
'nav-video-camera' => 'video-camera &#xe915;',
'nav-whatsapp' => 'whatsapp &#xea93;',
'nav-windows8' => 'windows8 &#xeac2;',
'nav-wondering' => 'wondering &#xe9fb;',
'nav-BCI' => 'BCI &#xe907;',
'nav-BCIi' => 'BCIi &#xe904;',
'nav-BCIsquare' => 'BCIsquare &#xe908;',
'nav-BartsCrest' => 'BartsCrest &#xe906;',
'nav-BoB' => 'BoB &#xe909;',
'nav-CentreofCell' => 'CentreofCell &#xe90a;',
'nav-ItemTracker' => 'ItemTracker &#xe90d;',
'nav-MyHR' => 'MyHR &#xe910;',
'nav-Prism' => 'Prism &#xe911;',
'nav-QMcrown' => 'QMcrown &#xe912;',
'nav-QMplus' => 'QMplus &#xe913;',
'nav-ambulance' => 'ambulance &#xf0f9;',
'nav-android' => 'android &#xf17b;',
'nav-angle-double-down' => 'angle-double-down &#xf103;',
'nav-angle-double-left' => 'angle-double-left &#xf100;',
'nav-angle-double-right' => 'angle-double-right &#xf101;',
'nav-angle-double-up' => 'angle-double-up &#xf102;',
'nav-angle-down' => 'angle-down &#xf107;',
'nav-angle-left' => 'angle-left &#xf104;',
'nav-angle-right' => 'angle-right &#xf105;',
'nav-angle-up' => 'angle-up &#xf106;',
'nav-apple' => 'apple &#xf179;',
'nav-area-chart' => 'area-chart &#xf1fe;',
'nav-arrow-circle-down' => 'arrow-circle-down &#xf0ab;',
'nav-arrow-circle-left' => 'arrow-circle-left &#xf0a8;',
'nav-arrow-circle-o-down' => 'arrow-circle-o-down &#xf01a;',
'nav-arrow-circle-o-left' => 'arrow-circle-o-left &#xf190;',
'nav-arrow-circle-o-right' => 'arrow-circle-o-right &#xf18e;',
'nav-arrow-circle-o-up' => 'arrow-circle-o-up &#xf01b;',
'nav-arrow-circle-right' => 'arrow-circle-right &#xf0a9;',
'nav-arrow-circle-up' => 'arrow-circle-up &#xf0aa;',
'nav-arrows' => 'arrows &#xf047;',
'nav-asterisk' => 'asterisk &#xf069;',
'nav-at' => 'at &#xf1fa;',
'nav-bank' => 'bank &#xf19c;',
'nav-barcode' => 'barcode &#xf02a;',
'nav-bicycle' => 'bicycle &#xf206;',
'nav-bolt' => 'bolt &#xf0e7;',
'nav-book' => 'book &#xf02d;',
'nav-bookmark' => 'bookmark &#xf097;',
'nav-bookmark-solid' => 'bookmark-solid &#xf02f;',
'nav-calculator' => 'calculator &#xf1ec;',
'nav-calendar' => 'calendar &#xf073;',
'nav-calendar-blank' => 'calendar-blank &#xf133;',
'nav-calendar-check' => 'calendar-check &#xf274;',
'nav-calendar-minus' => 'calendar-minus &#xf272;',
'nav-calendar-plus' => 'calendar-plus &#xf271;',
'nav-calendar-times' => 'calendar-times &#xf273;',
'nav-camera' => 'camera &#xf030;',
'nav-camera-retro' => 'camera-retro &#xf083;',
'nav-cc-mastercard' => 'cc-mastercard &#xf1f1;',
'nav-cc-paypal' => 'cc-paypal &#xf1f4;',
'nav-cc-visa' => 'cc-visa &#xf1f0;',
'nav-certificate' => 'certificate &#xf0a3;',
'nav-chain' => 'chain &#xf0c1;',
'nav-link' => 'link &#xf0c1;',
'nav-check' => 'check &#xf00c;',
'nav-check-circle' => 'check-circle &#xf058;',
'nav-check-square' => 'check-square &#xf046;',
'nav-check-square2' => 'check-square2 &#xf14a;',
'nav-chevron-left' => 'chevron-left &#xf053;',
'nav-chevron-right' => 'chevron-right &#xf054;',
'nav-child' => 'child &#xf1ae;',
'nav-citrix' => 'citrix &#xe90b;',
'nav-clock-o' => 'clock-o &#xf017;',
'nav-close2' => 'close2 &#xf011;',
'nav-remove2' => 'remove2 &#xf011;',
'nav-times2' => 'times2 &#xf011;',
'nav-coffee' => 'coffee &#xf0f4;',
'nav-cog' => 'cog &#xf013;',
'nav-gear' => 'gear &#xf013;',
'nav-cogs' => 'cogs &#xf085;',
'nav-gears' => 'gears &#xf085;',
'nav-comment' => 'comment &#xf075;',
'nav-comment-o' => 'comment-o &#xf0e5;',
'nav-comments' => 'comments &#xf086;',
'nav-comments-o' => 'comments-o &#xf0e6;',
'nav-credit-card' => 'credit-card &#xf09d;',
'nav-cube' => 'cube &#xf1b2;',
'nav-cubes' => 'cubes &#xf1b3;',
'nav-cut' => 'cut &#xf0c4;',
'nav-scissors' => 'scissors &#xf0c4;',
'nav-cutlery' => 'cutlery &#xf0f5;',
'nav-dashboard' => 'dashboard &#xf0e4;',
'nav-tachometer' => 'tachometer &#xf0e4;',
'nav-desktop' => 'desktop &#xf108;',
'nav-diamond' => 'diamond &#xf219;',
'nav-dollar' => 'dollar &#xf155;',
'nav-usd' => 'usd &#xf155;',
'nav-edit' => 'edit &#xf044;',
'nav-pencil-square-o' => 'pencil-square-o &#xf044;',
'nav-ellipsis-h' => 'ellipsis-h &#xf141;',
'nav-ellipsis-v' => 'ellipsis-v &#xf142;',
'nav-envelope' => 'envelope &#xf003;',
'nav-envelope-square' => 'envelope-square &#xf199;',
'nav-eur' => 'eur &#xf153;',
'nav-euro' => 'euro &#xf153;',
'nav-exclamation' => 'exclamation &#xf12a;',
'nav-exclamation-circle' => 'exclamation-circle &#xf06a;',
'nav-exclamation-triangle' => 'exclamation-triangle &#xf071;',
'nav-warning' => 'warning &#xf071;',
'nav-external-link-square' => 'external-link-square &#xf14c;',
'nav-eye' => 'eye &#xf06e;',
'nav-fa' => 'fa &#xf2b4;',
'nav-font-awesome' => 'font-awesome &#xf2b4;',
'nav-facebook' => 'facebook &#xf09a;',
'nav-facebook-f' => 'facebook-f &#xf09a;',
'nav-facebook-square' => 'facebook-square &#xf082;',
'nav-feed' => 'feed &#xf09e;',
'nav-rss' => 'rss &#xf09e;',
'nav-file' => 'file &#xf15b;',
'nav-file-archive' => 'file-archive &#xf1c6;',
'nav-file-zip' => 'file-zip &#xf1c6;',
'nav-file-audio' => 'file-audio &#xf1c7;',
'nav-file-sound' => 'file-sound &#xf1c7;',
'nav-file-excel' => 'file-excel &#xf1c3;',
'nav-file-image' => 'file-image &#xf1c5;',
'nav-file-photo-o' => 'file-photo-o &#xf1c5;',
'nav-file-picture' => 'file-picture &#xf1c5;',
'nav-file-movie' => 'file-movie &#xf1c8;',
'nav-file-video' => 'file-video &#xf1c8;',
'nav-file-o' => 'file-o &#xf016;',
'nav-file-pdf' => 'file-pdf &#xf1c1;',
'nav-file-powerpoint' => 'file-powerpoint &#xf1c4;',
'nav-file-text-o' => 'file-text-o &#xf0f6;',
'nav-file-word' => 'file-word &#xf1c2;',
'nav-film' => 'film &#xf008;',
'nav-filter' => 'filter &#xf0b0;',
'nav-fire-extinguisher' => 'fire-extinguisher &#xf134;',
'nav-flag' => 'flag &#xf024;',
'nav-flask' => 'flask &#xf0c3;',
'nav-futbol-o' => 'futbol-o &#xf1e3;',
'nav-soccer-ball-o' => 'soccer-ball-o &#xf1e3;',
'nav-gbp' => 'gbp &#xf154;',
'nav-glass' => 'glass &#xf000;',
'nav-globe' => 'globe &#xf0ac;',
'nav-google' => 'google &#xf1a0;',
'nav-graduation-cap' => 'graduation-cap &#xf19d;',
'nav-mortar-board' => 'mortar-board &#xf19d;',
'nav-group' => 'group &#xf0c2;',
'nav-users' => 'users &#xf0c2;',
'nav-group2' => 'group2 &#xf0c0;',
'nav-users2' => 'users2 &#xf0c0;',
'nav-gym' => 'gym &#xe901;',
'nav-hand-o-down' => 'hand-o-down &#xf0a7;',
'nav-hand-o-left' => 'hand-o-left &#xf0a5;',
'nav-hand-o-right' => 'hand-o-right &#xf0a4;',
'nav-hand-o-up' => 'hand-o-up &#xf0a6;',
'nav-hashtag' => 'hashtag &#xf292;',
'nav-heart' => 'heart &#xf004;',
'nav-heart-o' => 'heart-o &#xf08a;',
'nav-heartbeat' => 'heartbeat &#xf21e;',
'nav-home' => 'home &#xf015;',
'nav-hospital' => 'hospital &#xf0f8;',
'nav-hotel' => 'hotel &#xf236;',
'nav-hourglass' => 'hourglass &#xf254;',
'nav-hourglass-o' => 'hourglass-o &#xf250;',
'nav-html5' => 'html5 &#xf13b;',
'nav-i-GRasp' => 'i-GRasp &#xe90c;',
'nav-inbox' => 'inbox &#xf01c;',
'nav-info-circle' => 'info-circle &#xf05a;',
'nav-keyboard-o' => 'keyboard-o &#xf11c;',
'nav-labarchives' => 'labarchives &#xe90f;',
'nav-laptop' => 'laptop &#xf109;',
'nav-lightbulb-o' => 'lightbulb-o &#xf0eb;',
'nav-line-chart' => 'line-chart &#xf201;',
'nav-linkedin-square' => 'linkedin-square &#xf08c;',
'nav-list-alt' => 'list-alt &#xf022;',
'nav-lock' => 'lock &#xf023;',
'nav-magnet' => 'magnet &#xf076;',
'nav-mail-reply' => 'mail-reply &#xf112;',
'nav-reply' => 'reply &#xf112;',
'nav-map-marker' => 'map-marker &#xf041;',
'nav-map-signs' => 'map-signs &#xf277;',
'nav-microphone' => 'microphone &#xf130;',
'nav-minus-circle' => 'minus-circle &#xf056;',
'nav-mobile' => 'mobile &#xf10b;',
'nav-mobile-phone' => 'mobile-phone &#xf10b;',
'nav-moon-o' => 'moon-o &#xf186;',
'nav-music' => 'music &#xf001;',
'nav-my-research' => 'my-research &#xe916;',
'nav-myapps' => 'myapps &#xe902;',
'nav-newspaper' => 'newspaper &#xf1ea;',
'nav-object-group' => 'object-group &#xf247;',
'nav-object-ungroup' => 'object-ungroup &#xf248;',
'nav-paper-plane' => 'paper-plane &#xf1d8;',
'nav-send' => 'send &#xf1d8;',
'nav-paper-plane-o' => 'paper-plane-o &#xf1d9;',
'nav-send-o' => 'send-o &#xf1d9;',
'nav-paw' => 'paw &#xf1b0;',
'nav-paypal' => 'paypal &#xf1ed;',
'nav-phone' => 'phone &#xf095;',
'nav-phone-square' => 'phone-square &#xf098;',
'nav-pie-chart' => 'pie-chart &#xf200;',
'nav-pinterest-p' => 'pinterest-p &#xf231;',
'nav-pinterest-square' => 'pinterest-square &#xf0d3;',
'nav-plane' => 'plane &#xf072;',
'nav-play-circle-o' => 'play-circle-o &#xf01d;',
'nav-plus-circle' => 'plus-circle &#xf055;',
'nav-power-off' => 'power-off &#xf012;',
'nav-print' => 'print &#xf031;',
'nav-puzzle-piece' => 'puzzle-piece &#xf12e;',
'nav-question' => 'question &#xf128;',
'nav-question-circle' => 'question-circle &#xf059;',
'nav-question-circle-o' => 'question-circle-o &#xf29c;',
'nav-recycle' => 'recycle &#xf1b8;',
'nav-refresh' => 'refresh &#xf021;',
'nav-rss-square' => 'rss-square &#xf143;',
'nav-search' => 'search &#xf002;',
'nav-search-minus' => 'search-minus &#xf010;',
'nav-search-minus2' => 'search-minus2 &#xf014;',
'nav-search-plus' => 'search-plus &#xf00e;',
'nav-search-plus2' => 'search-plus2 &#xf018;',
'nav-share-alt' => 'share-alt &#xf1e0;',
'nav-signal' => 'signal &#xf019;',
'nav-sitemap' => 'sitemap &#xf0e8;',
'nav-slack' => 'slack &#xf198;',
'nav-sort-alpha-asc' => 'sort-alpha-asc &#xf15d;',
'nav-sort-alpha-desc' => 'sort-alpha-desc &#xf15e;',
'nav-sort-amount-asc' => 'sort-amount-asc &#xf160;',
'nav-sort-amount-desc' => 'sort-amount-desc &#xf161;',
'nav-sort-numeric-asc' => 'sort-numeric-asc &#xf162;',
'nav-sort-numeric-desc' => 'sort-numeric-desc &#xf163;',
'nav-spinner' => 'spinner &#xf110;',
'nav-star' => 'star &#xf005;',
'nav-star-o' => 'star-o &#xf006;',
'nav-tablet' => 'tablet &#xf10a;',
'nav-tag' => 'tag &#xf02b;',
'nav-tags' => 'tags &#xf02c;',
'nav-th' => 'th &#xf00a;',
'nav-th-large' => 'th-large &#xf009;',
'nav-th-list' => 'th-list &#xf00b;',
'nav-thumb-tack' => 'thumb-tack &#xf08d;',
'nav-thumbs-o-down' => 'thumbs-o-down &#xf088;',
'nav-thumbs-o-up' => 'thumbs-o-up &#xf087;',
'nav-tick' => 'tick &#xf00f;',
'nav-ticket' => 'ticket &#xf145;',
'nav-times-circle' => 'times-circle &#xf057;',
'nav-trash-o' => 'trash-o &#xf01e;',
'nav-trophy' => 'trophy &#xf091;',
'nav-twitter' => 'twitter &#xf099;',
'nav-twitter-square' => 'twitter-square &#xf081;',
'nav-umbrella' => 'umbrella &#xf0e9;',
'nav-user' => 'user &#xf007;',
'nav-user-md' => 'user-md &#xf0f0;',
'nav-user-plus' => 'user-plus &#xf234;',
'nav-user-secret' => 'user-secret &#xf21b;',
'nav-user-times' => 'user-times &#xf235;',
'nav-video-camera2' => 'video-camera2 &#xf03d;',
'nav-wheelchair' => 'wheelchair &#xf193;',
'nav-wrench' => 'wrench &#xf0ad;',
'nav-youtube' => 'youtube &#xf167;'
			)
		) );
		$cmb_recipe->add_field( array(
			'name' => __( 'Link', 'bci' ),
			'desc' => __( 'Add the link here', 'bci' ),
			'id'   => $prefix . 'link',
			'type' => 'text_url',
			'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet')
		) );
		$cmb_recipe->add_field( array(
			'name' => __( 'Open in new Window/Tab?', 'bci' ),
			'desc' => __( 'do you want the link to open in a new window/tab?', 'bci' ),
			'id'   => $prefix . 'target',
			'type' => 'checkbox',
		) );
		$cmb_recipe->add_field( array(
			'name' => __( 'Background Colour', 'bci' ),
			'desc' => __( 'Choose icon background colour', 'bci' ),
			'id'   => $prefix . 'colour',
			'type' => 'colorpicker',
		) );
		$cmb_recipe->add_field( array(
			'name' => __( 'Colour', 'bci' ),
			'desc' => __( 'Choose icon/font colour', 'bci' ),
			'id'   => $prefix . 'font',
			'type' => 'colorpicker',
		) );
		$cmb_recipe->add_field( array(
			'name' => __( 'Only show this app to Admins', 'bci' ),
			'desc' => __( 'hide from everyone else', 'bci' ),
			'id'   => $prefix . 'dash',
			'type' => 'checkbox',
		) );
	}

	// Link Apps
	function att_link_start( $query_args ) {
		$args = wp_parse_args( $query_args, array(
			'post_type'   => 'app',
			'numberposts' => -1,
		) );
		$posts = get_posts( $args );
		$post_options = array();
		if ( $posts ) {
			foreach ( $posts as $post ) {
			  $post_options[ $post->ID ] = '<i class="' . get_post_meta( $post->ID, "_app_icon", true ) . '"></i> <br>' . $post->post_title;
			}
		}
		return $post_options;
	}
	function att_link() {
		return att_link_start( array( 'post_type' => 'app', 'numberposts' => -1 ) );
	}

	// Link Centres
	function cent_link_start( $query_args ) {
		$args = wp_parse_args( $query_args, array(
			'post_type'   => 'centre',
			'numberposts' => -1,
		) );
		$posts = get_posts( $args );
		$post_options = array();
		if ( $posts ) {
			foreach ( $posts as $post ) {
			  $post_options[ $post->ID ] = $post->post_title;
			}
		}
		return $post_options;
	}
	function cent_link() {
		return cent_link_start( array( 'post_type' => 'centre', 'numberposts' => -1 ) );
	}

	// Link Docs
	function doc_link_start( $query_args ) {
		$args = wp_parse_args( $query_args, array(
			'post_type'   => 'doc',
			'numberposts' => -1,
		) );
		$posts = get_posts( $args );
		$post_options = array();
		if ( $posts ) {
			foreach ( $posts as $post ) {
			  $post_options[ $post->ID ] = $post->post_title;
			}
		}
		return $post_options;
	}
	function doc_link() {
		return doc_link_start( array( 'post_type' => 'doc', 'numberposts' => -1 ) );
	}

	// Apps on User profile
	add_action( 'cmb2_init', 'yourprefix_register_user_profile_metabox' );
	function yourprefix_register_user_profile_metabox() {
		$prefix = '_user_';
		$cmb_user = new_cmb2_box( array(
			'id' => $prefix . 'edit_metabox',
			'title' => __( 'User Profile Metabox', 'bci' ),
			'object_types' => array( 'user' ),
			'show_names' => true,
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Select the apps you want to show in your App Dock', 'bci' ),
			'id' => $prefix . 'app',
			'on_front' => true,
			'type' => 'multicheck_inline',
			'select_all_button' => true,
			'options_cb' => 'att_link',
		) );
	}

	// Centres on User profile
	add_action( 'cmb2_init', 'centre_user_profile_metabox' );
	function centre_user_profile_metabox() {
		$prefix = '_usercentre_';
		$cmb_user = new_cmb2_box( array(
			'id' => $prefix . 'edit_metabox',
			'title' => __( 'User Centre Metabox', 'bci' ),
			'object_types' => array( 'user' ),
			'show_names' => true,
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Your Centre', 'bci' ),
			'id' => $prefix . 'centreTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( '', 'bci' ),
			'id' => $prefix . 'centre',
			'on_front' => true,
			'type' => 'select',
			'options_cb' => 'cent_link',
			'show_option_none' => true
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Centre Role', 'bci' ),
			'id' => $prefix . 'cTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Centre Lead', 'bci' ),
			'id' => $prefix . 'centre_lead',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Centre Administrator', 'bci' ),
			'id' => $prefix . 'centre_administrator',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Lab Manager', 'bci' ),
			'id' => $prefix . 'lab_manager',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Deputy Lab Manager', 'bci' ),
			'id' => $prefix . 'deputy_lab_manager',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'ItemTracker Contact', 'bci' ),
			'id' => $prefix . 'itemtracker',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Health & Safety Role', 'bci' ),
			'id' => $prefix . 'hsTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Local Safety Officers', 'bci' ),
			'id' => $prefix . 'main_safety',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Fire Marshal', 'bci' ),
			'id' => $prefix . 'fire_marshall',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'First Aider', 'bci' ),
			'id' => $prefix . 'first_aider',
			'on_front' => true,
			'type' => 'checkbox',
		) );
	}

	// Roles on User profile
	add_action( 'cmb2_init', 'user_profile_metabox' );
	function user_profile_metabox() {
		$prefix = '_me_';
		$cmb_user = new_cmb2_box( array(
			'id' => $prefix . 'edit_metabox',
			'title' => __( 'User Metabox', 'bci' ),
			'object_types' => array( 'user' ),
			'show_names' => true,
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Home Page Tour', 'bci' ),
			'id' => $prefix . 'hTour',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Click this link to <a id="tour" href="#">reset the homepage tour</a>.', 'bci' ),
			'id' => $prefix . 'tourRESET',
			'on_front' => true,
			'type' => 'text',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Tick this box to never show the tour again.', 'bci' ),
			'id' => $prefix . 'tourNO',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'My Job Title', 'bci' ),
			'id' => $prefix . 'jTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Do not put your Centre Role in here (Centre Lead, Lab Manager, etc). Use the <a href="/my-profile/my-centre-profile/">Centre Profile</a> checkboxes for this. If one of those is your job title, leave this blank.', 'bci' ),
			'id' => $prefix . 'title',
			'on_front' => true,
			'type' => 'text',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'My Title', 'bci' ),
			'id' => $prefix . 'tTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'eg: Doctor, Professor', 'bci' ),
			'id' => $prefix . 'ttitle',
			'on_front' => true,
			'type' => 'text',
		) );
//		$cmb_user->add_field( array(
//			'desc' => __( 'Department', 'bci' ),
//			'id' => $prefix . 'dTitle',
//			'on_front' => true,
//			'type' => 'title',
//		) );
//		$cmb_user->add_field( array(
//			'desc' => __( '', 'bci' ),
//			'id' => $prefix . 'dept',
//			'on_front' => true,
//			'type' => 'text',
//		) );
		$cmb_user->add_field( array(
			'desc' => __( '<i class="nav-phone"></i> Extension', 'bci' ),
			'id' => $prefix . 'eTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( '', 'bci' ),
			'id' => $prefix . 'ext',
			'on_front' => true,
			'type' => 'text_small',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Fax', 'bci' ),
			'id' => $prefix . 'fTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( '', 'bci' ),
			'id' => $prefix . 'fax',
			'on_front' => true,
			'type' => 'text',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Building', 'bci' ),
			'id' => $prefix . 'buildTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( '', 'bci' ),
			'id' => $prefix . 'building',
			'on_front' => true,
			'type' => 'select',
			'options' => array(
				'Old Anatomy Building' => 'Old Anatomy Building',
				'John Vane Science Centre' => 'John Vane Science Centre',
				'Joseph Rotblat Building' => 'Joseph Rotblat Building',
				'Dean Rees House' => 'Dean Rees House',
				'The William Harvey Heart Centre' => 'The William Harvey Heart Centre',
				'Lodge House' => 'Lodge House',
				'Dawson Hall' => 'Dawson Hall',
				'Wolfson Institute' =>'Wolfson Institute'
			),
			'show_option_none' => true
		) );
		$cmb_user->add_field( array(
			'desc' => __( '<i class="nav-balloons"></i> Birthday (optional)', 'bci' ),
			'id' => $prefix . 'bTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Month', 'bci' ),
			'id' => $prefix . 'birthMonth',
			'on_front' => true,
			'type' => 'select',
			'options' => array(
				'01' => 'January',
				'02' => 'February',
				'03' => 'March',
				'04' => 'April',
				'05' => 'May',
				'06' => 'June',
				'07' => 'July',
				'08' => 'August',
				'09' => 'September',
				'10' => 'October',
				'11' => 'November',
				'12' => 'December',
			)
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Day', 'bci' ),
			'id' => $prefix . 'birthDay',
			'on_front' => true,
			'type' => 'select',
			'options' => array(
				'01' => '01',
				'02' => '02',
				'03' => '03',
				'04' => '04',
				'05' => '05',
				'06' => '06',
				'07' => '07',
				'08' => '08',
				'09' => '09',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
				'20' => '20',
				'21' => '21',
				'22' => '22',
				'23' => '23',
				'24' => '24',
				'25' => '25',
				'26' => '26',
				'27' => '27',
				'28' => '28',
				'29' => '29',
				'30' => '30',
				'31' => '31',
			)
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Avatar', 'bci' ),
			'id' => $prefix . 'aTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Create your avatar at <a href="http://en.gravatar.com" target="_blank" rel="noopener">Gravatar</a> using your QMUL email address.', 'bci' ),
			'id' => $prefix . 'av',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Other Roles', 'bci' ),
			'id' => $prefix . 'vTitle',
			'on_front' => true,
			'type' => 'title',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Social Committee', 'bci' ),
			'id' => $prefix . 'social_committee',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'PhD Forum', 'bci' ),
			'id' => $prefix . 'phd_forum',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Postdoc Reps', 'bci' ),
			'id' => $prefix . 'postdoc_rep',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Postdoc Forum', 'bci' ),
			'id' => $prefix . 'postdoc_forum',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Postdoc Mentors', 'bci' ),
			'id' => $prefix . 'postdoc_mentor',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Comms Committee', 'bci' ),
			'id' => $prefix . 'coms_committee',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Athena SWAN', 'bci' ),
			'id' => $prefix . 'athena_swan',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Student Reps', 'bci' ),
			'id' => $prefix . 'reps',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'SMT', 'bci' ),
			'id' => $prefix . 'smt',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Exec Board', 'bci' ),
			'id' => $prefix . 'exec',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'Admin Forum', 'bci' ),
			'id' => $prefix . 'admin',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'BCC IT User Group', 'bci' ),
			'id' => $prefix . 'bccit',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'BCC IT User Group Title', 'bci' ),
			'id' => $prefix . 'bccittitle',
			'on_front' => true,
			'type' => 'text',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'BCC IT Staff', 'bci' ),
			'id' => $prefix . 'it',
			'on_front' => true,
			'type' => 'checkbox',
		) );
		$cmb_user->add_field( array(
			'desc' => __( 'BCC IT Staff Title', 'bci' ),
			'id' => $prefix . 'ittitle',
			'on_front' => true,
			'type' => 'text',
		) );
	}

	// Newsletter Info
	add_action( 'cmb2_admin_init', 'newsletter_info' );
	function newsletter_info() {
		$prefix = '_newsletter_';
		$cmb_news = new_cmb2_box( array(
			'id' => $prefix . 'news',
			'title' => __( 'Newsletter', 'bci' ),
			'object_types' => array( 'newsletter' ),
		) );
		$cmb_news->add_field( array(
			'desc' => __( 'Newsletter PDF', 'bci' ),
			'id' => $prefix . 'pdf',
			'type' => 'file',
		) );
	}

	// Doc Info
	add_action( 'cmb2_admin_init', 'doc_info' );
	function doc_info() {
		$prefix = 'doc_';
		$cmb_doc = new_cmb2_box( array(
			'id' => $prefix . 'doc',
			'title' => __( 'Document', 'bci' ),
			'object_types' => array( 'doc' ),
		) );
		$cmb_doc->add_field( array(
			'desc' => __( 'Document Description', 'bci' ),
			'id' => $prefix . 'desc',
			'type' => 'textarea',
		) );
		$doc_group = $cmb_doc->add_field( array(
			'id' => $prefix . 'version',
			'type' => 'group',
			'description' => __( 'Add documents here. If there is an updated version, click the "Add New Version" button and upload the new version underneath the existing version. This will replace the older version in all links whilst keeping the old version in case of errors.', 'bci' ),
			'options'	 => array(
				'group_title'   => __( 'Version {#}', 'bci' ),
				'add_button'	=> __( 'Add New Version', 'bci' ),
				'remove_button' => __( 'Remove Version', 'bci' ),
				'sortable'	  => true,
			),
		) );
		$cmb_doc->add_group_field( $doc_group, array(
			'name' => 'File',
			'id'   => '_doc',
			'type' => 'file',
		) );
		$cmb_doc->add_group_field( $doc_group, array(
			'name' => 'Reason for new version',
			'id'   => '_reason',
			'type' => 'text',
		) );
	}

	// Links Info
	add_action( 'cmb2_admin_init', 'link_info' );
	function link_info() {
		$prefix = 'link_';
		$cmb_news = new_cmb2_box( array(
			'id' => $prefix . 'link',
			'title' => __( 'Link', 'bci' ),
			'object_types' => array( 'link' ),
		) );
		$cmb_news->add_field( array(
			'desc' => __( 'Link Description', 'bci' ),
			'id' => $prefix . 'desc',
			'type' => 'textarea',
		) );
		$cmb_news->add_field( array(
			'desc' => __( 'Link URL', 'bci' ),
			'id' => $prefix . 'url',
			'type' => 'text_url',
		) );
		$cmb_news->add_field( array(
			'desc' => __( 'Open in new tab/window?', 'bci' ),
			'id' => $prefix . 'blank',
			'type' => 'checkbox',
		) );
	}

	// POTW
	add_action( 'cmb2_admin_init', 'potw_meta' );
	function potw_meta() {
		$prefix = '_potw_';
		$cmb_user = new_cmb2_box( array(
			'id'			=> $prefix . 'edit_metabox',
			'title'			=> __( 'Photo Info', 'bci' ),
			'object_types'	=> array( 'potw', ), // Post type
		) );
		$cmb_user->add_field( array(
			'name' 			=> __( 'Photo Credit', 'bci' ),
			'id'			=> $prefix . 'user',
			'type'			=> 'user_search_text',
		) );
	}

	// Lab Resources
	add_action( 'cmb2_admin_init', 'lab_resources' );
	function lab_resources() {
		$prefix = '_lab_';
		$cmb_lab = new_cmb2_box( array(
			'id' => $prefix . 'lab',
			'title' => __( 'Lab Resources', 'bci' ),
			'object_types' => array( 'page' ),
			'show_on'	  => array( 'key' => 'page-template', 'value' => 'equipment.php' ),
		) );
		$equip_group = $cmb_lab->add_field( array(
			'id' => $prefix . 'equip',
			'type' => 'group',
			'description' => __( 'Equipment List', 'bci' ),
			'options'	 => array(
				'group_title'   => __( 'Entry {#}', 'bci' ),
				'add_button'	=> __( 'Add Another Entry', 'bci' ),
				'remove_button' => __( 'Remove Entry', 'bci' ),
				'sortable'	  => true,
			),
		) );
		$cmb_lab->add_group_field( $equip_group, array(
			'name' => 'Equipment Description',
			'description' => __( 'name of the equipment', 'bci' ),
			'id'   => $prefix . 'equipname',
			'type' => 'text',
		) );
		$cmb_lab->add_group_field( $equip_group, array(
			'name' => 'Room Number',
			'description' => __( 'room the equipment is in', 'bci' ),
			'id'   => $prefix . 'room',
			'type' => 'text_small',
		) );
		$cmb_lab->add_group_field( $equip_group, array(
			'name' => 'Location',
			'description' => __( 'what department', 'bci' ),
			'id'   => $prefix . 'loc',
			'type' => 'text',
		) );
		$cmb_lab->add_group_field( $equip_group, array(
			'name' => 'Contact',
			'description' => __( 'name of person responsible', 'bci' ),
			'id'   => $prefix . 'user',
			'type' => 'text',
		) );
		$cmb_lab->add_group_field( $equip_group, array(
			'name' => 'For shared use',
			'description' => __( '', 'bci' ),
			'id'   => $prefix . 'share',
			'type' => 'checkbox',
		) );
	}

	// Link Centres
	function centre_link_start( $query_args ) {
		$args = wp_parse_args( $query_args, array(
			'post_type'   => 'centre',
			'numberposts' => -1,
		) );
		$posts = get_posts( $args );
		$post_options = array();
		if ( $posts ) {
			foreach ( $posts as $post ) {
			  $post_options[ $post->post_title ] = $post->post_title;
			}
		}
		return $post_options;
	}
	function centre_link() {
		return centre_link_start( array( 'post_type' => 'centre', 'numberposts' => -1 ) );
	}

	// Antibodies
	add_action( 'cmb2_admin_init', 'antibodies' );
	function antibodies() {
		$prefix = '_anti_';
		$cmb_anti = new_cmb2_box( array(
			'id' => $prefix . 'bodies',
			'title' => __( 'Antibody Details', 'bci' ),
			'object_types' => array( 'antibody' ),
		) );
		$cmb_anti->add_field( array(
			'name' => 'Contact',
			'description' => __( 'name of person responsible', 'bci' ),
			'id'   => $prefix . 'user',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => __( 'Centre', 'bci' ),
			'desc' => __( '', 'bci' ),
			'id' => $prefix . 'centre',
			'type' => 'select',
			'options_cb' => 'centre_link',
		) );
		$cmb_anti->add_field( array(
			'name' => 'Comment',
			'id'   => $prefix . 'comment',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => 'Company',
			'description' => __( '', 'bci' ),
			'id'   => $prefix . 'company',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => 'Catalogue #',
			'description' => __( '', 'bci' ),
			'id'   => $prefix . 'catalogue',
			'type' => 'text',
		) );
	}

	// cell_lines
	add_action( 'cmb2_admin_init', 'cell_lines' );
	function cell_lines() {
		$prefix = '_cell_';
		$cmb_anti = new_cmb2_box( array(
			'id' => $prefix . 'bodies',
			'title' => __( 'Cell Line Details', 'bci' ),
			'object_types' => array( 'cell_line' ),
		) );
		$cmb_anti->add_field( array(
			'name' => 'Contact',
			'description' => __( 'name of person responsible', 'bci' ),
			'id'   => $prefix . 'user',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => __( 'Centre', 'bci' ),
			'desc' => __( '', 'bci' ),
			'id' => $prefix . 'centre',
			'type' => 'select',
			'options_cb' => 'centre_link',
		) );
		$cmb_anti->add_field( array(
			'name' => 'Comment',
			'id'   => $prefix . 'comment',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => 'ATCC',
			'description' => __( '', 'bci' ),
			'id'   => $prefix . 'atcc',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => 'STR Profiled',
			'description' => __( '', 'bci' ),
			'id'   => $prefix . 'str',
			'type' => 'text',
		) );
	}

	// equipment
	add_action( 'cmb2_admin_init', 'equipment_meta' );
	function equipment_meta() {
		$prefix = '_equip_';
		$cmb_anti = new_cmb2_box( array(
			'id' => $prefix . 'bodies',
			'title' => __( 'Equipment Details', 'bci' ),
			'object_types' => array( 'equipment' ),
		) );
		$cmb_anti->add_field( array(
			'name' => 'Room #',
			'description' => __( '', 'bci' ),
			'id'   => $prefix . 'room',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => 'Contact',
			'description' => __( 'name of person responsible', 'bci' ),
			'id'   => $prefix . 'user',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => __( 'Centre', 'bci' ),
			'desc' => __( '', 'bci' ),
			'id' => $prefix . 'centre',
			'type' => 'select',
			'options_cb' => 'centre_link',
		) );
		$cmb_anti->add_field( array(
			'name' => 'Equipment for Shared Use',
			'description' => __( '', 'bci' ),
			'id'   => $prefix . 'share',
			'type' => 'select',
			'options' => array(
				'Yes' => __('YES', 'bci'),
				'No' => __('NO', 'bci'),
			),
		) );
	}

	// Centres
	add_action( 'cmb2_admin_init', 'centrelead' );
	function centrelead() {
		$prefix = '_centre_';
		$cmb_block = new_cmb2_box( array(
			'id' => $prefix . 'hide',
			'title' => __( 'Hide from Centre Archive', 'bci' ),
			'object_types' => array( 'centre' ),
			'context'	  => 'side', //  'normal', 'advanced', or 'side'
		) );
		$cmb_block->add_field( array(
			'name' => '',
			'description' => __( 'tick to hide from Centre archive page', 'bci' ),
			'id'   => $prefix . 'no',
			'type' => 'checkbox',
		) );
		$cmb_anti = new_cmb2_box( array(
			'id' => $prefix . 'bodies',
			'title' => __( 'Centre Details', 'bci' ),
			'object_types' => array( 'centre' ),
		) );
		$cmb_anti->add_field( array(
			'name' => 'Centre Administrator Default Email',
			'description' => __( 'default email of Centre', 'bci' ),
			'id'   => $prefix . 'admine',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => 'Mailing List',
			'description' => __( 'email of Mailing List', 'bci' ),
			'id'   => $prefix . 'ml',
			'type' => 'text',
		) );
		$cmb_anti->add_field( array(
			'name' => 'Link to Centre',
			'description' => __( 'add link to Centre on BCI site', 'bci' ),
			'id'   => $prefix . 'link',
			'type' => 'text_url',
			'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ),
		) );
	}

	// Events
	add_action( 'cmb2_admin_init', 'events' );
	function events() {
		$prefix = '_event_';
		$cmb_anti = new_cmb2_box( array(
			'id' => $prefix . 'event',
			'title' => __( 'Speaker', 'bci' ),
			'object_types' => array( 'tribe_events' ),
		) );
		$cmb_anti->add_field( array(
			'name' => 'Speaker name',
			'description' => __( 'name of speaker', 'bci' ),
			'id'   => $prefix . 'speaker',
			'type' => 'text',
		) );
	}

	// Paper of the Month
	add_action( 'cmb2_admin_init', 'potm_meta' );
	function potm_meta() {
		$prefix = '_potm_';
		$cmb_potm = new_cmb2_box( array(
			'id' => $prefix . 'paper',
			'title' => __( 'Paper Details', 'bci' ),
			'object_types' => array( 'potm' ),
		) );
		$cmb_potm->add_field( array(
			'name' => 'Winner',
			'description' => __( 'name of winner', 'bci' ),
			'id'   => $prefix . 'winner',
			'type' => 'text',
		) );
		$cmb_potm->add_field( array(
			'name' => 'Authors',
			'description' => __( 'names of paper authors', 'bci' ),
			'id'   => $prefix . 'authors',
			'type' => 'textarea',
		) );
		$cmb_potm->add_field( array(
			'name' => 'Publication',
			'description' => __( 'name of publication', 'bci' ),
			'id'   => $prefix . 'pub',
			'type' => 'text',
		) );
		$cmb_potm->add_field( array(
			'name' => 'Publication Link',
			'description' => __( 'link to publication', 'bci' ),
			'id'   => $prefix . 'publink',
			'type' => 'text_url',
		) );
		$cmb_potm->add_field( array(
			'name' => 'Print Date',
			'description' => __( 'print date', 'bci' ),
			'id'   => $prefix . 'date',
			'type' => 'text_date',
			'date_format' => __( 'jS F Y', 'bci' ),
		) );
	}

	// IT Equipment
	add_action( 'cmb2_admin_init', 'it_equipment' );
	function it_equipment() {
		$prefix = '_it_';
		$cmb_it = new_cmb2_box( array(
			'id' => $prefix . 'stuff',
			'title' => __( 'New Equipment', 'bci' ),
			'object_types' => array( 'page' ),
			'show_on'	  => array( 'key' => 'page-template', 'value' => 'it.php' ),
		) );
		$equip_it_group = $cmb_it->add_field( array(
			'id' => $prefix . 'equip',
			'type' => 'group',
			'description' => __( 'Desktops', 'bci' ),
			'options'	 => array(
				'group_title'   => __( 'Entry {#}', 'bci' ),
				'add_button'	=> __( 'Add Another Entry', 'bci' ),
				'remove_button' => __( 'Remove Entry', 'bci' ),
				'sortable'	  => true,
			),
		) );
		$cmb_it->add_group_field( $equip_it_group, array(
			'name' => 'Equipment Description',
			'description' => __( 'name of the equipment', 'bci' ),
			'id'   => $prefix . 'equipname',
			'type' => 'text',
		) );
		$cmb_it->add_group_field( $equip_it_group, array(
			'name' => 'Room Number',
			'description' => __( 'room the equipment is in', 'bci' ),
			'id'   => $prefix . 'room',
			'type' => 'text_small',
		) );
		$cmb_it->add_group_field( $equip_it_group, array(
			'name' => 'Location',
			'description' => __( 'what department', 'bci' ),
			'id'   => $prefix . 'loc',
			'type' => 'text',
		) );
		$cmb_it->add_group_field( $equip_it_group, array(
			'name' => 'Contact',
			'description' => __( 'name of person responsible', 'bci' ),
			'id'   => $prefix . 'user',
			'type' => 'text',
		) );
		$cmb_it->add_group_field( $equip_it_group, array(
			'name' => 'For shared use',
			'description' => __( '', 'bci' ),
			'id'   => $prefix . 'share',
			'type' => 'checkbox',
		) );
	}

	add_action( 'rest_api_init', 'slug_register_starship' );
	function slug_register_starship() {
		register_rest_field( 'antibody',
			'_anti_user',
			array(
				'get_callback'	=> 'user_cb',
				'update_callback' => null,
				'schema'		  => null,
			)
		);
		register_rest_field( 'antibody',
			'_anti_centre',
			array(
				'get_callback'	=> 'user_cb',
				'update_callback' => null,
				'schema'		  => null,
			)
		);
		register_rest_field( 'antibody',
			'_anti_comment',
			array(
				'get_callback'	=> 'user_cb',
				'update_callback' => null,
				'schema'		  => null,
			)
		);
		register_rest_field( 'antibody',
			'_anti_company',
			array(
				'get_callback'	=> 'user_cb',
				'update_callback' => null,
				'schema'		  => null,
			)
		);
		register_rest_field( 'antibody',
			'_anti_catalogue',
			array(
				'get_callback'	=> 'user_cb',
				'update_callback' => null,
				'schema'		  => null,
			)
		);
	}
	function user_cb( $object, $field_name, $request ) {
		return get_post_meta( $object[ 'id' ], $field_name, true );
	}
