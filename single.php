<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
					$title = get_post_meta( get_the_ID(), "_word_title", true );
					$image = get_post_meta( get_the_ID(), "_word_image", true );
				?>

				<div <?php post_class('news'); ?>>

					<?php if($title != 'on') { ?>
					<h2><?php the_title(); ?></h2>
					<?php } else {} ?>

					<?php if($image != 'on') { ?>
					<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
					<?php } else {} ?>

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