<div class="row">

	<?php
		$members = get_post_meta( get_the_ID(), '_link_link', true );
		$output = '';
		if ( empty( $members ) ) {
			echo $output;
		} else {
			$output .= '<div class="large-6 small-12 columns">';
			$output .= '<h2>Related Links</h2>';
			$output .= '<ul class="links">';
			foreach ( $members as $member ) {
				$output .= '<li>';
				$output .= '<a href="'. esc_html( $member['url'] ) .'" target="_blank">';
				$output .= esc_html( $member['title'] );
				$output .= '</a>';
				$output .= '</li>';
			}
			$output .= '</ul>';
			$output .= '</div>';
			echo $output;
		}
	?>

	<?php
	$p2d = new WP_Query( array(
		'connected_type' => 'p2d',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $p2d->have_posts() ) : ?>
	<div class="large-6 small-12 columns">
		<h2>Related Documents</h2>
		<ul class="doc">
		<?php while ( $p2d->have_posts() ) : $p2d->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata();
	endif;
	?>

	<?php
	$p2c = new WP_Query( array(
		'connected_type' => 'p2c',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $p2c->have_posts() ) : ?>
	<div class="large-6 small-12 columns">
		<h2>Related Centre</h2>
		<ul class="centre">
		<?php while ( $p2c->have_posts() ) : $p2c->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata();
	endif;
	?>

	<?php
	$p2e = new WP_Query( array(
		'connected_type' => 'p2e',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $p2e->have_posts() ) : ?>
	<div class="large-6 small-12 columns">
		<h2>Related Events</h2>
		<ul class="cal">
		<?php while ( $p2e->have_posts() ) : $p2e->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata();
	endif;
	?>

	<?php
	$p2p = new WP_Query( array(
		'connected_type' => 'p2p',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $p2p->have_posts() ) : ?>
	<div class="large-6 small-12 columns">
		<h2>Related News</h2>
		<ul class="posts">
		<?php while ( $p2p->have_posts() ) : $p2p->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata();
	endif;
	?>

</div>