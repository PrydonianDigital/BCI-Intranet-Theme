<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	$post_type = get_post_type_object($post->post_type);
?>
<div <?php post_class('news'); ?>>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<ul>
		<?php $contact = get_post_meta(get_the_ID(), '_equip_user', true); ?>
		<?php $centre = get_post_meta(get_the_ID(), '_equip_centre', true); ?>
		<?php $room = get_post_meta(get_the_ID(), '_equip_room', true); ?>
		<?php $share = get_post_meta(get_the_ID(), '_equip_share', true); ?>
		<?php if($centre != '') { ?><li>Centre: <?php echo $centre; ?></li><?php } ?>
		<?php if($contact != '') { ?><li>Contact: <?php echo $contact; ?></li><?php } ?>
		<?php if($room != '') { ?><li>Room #: <?php echo $room; ?></li><?php } ?>
		<?php if($share != '') { ?><li>Equipment for Shared Use: <?php echo $share; ?></li><?php } ?>
	</ul>
</div>

<?php
	endwhile;
	else :
	echo '<p>Sorry, no results matched your search.</p>';
	endif;
	wp_reset_query();
?>