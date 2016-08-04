<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<h2 class="page-title"><?php the_title(); ?></h2>

				<?php global $current_user; get_currentuserinfo();
				$userID = $current_user->ID; echo get_avatar( $userID, 64 ); ?>

				<?php echo do_shortcode('[cmb-form id="_me_edit_metabox"]'); ?>

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