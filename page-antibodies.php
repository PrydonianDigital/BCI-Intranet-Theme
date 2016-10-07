<?php
	get_header();
	$search = new WP_Advanced_Search('antibody');
?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php
				$title = get_post_meta( get_the_ID(), "_word_title", true );
				$image = get_post_meta( get_the_ID(), "_word_image", true );
			?>
			<?php if($title != 'on') { ?>
				<h2 class="page-title"><?php the_title(); ?></h2>
			<?php } else {} ?>

			<?php the_content(); ?>

			<div class="row">
				<h2>Antibody Search</h2>
				<div class="large-6 small-12 columns">
					<?php $search->the_form(); ?>
				</div>

				<div class="large-6 small-12 columns">
					<div id="wpas-results"></div>
				</div>

			</div>

			<small class="updated meta">("<em><?php the_title(); ?></em>" last updated <?php the_modified_date('jS F, Y'); ?>)<br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

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