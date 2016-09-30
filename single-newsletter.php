<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>

					<h2><?php the_title(); ?></h2>

					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
					<?php endif; ?>
					<div class="newslettercontent">
					<?php the_content(); ?>
					</div>
					<small>This entry was posted on <?php the_time('l jS F, Y') ?> at <?php the_time() ?></small>

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