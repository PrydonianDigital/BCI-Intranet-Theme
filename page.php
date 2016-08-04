<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h2 class="page-title"><?php the_title(); ?></h2>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
			<?php endif; ?>

			<?php the_content(); ?>

			<?php get_template_part( 'related/related' ); ?>

			<div class="sitemap">
				<?php
				$children = get_pages('child_of='.$post->ID);
				if( count( $children ) != 0 ) {
					if($post->post_parent){
					    $parent_title = get_the_title($post->post_parent);
					    $children = wp_list_pages("title_li=&include=".$post->post_parent."&echo=0");
					    $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
					} else {
					    $parent_title = get_the_title($post->ID);
					    $children = wp_list_pages("title_li=&include=".$post->ID."&echo=0");
					    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
					}
					if ($parent_title) { ?>
					    <h2><?php echo $parent_title; ?> Sub Pages <i class="nav-plus-circle"></i></h2>
					<?php }

					if ($children) { ?>
					    <ul class="submenu">
					        <?php echo $children; ?>
					    </ul>
					<?php }
				}
				?>
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