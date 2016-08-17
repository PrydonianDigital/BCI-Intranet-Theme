<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2><?php the_title(); ?></h2>
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
					<?php endif; ?>

					<?php the_content(); ?>

					<small>This entry was posted on <?php the_time('l jS F, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?><br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

	<?php
	$p2l2 = new WP_Query( array(
		'connected_type' => 'p2l2',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $p2l2->have_posts() ) : ?>
	<div class="large-6 small-12 columns">
		<h2>Related Links</h2>
		<ul class="links">
		<?php while ( $p2l2->have_posts() ) : $p2l2->the_post(); ?>
			<li><a href="<?php $link = get_post_meta(get_the_ID(), 'link_url', true); echo $link; ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata();
	endif;
	?>

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