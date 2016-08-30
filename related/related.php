<div class="row">

	<?php
	$p22p2 = new WP_Query( array(
		'connected_type' => 'p22p2',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $p22p2->have_posts() ) : ?>
		<div class="large-6 small-12 columns">
		<h2>Related Pages</h2>
		<ul class="doc">
	<?php
		while ( $p22p2->have_posts() ) : $p22p2->the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endwhile; ?>
		</ul>
	</div>
	<?php
	endif; wp_reset_postdata();
	?>

	<?php
	$d2p = new WP_Query( array(
		'connected_type' => 'd2p',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $d2p->have_posts() ) : ?>
		<div class="large-6 small-12 columns">
		<h2>Related Documents</h2>
		<ul class="doc">
	<?php
		while ( $d2p->have_posts() ) : $d2p->the_post();
		$entries = get_post_meta( get_the_ID(), 'doc_version', true );
		foreach ((array) $entries as $key => $entry) {
			$doc = '';
			if ( isset( $entry['_doc'] ) )
				$doc = esc_html( $entry['_doc'] );
				if(end($entries) == $entry) {
					echo '<li><a href="' . $doc . '">' . get_the_title() . '</a></li>';
				}
		}
	endwhile; ?>
		</ul>
	</div>
	<?php
	endif; wp_reset_postdata();
	?>

	<?php
	$d2p2 = new WP_Query( array(
		'connected_type' => 'd2p2',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $d2p2->have_posts() ) : ?>
		<div class="large-6 small-12 columns">
		<h2>Related Documents</h2>
		<ul class="doc">
	<?php
		while ( $d2p2->have_posts() ) : $d2p2->the_post();
		$entries = get_post_meta( get_the_ID(), 'doc_version', true );
		foreach ((array) $entries as $key => $entry) {
			$doc = '';
			if ( isset( $entry['_doc'] ) )
				$doc = esc_html( $entry['_doc'] );
				if(end($entries) == $entry) {
					echo '<li><a href="' . $doc . '">' . get_the_title() . '</a></li>';
				}
		}
	endwhile; ?>
		</ul>
	</div>
	<?php
	endif; wp_reset_postdata();
	?>

	<?php
	$d2e = new WP_Query( array(
		'connected_type' => 'd2e',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $d2e->have_posts() ) : ?>
		<div class="large-6 small-12 columns">
		<h2>Related Documents</h2>
		<ul class="doc">
	<?php
		while ( $d2e->have_posts() ) : $d2e->the_post();
		$entries = get_post_meta( get_the_ID(), 'doc_version', true );
		foreach ((array) $entries as $key => $entry) {
			$doc = '';
			if ( isset( $entry['_doc'] ) )
				$doc = esc_html( $entry['_doc'] );
				if(end($entries) == $entry) {
					echo '<li><a href="' . $doc . '">' . get_the_title() . '</a></li>';
				}
		}
	endwhile; ?>
		</ul>
	</div>
	<?php
	endif; wp_reset_postdata();
	?>

	<?php
	$p2l = new WP_Query( array(
		'connected_type' => 'p2l',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $p2l->have_posts() ) : ?>
	<div class="large-6 small-12 columns">
		<h2>Related Links</h2>
		<ul class="links">
		<?php while ( $p2l->have_posts() ) : $p2l->the_post(); ?>
			<li><a href="<?php $link = get_post_meta(get_the_ID(), 'link_url', true); echo $link; ?>" <?php $blank = get_post_meta(get_the_ID(), 'link_blank', true); if($blank !=''){ ?> target="_blank"<?php } ?>><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata();
	endif;
	?>

	<?php
	$p2l2 = new WP_Query( array(
		'connected_type' => 'p2l2',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $p2l2->have_posts() ) : ?>
	<div class="large-6 small-12 columns">
		<h2>Related Links</h2>
		<ul class="links">
		<?php while ( $p2l2->have_posts() ) : $p2l2->the_post(); ?>
			<li><a href="<?php $link = get_post_meta(get_the_ID(), 'link_url', true); echo $link; ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata();
	endif;
	?>

	<?php
	$n2l = new WP_Query( array(
		'connected_type' => 'n2l',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $n2l->have_posts() ) : ?>
	<div class="large-6 small-12 columns">
		<h2>Related Links</h2>
		<ul class="links">
		<?php while ( $n2l->have_posts() ) : $n2l->the_post(); ?>
			<li><a href="<?php $link = get_post_meta(get_the_ID(), 'link_url', true); echo $link; ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata();
	endif;
	?>

	<?php
	$e2l = new WP_Query( array(
		'connected_type' => 'e2l',
		'connected_items' => $post,
		'nopaging' => true,
	) );
	if ( $e2l->have_posts() ) : ?>
	<div class="large-6 small-12 columns">
		<h2>Related Links</h2>
		<ul class="links">
		<?php while ( $e2l->have_posts() ) : $e2l->the_post(); ?>
			<li><a href="<?php $link = get_post_meta(get_the_ID(), 'link_url', true); echo $link; ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		</ul>
	</div>
	<?php wp_reset_postdata();
	endif;
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