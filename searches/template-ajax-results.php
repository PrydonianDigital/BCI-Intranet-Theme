<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	$post_type = get_post_type_object($post->post_type);
	if ( get_post_status ( $ID ) == 'draft' ) {} else {
?>
<div <?php post_class('news search'); ?>>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('thumbnail', array( 'class' => 'alignleft' )); ?>
		</a>
	<?php endif; ?>
	<?php the_excerpt(); ?>
</div>

<?php
	}
	endwhile;
	else :
	echo '<p>Sorry, no results matched your search.</p>';

	endif;
	wp_reset_query();
?>