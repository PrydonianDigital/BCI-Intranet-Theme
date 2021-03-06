<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<h2 class="page-title">Centres</h2>

			<?php
			$args = array (
				'post_type'			  => array( 'centre' ),
				'posts_per_page'		 => -1,
				'meta_query'			 => array(
					array(
						'key'	   => '_centre_no',
						'value'	 => 'on',
						'compare'   => 'NOT EXISTS',
					),
				),
				'orderby'				 => 'menu_order',
				'order'				 	 => 'ASC',
			);
			$centre = new WP_Query( $args );
			if ( $centre->have_posts() ) {
				while ( $centre->have_posts() ) {
					$centre->the_post();
			?>
				<div <?php post_class('news'); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php if (class_exists('MultiPostThumbnails')) :
						MultiPostThumbnails::the_post_thumbnail(
							get_post_type(),
							'secondary-image',
							NULL,
							'post-secondary-image-thumbnail'
						);
					endif; ?>
					<?php the_excerpt(); ?>
					<p class="centreLead">Centre Lead:
						<?php
							$args = array (
								'meta_query'	 => array(
									array(
										'key'	   => '_usercentre_centre_lead',
										'value'	 => 'on',
										'compare'   => 'LIKE',
									),
									array(
										'key'	   => '_usercentre_centre',
										'value'	 => $post->ID,
										'compare'   => 'LIKE',
									),
								),
							);
							$lead = new WP_User_Query( $args );
							if ( ! empty( $lead->results ) ) {
								foreach ( $lead->results as $user ) {
									echo $user->_me_title . ' ' . $user->first_name . ' ' . $user->last_name;
								}
							} else {
								// no users found
							}
						?>
					</p>
				</div>
			<?php
				}
			} else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();
			?>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>