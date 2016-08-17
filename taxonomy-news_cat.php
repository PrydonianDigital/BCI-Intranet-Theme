<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

		<?php $term = get_queried_object(); ?>

			<h2 class="page-title"><?php echo $term->name; ?> Newsletter Archive</h2>

			<?php
				$args = array(
				    'post_type' => 'newsletter',
				    'news_cat' => $term->slug
				);
				$query = new WP_Query( $args );
			?>

			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('thumbnail', array( 'class' => 'alignleft' )); ?>
						</a>
					<?php endif; ?>
					<?php the_excerpt(); ?>
					<small class="meta">Posted on <?php the_time('l jS F, Y') ?> at <?php the_time() ?> and is filed under <?php echo $term->name; ?>.</small>
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