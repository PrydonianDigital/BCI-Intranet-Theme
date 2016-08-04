<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<h2 class="page-title">Paper of the Month Archive</h2>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<h2 class="paperDate"><?php $date = get_post_meta(get_the_ID(), '_potm_date', true); echo $date; ?></h2>
					<h3>Winner: <?php $winner = get_post_meta(get_the_ID(), '_potm_winner', true); echo $winner; ?></h3>
					<h4 class="authors"><?php $authors = get_post_meta(get_the_ID(), '_potm_authors', true); echo $authors; ?></h5>
					<h5 class="publication"><?php $publication = get_post_meta(get_the_ID(), '_potm_pub', true); echo $publication; ?></h5>
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