<?php get_header(); ?>

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

			<?php if($image != 'on') { ?>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
			<?php endif; ?>
			<?php } else {} ?>

			<?php echo do_shortcode('[cmb-form id="_user_edit_metabox"]'); ?>

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