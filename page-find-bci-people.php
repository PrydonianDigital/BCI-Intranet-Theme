<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<h2 class="page-title"><?php the_title(); ?></h2>

				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
				<?php endif; ?>

				<?php
				$args = array (
					'number'         => '-1',
					'order'          => 'ASC',
					'orderby'        => 'last_name',
				);
				$all_users = new WP_User_Query( $args );
				if ( ! empty( $all_users->results ) ) {
				?>
				<ul class="users">
				<?php
					foreach ( $all_users->results as $user ) {
				?>
					<li>
						<?php echo get_avatar( $user->ID, 32 ); ?>
						<a href="<?php echo get_author_posts_url( $user->ID ); ?>"><?php echo $user->_me_ttitle; ?> <?php echo $user->first_name; ?> <?php echo $user->last_name; ?></a>
						<br />
						<?php
							if($user->_usercentre_centre_lead == 'on') {
								echo 'Centre Lead';
							}
							if($user->_usercentre_centre_administrator == 'on') {
								echo 'Centre Administrator';
							}
							if($user->_usercentre_lab_manager == 'on') {
								echo 'Laboratory Manager';
							}
							if($user->_usercentre_deputy_lab_manager == 'on') {
								echo 'Deputy Laboratory Manager';
							}
						?>
						<?php echo $user->_me_title; ?> - <?php echo get_the_title($user->_usercentre_centre); ?>
					</li>
				<?php
					}
				?>
				</ul>
				<?php
				} else {
					// no users found
				}
				?>

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