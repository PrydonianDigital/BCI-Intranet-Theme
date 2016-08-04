<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('antibody'); ?>>
					<h2 class="page-title">Equipment</h2>
					<h2 class="page-title"><?php the_title(); ?></h2>
					<div <?php post_class('news'); ?>>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<ul>
							<?php $contact = get_post_meta(get_the_ID(), '_equip_user', true); ?>
							<?php $centre = get_post_meta(get_the_ID(), '_equip_centre', true); ?>
							<?php $room = get_post_meta(get_the_ID(), '_equip_room', true); ?>
							<?php $share = get_post_meta(get_the_ID(), '_equip_share', true); ?>
							<?php if($centre != '') { ?><li>Centre: <?php echo $centre; ?></li><?php } ?>
							<?php if($contact != '') { ?><li>Contact: <?php echo $contact; ?></li><?php } ?>
							<?php if($room != '') { ?><li>Room #: <?php echo $room; ?></li><?php } ?>
							<?php if($share != '') { ?><li>Equipment for Shared Use: <?php echo $share; ?></li><?php } ?>
						</ul>
					</div>
				<p><small><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small></p>
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