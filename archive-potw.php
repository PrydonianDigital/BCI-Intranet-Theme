<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<h2 class="page-title">Picture of the Week Archive</h2>

			<?php
				$args = array(
					'post_type'			=> 'potw',
					'posts_per_page'	=> -1
				);
				$potw = new WP_Query($args);
			?>

			<?php if ($potw->have_posts()) : $postCount = 0; while ($potw->have_posts()) : $postCount++; $potw->the_post(); ?>

				<?php if($postCount == 1) { ?>

					<div class="row bottomMargin">
						<div class="small-12 large-12 columns potw center">
							<h3>This week's picture</h3>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?></a>
							<h2><?php the_title(); ?></h2>
							<h3>Photo by: <?php $photo = get_post_meta(get_the_ID(), '_potw_user', true); echo $photo; ?></h3>
							<small class="meta"><?php the_time('l jS F, Y') ?></small>
						</div>
					</div>

				<?php } else { ?>

					<div class="small-12 large-3 columns potw center">
						<small class="meta"><?php the_time('l jS F, Y') ?></small>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('display', array( 'class' => 'aligncenter' )); ?></a>
					</div>

				<?php } ?>

			<?php endwhile; ?>

			<?php wp_pagenavi(); ?>

			<?php endif; ?>

			</div>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>