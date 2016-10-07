<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php
				$title = get_post_meta( get_the_ID(), "_word_title", true );
				$image = get_post_meta( get_the_ID(), "_word_image", true );
			?>
			<?php if($title != 'on') { ?>
				<h2 class="page-title">Book A Room</h2>
			<?php } else {} ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

			<?php endwhile; ?>

			<?php endif; ?>

			<?php
			$args = array(
				'post_type' => 'tribe_venue',
				'tax_query' => array(
					array(
						'taxonomy' => 'venue_cat',
						'field' => 'slug',
						'terms' => 'qmul',
					)
				)
			);
			$wp_query = new WP_Query($args);
			if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div <?php post_class('news'); ?>>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('thumbnail', array( 'class' => 'alignleft' )); ?>
					</a>
				<?php endif; ?>
				<?php the_excerpt(); ?>
			</div>
			<?php endwhile; ?>
			<?php else : ?>
				<h2>Not Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
			<?php endif; ?>

			<?php get_template_part('related/related'); ?>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>