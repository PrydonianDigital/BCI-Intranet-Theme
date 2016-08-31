<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php include_once('analytics.php') ?>
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

	<header class="site-header" itemscope="" itemtype="http://schema.org/WPHeader">
	<?php
		if(is_page('Home')) {
			$args = array (
				'post_type' => array( 'announcement' ),
				'posts_per_page' => '1',
			);
			$argh = new WP_Query( $args );

			if ( $argh->have_posts() ) {
				while ( $argh->have_posts() ) {
					$argh->the_post();
			?>
			<div id="announcement">
				<div id="announcementClose">
					<i class="nav-close2"></i>
				</div>
					<div>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
				</a>
			</div>
			<?php
				}
			} else {}
			wp_reset_postdata();
		}
	?>
		<?php the_custom_logo(); ?>

		<div id="navShow">
			<a href="#"><i class="nav-menu"></i></a>
		</div>

		<div id="apps" class="<?php $user = wp_get_current_user(); if ( in_array( 'administrator', (array) $user->roles ) ) { ?>wide<?php } ?>">
			<?php if(current_user_can('activate_plugins')) { ?>
				<a class="appsButton close dash" id="dash"  href="<?php echo admin_url(); ?>" title="Dashboard"><i class="nav-equalizer2"></i></a>
			<?php } ?>
			<a class="appsButton close search" id="search"  href="<?php bloginfo('url'); ?>/search/" title="Search"><i class="nav-search"></i></a>
			<a class="appsButton close editApps" id="editProfile"  href="<?php bloginfo('url'); ?>/my-profile/" title="Edit my profile"><i class="nav-useredit"></i></a>
			<a class="appsButton close editApps" id="editApps"  href="<?php bloginfo('url'); ?>/my-profile/my-apps/" title="Edit my apps"><i class="nav-cogs"></i></a>
			<a class="appsButton close" id="openApps" href="#" title="View my apps"><i class="nav-myapps"></i></a>
		</div>

		<div id="userInfo">
			<?php
				global $current_user;
				get_currentuserinfo();
				$user = $current_user->first_name;
				$userID = $current_user->ID;
				$birthday = get_user_meta( $userID, '_me_birth', true );
				date_default_timezone_set('Europe/London');
				$Hour = date('G');
				$Day = date('d M');
				if($Day == $birthday) {
					echo "<i class='nav-balloons'></i> Happy Birthday";
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
			 <a href="<?php bloginfo('url'); ?>/my-profile/" id="profile"><?php echo $user; ?></a><?php if($Day == $birthday) { ?>! <i class="nav-balloons"></i><?php }?>
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
							<a href="<?php $link = get_post_meta( $app_id, '_app_link', true ); echo $link; ?>" <?php $target = get_post_meta( $app_id, '_app_target', true ); if($target == 'on') : ?>target="_blank"<?php endif; ?> style="color: <?php $font = get_post_meta( $app_id, '_app_font', true ); echo $font; ?>">
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

	<div class="site-inner">