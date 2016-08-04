<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('antibody'); ?>>
					<h2 class="page-title">Antibody</h2>
					<h2 class="page-title"><?php the_title(); ?></h2>
					<ul>
						<?php $contact = get_post_meta(get_the_ID(), '_anti_user', true); ?>
						<?php $centre = get_post_meta(get_the_ID(), '_anti_centre', true); ?>
						<?php $comment = get_post_meta(get_the_ID(), '_anti_comment', true); ?>
						<?php $company = get_post_meta(get_the_ID(), '_anti_company', true); ?>
						<?php $catalogue = get_post_meta(get_the_ID(), '_anti_catalogue', true); ?>
						<?php if($contact != '') { ?><li>Contact: <?php echo $contact; ?></li><?php } ?>
						<?php if($centre != '') { ?><li>Centre: <?php echo $centre; ?></li><?php } ?>
						<?php if($comment != '') { ?><li>Comment: <?php echo $comment; ?></li><?php } ?>
						<?php if($company != '') { ?><li>Company: <?php echo $company; ?></li><?php } ?>
						<?php if($catalogue != '') { ?><li>Catalogue: <?php echo $catalogue; ?></li><?php } ?>
					</ul>
				</div>
				<p><small><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small></p>
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