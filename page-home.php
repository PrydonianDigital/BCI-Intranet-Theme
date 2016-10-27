<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<div class="row">

				<div class="large-4 small-12 columns">
					<?php
						$args = array (
							'post_type' => array( 'tribe_events' ),
							'posts_per_page' => bci_get_option('homeevents'),
							'tax_query'			=> array(
								array(
									'taxonomy' 	=> 'tribe_events_cat',
									'field' 	=> 'slug',
									'terms' 	=> 'bci-events',
								),
							)
						);
						$events = new WP_Query( $args );
						if ( $events->have_posts() ) :
						echo '<div class="row"><div class="large-12 small-12 columns"><h4 class="home-category">BCI Events</h4></div></div>';
						while ( $events->have_posts() ): $events->the_post();
					?>
					<div class="row">
						<div <?php post_class('home-news event small-12 large-12 columns'); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail('thumbnail-news', array( 'class' => 'aligncenter' )); ?>
								</a>
							<?php endif; ?>
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<?php echo tribe_events_event_schedule_details( $event_id, '<small class="meta">', '</small>' ); ?>
							<?php the_excerpt(); ?>
						</div>
					</div>
					<?php
						endwhile; endif;
						wp_reset_postdata();
					?>
				</div>

				<div class="large-4 small-12 columns">
					<?php
						$args = array (
							'post_type' => array( 'post' ),
							'posts_per_page' => bci_get_option('homenews')
						);
						$news = new WP_Query( $args );
						if ( $news->have_posts() ) :
						echo '<div class="row"><div class="large-12 small-12 columns"><h4 class="home-category">Latest News</h4></div></div>';
						while ( $news->have_posts() ): $news->the_post();
					?>
					<div class="row">
						<div <?php post_class('home-news event small-12 large-12 columns'); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail('thumbnail-news', array( 'class' => 'aligncenter' )); ?>
								</a>
							<?php endif; ?>
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<small class="meta"><?php the_time('l jS F, Y') ?></small>
							<?php the_excerpt(); ?>
						</div>
					</div>
					<?php
						endwhile; endif;
						wp_reset_postdata();
					?>
				</div>

				<div class="large-4 small-12 columns">
					<ul class="widgets">
						<?php dynamic_sidebar('homeright'); ?>
					</ul>
				</div>

			</div>

			<?php
			$args = array(
				'post_type'	  => 'potw',
				'posts_per_page' => '3',
			);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) : ?>
			<div class="row">
				<div class="large-12 small-12 columns">
					<h4 class="home-category featured">Picture of the Week</h4>
					<div class="featured owl-carousel" id="featured-slider">
					<?php while ( $loop->have_posts() ) : $loop->the_post();
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				?>
								<article class="item large-12 small-12 columns" style="background-image: url(<?php echo $url; ?>)">
									<div>
									<h2><?php the_title(); ?></h2>
									<?php the_excerpt(); ?>
									<a class="readmore" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><i class="nav-file-photo-o"></i> View Picture</a>
									<a class="readmore" href="/social/picture-of-the-week/"><i class="nav-file-photo-o"></i> View All</a>
									</div>
								</article>
				<?php
					endwhile;
				?>
					</div>
				<?php
					endif;

					wp_reset_postdata();
				?>
				</div>
			</div>

		<?php
			$i = 1;
			$args = array (
				'post_type' => array( 'tribe_events' ),
				'posts_per_page' => 6,
				'tax_query'			=> array(
					array(
						'taxonomy' 	=> 'tribe_events_cat',
						'field' 	=> 'slug',
						'terms' 	=> array('conferences', 'grants'),
					),
				)
			);
			$events = new WP_Query( $args );
			if ( $events->have_posts() ) :
			echo '<div class="row"><div class="large-12 small-12 columns"><h4 class="home-category">Upcoming Conferences &amp; Grant Opportunities</h4></div>';
			while ( $events->have_posts() ): $events->the_post();
		?>
			<div <?php post_class('home-news event small-12 large-4 columns'); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('thumbnail-news', array( 'class' => 'aligncenter' )); ?>
					</a>
				<?php endif; ?>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php echo tribe_events_event_schedule_details( $event_id, '<small class="meta">', '</small>' ); ?>
				<?php the_excerpt(); ?>
			</div>
		<?php
			if($i % 3 == 0) {echo '</div><div class="row">';}
			$i++; endwhile; endif;
			wp_reset_postdata();
			echo '</div>';
		?>

		<?php
//			$args = array('parent' => 0);
//			$cats = get_categories($args);
//			foreach ($cats as $cat) {
//				$hide = get_term_meta( $cat->term_id, "_cat_hide", true );
//				if($hide != 'on') {
//					echo '<div class="row">';
//					$cat_id= $cat->term_id;
//					echo '<div class="large-12 small-12 columns"><h4 class="home-category">Latest news in '.$cat->name.'</h4></div>';
//					$the_query = new WP_Query(
//						array(
//							'category_name' => $cat->slug,
//							'posts_per_page' => 3,
//							'post__not_in' => get_option( 'sticky_posts' )
//						)
//					);
//					if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
//					?>
						<!--div <?php post_class('home-news small-12 large-4 columns'); ?>>
//						<?php if ( has_post_thumbnail() ) : ?>
//							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
//								<?php the_post_thumbnail('thumbnail-news', array( 'class' => 'aligncenter' )); ?>
//							</a>
//						<?php endif; ?>
//						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
//						<small class="meta"><?php the_time('l jS F, Y') ?></small>
//						<?php the_excerpt(); ?>
//						</div-->
					<?php //endwhile; endif;
//					echo '</div>';
//				}
//			}
		?>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('homesidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>