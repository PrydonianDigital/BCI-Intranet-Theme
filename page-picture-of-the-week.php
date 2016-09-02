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
			<?php
			$args = array (
				'post_type'			=> array( 'potw' ),
				'posts_per_page'	=> '1',
			);
			$potw = new WP_Query( $args );
			if ( $potw->have_posts() ) {
				while ( $potw->have_posts() ) {
					$potw->the_post();
			?>
			<div class="row bottomMargin">
				<div class="small-12 large-12 columns potw center">
					<h3>This week's picture</h3>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?></a>
					<h5><?php the_title(); ?></h5>
					<h3>Photo by:
					<?php
						$users = get_post_meta( get_the_ID(), '_potw_user', true );
						$user_split = explode( ',', str_replace( ' ', '', $users ) );
						foreach ( $user_split as $user ) {
							$user = get_user_by( 'id', $user );
							$name = trim( $user->display_name ) ? $user->display_name : $user->user_login;
							echo '<b>' . $name . '</b>, ';
						}
					?></h3>
					<small class="meta"><?php the_time('l jS F, Y') ?></small>
				</div>
			</div>
			<?php
				}
			} else {}
			wp_reset_postdata();
			?>

			<div class="row">

				<h3>Previous Pictures of the Week</h3>

				<?php
				$temp = $wp_query;
				$wp_query = null;
				$wp_query = new WP_Query();
				$wp_query->query('offset=1&showposts=12&post_type=potw&paged='.$paged);
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="small-12 large-3 columns potw center">
						<small class="meta"><?php the_time('l jS F, Y') ?></small>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('display', array( 'class' => 'aligncenter' )); ?></a>
					</div>
				<?php endwhile; ?>
				<?php wp_pagenavi(); ?>
				<?php $wp_query = null;
				$wp_query = $temp;
				?>
				<?php else : ?>
					<h2>Not Found</h2>
					<p>Sorry, but you are looking for something that isn't here.</p>
				<?php endif; wp_reset_postdata(); ?>

			</div>

			<small class="updated meta">("<em><?php the_title(); ?></em>" last updated <?php the_modified_date('jS F, Y'); ?>)<br /><?php edit_post_link('<i class="nav-pencil-square-o"></i> Edit', '', ''); ?></small>

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