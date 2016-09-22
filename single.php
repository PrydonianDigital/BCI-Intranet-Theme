<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2><?php the_title(); ?></h2>

					<?php if (class_exists('MultiPostThumbnails')) : ?>
					<div class="alignleft">
					<?php MultiPostThumbnails::the_post_thumbnail(
							get_post_type(),
							'secondary-image',
							NULL,
							'post-secondary-image-thumbnail'
						);
					?>
					</div>
					<?php endif; ?>

					<?php the_content(); ?>

					<?php get_template_part('related/related'); ?>

					<small>This entry was posted on <?php the_time('l jS F, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?><br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

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