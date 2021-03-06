<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php include_once('analytics.php') ?>
<?php
$less = new lessc;
echo '<style>' . $less->compile("@furniture: ".bci_get_option( "color" )."; @navBg: ".bci_get_option( "color3" )."; @navSecondary: ".bci_get_option( "color2" )."; footer, header.site-header { background: @furniture; } #sideNavContainer { background: @navBg; } .single-antibody nav#sideNav li.current_page_parent,.post-type-archive-tribe_events nav#sideNav li.current_page_parent, .single-tribe_events nav#sideNav li.current_page_parent, .post-type-archive-potm nav#sideNav li.current_page_parent, .single-potm nav#sideNav li.current_page_parent, .post-type-archive-potw nav#sideNav li.current_page_parent, .single-potw nav#sideNav li.current_page_parent, .single-cell_line nav#sideNav li.current_page_parent, .single-equipment nav#sideNav li.current_page_parent, .single-centre nav#sideNav li.current_page_parent, .post-type-archive-centre nav#sideNav li.current_page_parent, .author nav#sideNav li.current_page_parent, .single-tribe_venue nav#sideNav li.current_page_parent { background: @navBg; } nav#sideNav li:hover, nav#sideNav li.current_page_item, nav#sideNav li.current_page_parent, nav#sideNav li.current-page-ancestor, .post-type-archive-tribe_events nav#sideNav li.current_page_parent:hover, .single-antibody nav#sideNav li.current_page_parent:hover, .single-antibody nav#sideNav li.nav-lab, .single-cell_line nav#sideNav li.menu-item-1602, .single-antibody nav#sideNav li.menu-item-1602, .single-equipment nav#sideNav li.menu-item-1602, .post-type-archive-centre nav#sideNav li.current-menu-item, .single-centre nav#sideNav li.current-menu-item { background: @navSecondary; } .tribe-mini-calendar-event .list-date { background: @furniture !important; } .tribe-mini-calendar-event .list-date .list-dayname { color: @furniture !important; }") . '</style>';
?>
<?php if(bci_get_option('googleanalytics') != '') { ?>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', '<?php echo bci_get_option('googleanalytics'); ?>', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<?php } ?>
</head>

<body <?php body_class(); ?>>

<nav id="sideNav">
	<div id="sideNavContainer">
	<?php
	$args = array(
		'theme_location'	=> 'side_icons',
		'menu'			  	=> 'side_icons',
		'container'		 	=> 'false',
		'container_class'   => '',
		'container_id'	  	=> '',
		'menu_class'		=> 'side_icons-main',
		'menu_id'		   	=> 'side_icons',
		'echo'			  	=> true,
		'fallback_cb'	  	=> 'wp_page_menu',
		'before'			=> '',
		'after'			 	=> '',
		'link_before'		=> '',
		'link_after'		=> '',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'				=> 0,
		);

	wp_nav_menu ($args);
	?>
	</div>
</nav>

<div id="container">

	<header class="site-header <?php has_announcements(); ?>" itemscope="" itemtype="http://schema.org/WPHeader">

	<?php
		if(is_page('Home')) {
			recent_posts(1);
		} else {}
	?>

		<?php the_custom_logo(); ?>

		<div id="navShow">
			<a href="#"><i class="nav-menu"></i></a>
		</div>

		<?php
			$inRoles = array();
			$allowedToAccess = array('administrator','editor');
		?>

		<div id="apps" class="<?php $user = wp_get_current_user(); if( current_user_can('editor') || current_user_can('administrator') ) { ?>wide<?php } ?>">
			<?php if( current_user_can('editor') || current_user_can('administrator') ) { ?>
				<a class="appsButton close dash" id="dash"  href="<?php echo admin_url(); ?>" title="Dashboard"><i class="nav-equalizer2"></i></a>
			<?php } ?>
			<a class="appsButton close search" id="search"  href="<?php bloginfo('url'); ?>/search/" title="Search"><i class="nav-search"></i></a>
			<?php if( is_user_logged_in() ) { ?>
			<a class="appsButton close editApps" id="editProfile"  href="<?php bloginfo('url'); ?>/my-profile/" title="Edit my profile"><i class="nav-useredit"></i></a>
			<a class="appsButton close editApps" id="editApps"  href="<?php bloginfo('url'); ?>/my-profile/my-apps/" title="Edit my apps"><i class="nav-cogs"></i></a>
			<a class="appsButton close" id="openApps" href="#" title="View my apps"><i class="nav-myapps"></i></a>
			<?php } ?>
		</div>

		<div id="userInfo">
			<?php
				global $current_user;
				get_currentuserinfo();
				$user = $current_user->first_name;
				$userID = $current_user->ID;
				$birthDay = get_user_meta( $userID, '_me_birthDay', true );
				$birthMonth = get_user_meta( $userID, '_me_birthMonth', true );
				date_default_timezone_set('Europe/London');
				$Hour = date('G');
				$Day = date('d');
				$Month = date('m');
				if($Day == $birthDay && $Month == $birthMonth) {
					echo "<i class='nav-cake'></i> Happy Birthday";
				} else {
					if ( $Hour >= 5 && $Hour <= 11 ) {
						echo "Good Morning";
					} else if ( $Hour >= 12 && $Hour <= 18 ) {
						echo "Good Afternoon";
					} else if ( $Hour >= 19 || $Hour <= 23 ) {
						echo "Good Evening";
					} else if ( $Hour >= 00 || $Hour <= 4 ) {
						echo "Good Night";
					}
				}
			?>
			 <a href="<?php bloginfo('url'); ?>/my-profile/" id="profile"><?php echo $user; ?></a><?php if($Day == $birthDay && $Month == $birthMonth) { ?>! <i class="nav-cake"></i><?php }?>
			<div id="time"><?php echo date_i18n('l jS F, Y', time()); ?></div>
			<div id="weather"></div>
		</div>


	</header>

	<div id="appNav">
		<div class="navScoller">
			<?php
				$user_id = $current_user->ID;
				$array = get_user_meta( $user_id, '_user_app', true );
				if( $array ) {
					foreach( $array as $key => $value) {
						$app_id = $value;
						$post_id = get_post($app_id);
				?>
					<div class="appHolder">
						<div class="appIcon" style="<?php $bg = get_post_meta( $app_id, "_app_colour", true ); ?>background: <?php echo $bg ?>; <?php $font = get_post_meta( $app_id, "_app_font", true ); if($font != '') { ?>color: <?php echo $font ?>;<?php } ?> ">
							<div>
							<?php $link = get_post_meta( $app_id, '_app_link', true ); if($link != '') : ?>
							<a href="<?php $link = get_post_meta( $app_id, '_app_link', true ); echo $link; ?>?=app" <?php $target = get_post_meta( $app_id, '_app_target', true ); if($target == 'on') : ?>target="_blank" rel="noopener"<?php endif; ?> style="color: <?php $font = get_post_meta( $app_id, '_app_font', true ); echo $font; ?>">
							<?php endif; ?>
								<i class="<?php $icon = get_post_meta( $app_id, '_app_icon', true ); echo $icon; ?>"></i>

							<?php $link = get_post_meta( $app_id, '_app_link', true ); if($link != '') : ?>
							</a>
							<?php endif; ?>
							</div>
						</div>
						<h5><?php echo $post_id->post_title; ?></h5>
					</div>
				<?php
					}
				} else {
					echo 'You have no apps in your App Dock.<br/>Please <a href="/my-profile/my-apps/" class="button"><i class="nav-plus"></i> add apps</a> to see them here.';
				}
			?>
		</div>
	</div>

	<?php
		if(is_page('Home')) {
	?>

	<div class="site-inner <?php has_announcements(); ?>">

	<?php
		} else {
	?>

	<div class="site-inner">

	<?php
		}
	?>
