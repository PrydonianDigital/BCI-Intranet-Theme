<?php
	/*
	Template Name: Health & Safety
	*/
	get_header();
?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php
				$title = get_post_meta( get_the_ID(), "_word_title", true );
				$image = get_post_meta( get_the_ID(), "_word_image", true );
			?>
			<?php if($title != 'on') { ?>
				<h2 class="page-title"><?php the_title(); ?></h2>
			<?php } else {} ?>

			<?php if($image != 'on') { ?>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
			<?php endif; ?>
			<?php } else {} ?>

			<?php the_content(); ?>

			<h3>Local Safety Officers</h3>
			<?php
			$args = array (
				'number'			=> '-1',
				'meta_query'		=> array(
					'relation'  	=> 'AND',
					array(
						'key'		=> '_usercentre_main_safety',
						'value'		=> 'on',
						'compare'   => 'EXISTS',
					),
					array(
						'key'		=> '_usercentre_centre',
						'orderby'	=> 'menu_order',
						'order'		=> 'DESC'
					),
				)
			);
			$hands = new WP_User_Query( $args );
			if ( ! empty( $hands->results ) ) {
				foreach ( $hands->results as $user ) {
					$dept = get_post($user->_usercentre_centre);
					echo '<div class="row zebra ' .get_post_field( 'menu_order', $dept->ID) . ' ' . $user->_usercentre_centre . '">';
					echo '<div class="large-3 small-12 columns"><strong>' . $dept->post_title  . '</strong></div>';
					echo '<div class="large-4 small-12 columns">' . $user->first_name . ' ' . $user->last_name . '</div>';
					echo '<div class="large-2 small-12 columns"><i class="nav-phone"></i> x' . $user->_me_ext . '</div>';
					echo '<div class="large-3 small-12 columns"><i class="nav-envelope"></i> <a href="mailto:' . $user->user_email . '">' . $user->user_email . '</a></div>';
					echo '</div>';
				}
			} else {
				echo '<p>No people have this role.</p>';
			}
			?>
			<h3>First Aiders</h3>
			<?php
			$args = array (
				'number'			=> '-1',
				'meta_query'		=> array(
					'relation'  	=> 'AND',
					array(
						'key'	   => '_usercentre_first_aider',
						'value'	 => 'on',
						'compare'   => 'EXISTS',
					),
					array(
						'key'		=> '_usercentre_centre',
						'orderby'	=> 'menu_order',
						'order'		=> 'DESC'
					),
				)
			);
			$hands = new WP_User_Query( $args );
			if ( ! empty( $hands->results ) ) {
				foreach ( $hands->results as $user ) {
					$dept = get_post($user->_usercentre_centre);
					echo '<div class="row zebra">';
					echo '<div class="large-3 small-12 columns"><strong>' . $dept->post_title  . '</strong></div>';
					echo '<div class="large-4 small-12 columns">' . $user->first_name . ' ' . $user->last_name . '</div>';
					echo '<div class="large-2 small-12 columns"><i class="nav-phone"></i> x' . $user->_me_ext . '</div>';
					echo '<div class="large-3 small-12 columns"><i class="nav-envelope"></i> <a href="mailto:' . $user->user_email . '">' . $user->user_email . '</a></div>';
					echo '</div>';
				}
			} else {
				echo '<p>No people have this role.</p>';
			}
			?>
			<h3>Fire Marshals</h3>
			<?php
			$args = array (
				'number'			=> '-1',
				'meta_query'		=> array(
					'relation'  	=> 'AND',
					array(
						'key'	   => '_usercentre_fire_marshall',
						'value'	 => 'on',
						'compare'   => 'EXISTS',
					),
					array(
						'key'		=> '_usercentre_centre',
						'orderby'	=> 'menu_order',
						'order'		=> 'DESC'
					),
				)
			);
			$hands = new WP_User_Query( $args );
			if ( ! empty( $hands->results ) ) {
				foreach ( $hands->results as $user ) {
					$dept = get_post($user->_usercentre_centre);
					echo '<div class="row zebra">';
					echo '<div class="large-3 small-12 columns"><strong>' . $dept->post_title  . '</strong></div>';
					echo '<div class="large-4 small-12 columns">' . $user->first_name . ' ' . $user->last_name . '</div>';
					echo '<div class="large-2 small-12 columns"><i class="nav-phone"></i> x' . $user->_me_ext . '</div>';
					echo '<div class="large-3 small-12 columns"><i class="nav-envelope"></i> <a href="mailto:' . $user->user_email . '">' . $user->user_email . '</a></div>';
					echo '</div>';
				}
			} else {
				echo '<p>No people have this role.</p>';
			}
			?>

			<?php get_template_part('related/related'); ?>

			<small class="updated meta">("<em><?php the_title(); ?></em>" last updated <?php the_modified_date('jS F, Y'); ?>)<br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

		<?php endwhile; ?>

		<?php endif; ?>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>