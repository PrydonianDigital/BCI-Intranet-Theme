<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php
				$stickies = get_option( 'sticky_posts' );
				if ( $stickies ) {
					$args = [
						'post_type'				=> 'post',
						'post__in'				=> $stickies,
						'ignore_sticky_posts'	=> 1
					];
					$the_query = new WP_Query($args);
					if ( $the_query->have_posts() ) {
			?>
			<div class="featured owl-carousel row" id="featured-slider">
			<?php
						while ( $the_query->have_posts() ) {
								$the_query->the_post();
								$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

			?>
					<article class="item large-12 small-12 columns" style="background-image: url(<?php echo $url; ?>)">
					<div>
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
					<a class="readmore" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read more</a>
					</div>
				</article>
			<?php

						}
						wp_reset_postdata();
					}
			?>
			</div>
			<?php
				}
			?>

			<?php
			$defaults = [
			    'fields'                 => 'ids',
			    'update_post_term_cache' => false,
			    'update_post_meta_cache' => false,
			    'cache_results'          => false
			];
			$args = [
			    'post_type'      => 'potw',
			    'posts_per_page' => '1',
			];
			$args1 = [
			    'post_type'      => 'potm',
			    'posts_per_page' => '1',
			];
			$post_query = get_posts( array_merge( $defaults, $args  ) );
			$page_query = get_posts( array_merge( $defaults, $args1 ) );
			$post_ids = array_merge ( $post_query, $page_query ); //. You can swop around here
			if ( $post_ids ) {
			    $final_args = [
			        'post_type' => ['potw', 'potm'],
			        'post__in'  => $post_ids,
			        'orderby'   => 'post__in', // If you need to keep the order from $post_ids
			        'order'     => 'ASC' // If you need to keep the order from $post_ids
			    ];
			    $loop = new WP_Query( $final_args );
				if ( $loop->have_posts() ) : ?>
			<div class="row">
				<div class="large-12 small-12 columns">
					<h4 class="home-category">Picture of the Week / Paper of the Month</h4>
					<div class="featured owl-carousel" id="featured-slider">
					<?php while ( $loop->have_posts() ) : $loop->the_post();
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				?>
								<article class="item large-12 small-12 columns" style="background-image: url(<?php echo $url; ?>)">
									<div>
									<h4>
										<?php
											$post_type = get_post_type( $post->ID );
											switch( $post_type ) {
												case 'potw':
													echo 'Picture of the Week';
												break;
												case 'potm':
													echo 'Paper of the Month';
												break;
											}
										?>
									</h4>
									<h2><?php the_title(); ?></h2>
									<?php the_excerpt(); ?>
									<a class="readmore" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read more</a>
									</div>
								</article>
				<?php
					endwhile;
				?>
					</div>
				<?php
					endif;

					wp_reset_postdata();
				}
				?>
				</div>
			</div>

			<!--div class="row">

				<div class="small-12 large-6 columns center potw">
					<h3>Picture of the Week</h3>
					<?php
						$args = array (
							'post_type' => array( 'potw' ),
							'posts_per_page' => '1',
						);
						$potw = new WP_Query( $args );

						if ( $potw->have_posts() ) {
							while ( $potw->have_posts() ) {
								$potw->the_post();
						?>
						<div id="potw">
							<div>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('display', array( 'class' => 'aligncenter' )); ?></a>
								<h5><?php the_title(); ?></h5>
								<h6>Photo by:
								<?php
									$users = get_post_meta( get_the_ID(), '_potw_user', true );
									$user_split = explode( ',', str_replace( ' ', '', $users ) );
									foreach ( $user_split as $user ) {
									    $user = get_user_by( 'id', $user );
									    $name = trim( $user->display_name ) ? $user->display_name : $user->user_login;
									    echo $name . ' ';
									}
								?></h6>
								<small class="meta"><?php the_time('l jS F, Y') ?></small>
							</div>
						</div>
						<?php
							}
						} else {}
						wp_reset_postdata();
					?>
					<a href="/potw/">See all</a>
				</div>

				<div class="small-12 large-6 columns center potm">
					<h3>Paper of the Month</h3>
					<?php
						$args = array (
							'post_type' => array( 'potm' ),
							'posts_per_page' => '1',
						);
						$potm = new WP_Query( $args );

						if ( $potm->have_posts() ) {
							while ( $potm->have_posts() ) {
								$potm->the_post();
						?>
						<div id="potm">
							<div>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('display', array( 'class' => 'aligncenter' )); ?></a>
								<h5><?php the_title(); ?></h5>
								<h6>Winner: <?php $winner = get_post_meta(get_the_ID(), '_potm_winner', true); echo $winner; ?></h6>
								<small class="meta"><?php $date = get_post_meta(get_the_ID(), '_potm_date', true); echo $date; ?></small>
							</div>
						</div>
						<?php
							}
						} else {}
						wp_reset_postdata();
					?>
					<a href="/potm/">See all</a>
				</div>

			</div-->

		<?php
			$args = array('parent' => 0);
			$cats = get_categories($args);
				foreach ($cats as $cat) {
					echo '<div class="row">';
					$cat_id= $cat->term_id;
					echo '<div class="large-12 small-12 columns"><h4 class="home-category">Latest news in '.$cat->name.'</h4></div>';
					$the_query = new WP_Query(
						array(
							'category_name' => $cat->slug,
							'posts_per_page' => 3,
							'post__not_in' => get_option( 'sticky_posts' )
						)
					);
					if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
					?>
						<div <?php post_class('home-news small-12 large-4 columns'); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail('thumbnail-news', array( 'class' => 'aligncenter' )); ?>
							</a>
						<?php endif; ?>
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<small class="meta"><?php the_time('l jS F, Y') ?></small>
						<?php the_excerpt(); ?>
						</div>
					<?php endwhile; endif;
					echo '</div>';
				} ?>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('homesidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>