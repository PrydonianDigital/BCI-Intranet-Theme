<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class('news'); ?>>
					<h2><?php the_title(); ?></h2>
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
					<?php endif; ?>

					<?php
					$entries = get_post_meta( get_the_ID(), 'doc_version', true );
					foreach ((array) $entries as $key => $entry) {
						$doc = '';
						if ( isset( $entry['_doc'] ) )
							$doc = esc_html( $entry['_doc'] );
							if(end($entries) == $entry) {
								echo 'Download: <a href="' . $doc . '" target="_blank" rel="noopener">' . get_the_title() . '</a>';
							}
					}
					?>

					<?php $desc = get_post_meta( get_the_ID(), 'doc_desc', true ); ?>
					<?php if($desc != '') { ?>
					<p><?php echo $desc; ?></p>
					<?php } ?>

					<small class="updated meta">Last updated by: <?php the_modified_author(); ?> on <?php the_modified_date('jS F, Y'); ?></small>

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