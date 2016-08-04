<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2><?php the_title(); ?></h2>
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
					<?php endif; ?>

					<?php the_content(); ?>

					<small>This entry was posted on <?php the_time('l jS F, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?><br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

					<?php
						$members = get_post_meta( get_the_ID(), '_link_link', true );
						$output = '';
						if ( empty( $members ) ) {
							echo $output;
						}
						$output .= '<ul class="links">';
						foreach ( $members as $member ) {
							$output .= '<li>';
							$output .= '<a href="'. esc_html( $member['url'] ) .'" target="_blank">';
							$output .= esc_html( $member['title'] );
							$output .= '</a>';
							$output .= '</li>';
						}
						$output .= '</ul>';
						echo $output;
					?>

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