<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2 class="page-title"><?php the_title(); ?></h2>

					<?php if (class_exists('MultiPostThumbnails')) :
						MultiPostThumbnails::the_post_thumbnail(
							get_post_type(),
							'secondary-image',
							NULL,
							'post-secondary-image-thumbnail alignright'
						);
					endif; ?>

					<?php
						$notices = Post_Connector::API()->get_children( 'centre-to-notice', get_the_ID() );
						if ( ! empty( $notices ) ) {
							echo '<div class="row">';
							echo '<div class="small-12 large-12 column">';
							echo '<h3>Notices</h3>';
							echo '</div>';
							echo '</div>';
							echo '<div class="row" id="notices">';
							foreach( $notices as $notice ) {
								echo '<div class="small-12 large-6 column end">';
								echo '<div class="notice">';
								echo '<h3><a href="'. $notice->guid . '">'. $notice->post_title . '</a></h3>';
								echo $notice->post_excerpt;
								echo '</div>';
								echo '</div>';
							}
							echo '</div>';
						}
					?>

					<?php the_content(); ?>

					<?php get_template_part('related/related'); ?>

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