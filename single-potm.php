<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2 class="page-title">Paper of the Month</h2>
					<h2><?php the_title(); ?></h2>
					<h3>Winner: <?php $winner = get_post_meta(get_the_ID(), '_potm_winner', true); echo $winner; ?></h3>
					<h4 class="authors"><?php $authors = get_post_meta(get_the_ID(), '_potm_authors', true); echo $authors; ?></h5>
					<h5 class="publication"><?php $publink = get_post_meta(get_the_ID(), '_potm_publink', true); if($publink != '') { ?><a href="<?php echo $publink; ?>"><?php } ?><?php $publication = get_post_meta(get_the_ID(), '_potm_pub', true); echo $publication; ?><?php if($publink != '') { ?></a><?php } ?></h5>
					<small class="meta"><?php $date = get_post_meta(get_the_ID(), '_potm_date', true); echo $date; ?><br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

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