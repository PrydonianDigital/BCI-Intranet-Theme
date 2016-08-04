<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-8 columns">

			<h2 class="page-title">Newsletter Archive</h2>

		<?php
		$getdate = getdate();
		$args = array (
			'post_type'				=> array( 'newsletter' ),
			'posts_per_page'		=> -1,
			'date_query'			=> array(
				array(
					'year'  => $getdate["year"]
				),
			)
		);
		$this_year = new WP_Query( $args );
		if ( $this_year->have_posts() ) {
		?>
		<h3><?php echo $getdate["year"]; ?></h3>
		<?php
			while ( $this_year->have_posts() ) {
				$this_year->the_post();
		?>
				<div <?php post_class('news'); ?>>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('thumbnail', array( 'class' => 'alignleft' )); ?>
						</a>
					<?php endif; ?>

					<?php the_excerpt(); ?>

					<p><a href="<?php $pdf = get_post_meta( get_the_ID(), '_newsletter_pdf', true ); echo $pdf; ?>">Download <?php the_title(); ?></a></p>

					<small class="meta">Posted on <?php the_time('l jS F, Y') ?>.</small>
				</div>
		<?php
			}
		} else {
		}
		wp_reset_postdata();
		?>

		<?php
		$year = date("Y");
		$previousyear = $year -1;
		$args = array (
			'post_type'				=> array( 'newsletter' ),
			'posts_per_page'		=> -1,
			'date_query'			=> array(
				array(
					'year'  => $previousyear
				),
			)
		);
		$this_year = new WP_Query( $args );
		if ( $this_year->have_posts() ) {
		?>
		<h3><?php echo $previousyear; ?></h3>
		<?php
			while ( $this_year->have_posts() ) {
				$this_year->the_post();
		?>
				<div <?php post_class('news'); ?>>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('thumbnail', array( 'class' => 'alignleft' )); ?>
						</a>
					<?php endif; ?>

					<?php the_excerpt(); ?>

					<p><a href="<?php $pdf = get_post_meta( get_the_ID(), '_newsletter_pdf', true ); echo $pdf; ?>">Download <?php the_title(); ?></a></p>

					<small class="meta">Posted on <?php the_time('l jS F, Y') ?>.</small>
				</div>
		<?php
			}
		} else {
		}
		wp_reset_postdata();
		?>

		<?php
		$year = date("Y");
		$previousyear = $year -1;
		$args = array (
			'post_type'				=> array( 'newsletter' ),
			'posts_per_page'		=> -1,
			'date_query'			=> array(
				array(
					'before'  => $previousyear
				),
			)
		);
		$this_year = new WP_Query( $args );
		if ( $this_year->have_posts() ) {
		?>
		<h3>Previous Years Archive</h3>
		<?php
			while ( $this_year->have_posts() ) {
				$this_year->the_post();
		?>
				<div <?php post_class('news'); ?>>
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('thumbnail', array( 'class' => 'alignleft' )); ?>
						</a>
					<?php endif; ?>

					<?php the_excerpt(); ?>

					<p><a href="<?php $pdf = get_post_meta( get_the_ID(), '_newsletter_pdf', true ); echo $pdf; ?>">Download <?php the_title(); ?></a></p>

					<small class="meta">Posted on <?php the_time('l jS F, Y') ?>.</small>
				</div>
		<?php
			}
		} else {
		}
		wp_reset_postdata();
		?>

		</div>

		<aside class="small-12 large-4 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets"><?php dynamic_sidebar('main'); ?></ul>

		</aside>

	</div>

<?php get_footer(); ?>