<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2 class="page-title"><?php the_title(); ?></h2>

					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
					<?php endif; ?>

					<?php
						$args = array (
							'meta_query'     => array(
								array(
									'key'       => '_usercentre_centre_lead',
									'value'     => 'on',
									'compare'   => 'LIKE',
								),
								array(
									'key'       => '_usercentre_centre',
									'value'     => $post->ID,
									'compare'   => 'LIKE',
								),
							),
						);
						$lead = new WP_User_Query( $args );
						if ( ! empty( $lead->results ) ) {
							foreach ( $lead->results as $user ) {
								echo '<h3>Centre Lead: <a href="mailto:' . $user->user_email . '">' . $user->_me_ttitle . ' ' . $user->first_name . ' ' . $user->last_name . '</a></h3>';
							}
						} else {
							// no users found
						}
					?>

					<?php
						$args = array (
							'meta_query'     => array(
								array(
									'key'       => '_usercentre_centre_administrator',
									'value'     => 'on',
									'compare'   => 'LIKE',
								),
								array(
									'key'       => '_usercentre_centre',
									'value'     => $post->ID,
									'compare'   => 'LIKE',
								),
							),
						);
						$lead = new WP_User_Query( $args );
						if ( ! empty( $lead->results ) ) {
							foreach ( $lead->results as $user ) {
								echo '<h3>Centre Administrator: <a href="mailto:' . $user->user_email . '">' . $user->_me_ttitle . ' ' . $user->first_name . ' ' . $user->last_name . '</a></h3>';
							}
						} else {
							$email = get_post_meta(get_the_ID(), '_centre_admine', true);
							echo '<h3><a href="mailto:' . $email . '">Centre Administrator</a></h3>';
						}
					?>

					<?php
						$args = array (
							'meta_query'     => array(
								array(
									'key'       => '_usercentre_lab_manager',
									'value'     => 'on',
									'compare'   => 'LIKE',
								),
								array(
									'key'       => '_usercentre_centre',
									'value'     => $post->ID,
									'compare'   => 'LIKE',
								),
							),
						);
						$lead = new WP_User_Query( $args );
						if ( ! empty( $lead->results ) ) {
							foreach ( $lead->results as $user ) {
								echo '<h3>Lab Manager: <a href="mailto:' . $user->user_email . '">' . $user->_me_ttitle . ' ' . $user->first_name . ' ' . $user->last_name . '</a></h3>';
							}
						} else {
							// no users found
						}
					?>

					<?php
						$args = array (
							'meta_query'     => array(
								array(
									'key'       => '_usercentre_deputy_lab_manager',
									'value'     => 'on',
									'compare'   => 'LIKE',
								),
								array(
									'key'       => '_usercentre_centre',
									'value'     => $post->ID,
									'compare'   => 'LIKE',
								),
							),
						);
						$lead = new WP_User_Query( $args );
						if ( ! empty( $lead->results ) ) {
							foreach ( $lead->results as $user ) {
								echo '<h3>Deputy Lab Manager: <a href="mailto:' . $user->user_email . '">' . $user->_me_ttitle . ' ' . $user->first_name . ' ' . $user->last_name . '</a></h3>';
							}
						} else {
							// no users found
						}
					?>

					<?php $link = get_post_meta(get_the_ID(), '_centre_link', true); if($link != '') : ?>
					<h4>Centre web page: <a href="<?php echo $link; ?>" target="_blank" rel="noopener"><?php the_title(); ?></a></h4>
					<?php endif; ?>

					<?php $ml = get_post_meta(get_the_ID(), '_centre_ml', true); if($ml != '') : ?>
					<h4>Centre mailing list: <a href="mailto:<?php echo $ml; ?>"><i class="nav-envelope"></i> <?php echo $ml; ?></a></h4>
					<?php endif; ?>

					<?php the_content(); ?>

					<?php
					$connected = new WP_Query( array(
						'connected_type' => 'n2c',
						'connected_items' => get_queried_object(),
						'nopaging' => true,
					) );
					if ( $connected->have_posts() ) :
					?>

					<div class="row">
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
					<div <?php post_class('large-6 small-12 columns'); ?>>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
					<?php endwhile; ?>
					</div>
					<?php
					wp_reset_postdata();
					endif;
					?>

					<?php get_template_part( 'related/related' ); ?>

					<small class="updated meta">("<em><?php the_title(); ?></em>" last updated <?php the_modified_date('jS F, Y'); ?>)<br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

				</div>

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