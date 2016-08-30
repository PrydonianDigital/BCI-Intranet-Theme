<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<h2 class="page-title">Latest News</h2>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php if (class_exists('MultiPostThumbnails')) :
					    MultiPostThumbnails::the_post_thumbnail(
					        get_post_type(),
					        'secondary-image'
					    );
					endif; ?>
					<?php the_excerpt(); ?>
					<small class="meta">Posted on <?php the_time('l jS F, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?>.</small>
				</div>

			<?php endwhile; ?>
			<?php wp_pagenavi(); ?>
			<?php endif; ?>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>