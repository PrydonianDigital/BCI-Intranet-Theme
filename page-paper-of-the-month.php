<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php $title = get_post_meta( get_the_ID(), "_word_title", true ); ?>
			<?php if($title != 'on') { ?>
				<h2 class="page-title"><?php the_title(); ?></h2>
			<?php } else {} ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
			<?php endif; ?>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php endif; ?>

			<?php
			$args = array (
				'post_type'              => array( 'potm' ),
			);
			$potm = new WP_Query( $args );

			// The Loop
			if ( $potm->have_posts() ) : while ( $potm->have_posts() ) : $potm->the_post();
			?>
				<div <?php post_class('news'); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<h2 class="paperDate"><?php $date = get_post_meta(get_the_ID(), '_potm_date', true); echo $date; ?></h2>
					<h3>Winner: <?php $winner = get_post_meta(get_the_ID(), '_potm_winner', true); echo $winner; ?></h3>
					<h4 class="authors"><?php $authors = get_post_meta(get_the_ID(), '_potm_authors', true); echo $authors; ?></h5>
					<h5 class="publication"><?php $publication = get_post_meta(get_the_ID(), '_potm_pub', true); echo $publication; ?></h5>
				</div>
			<?php
			endwhile;
			wp_pagenavi();
			endif;
			wp_reset_postdata();
			?>

			<?php get_template_part('related/related'); ?>

			<small class="updated meta">("<em><?php the_title(); ?></em>" last updated <?php the_modified_date('jS F, Y'); ?>)<br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>