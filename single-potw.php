<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2 class="page-title"><?php the_title(); ?></h2>
					<?php the_post_thumbnail('full', array( 'class' => 'aligncenter' )); ?>
					<h6>Photo by:
					<?php
						$users = get_post_meta( get_the_ID(), '_potw_user', true );
						$user_split = explode( ',', str_replace( ' ', '', $users ) );
						foreach ( $user_split as $user ) {
						    $user = get_user_by( 'id', $user );
						    $name = trim( $user->display_name ) ? $user->display_name : $user->user_login;
						    echo $name . ' ';
						}
					?></h6>
					<small class="meta"><?php the_time('l jS F, Y') ?><br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

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