<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	$post_type = get_post_type_object($post->post_type);
?>
<div <?php post_class('news'); ?>>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<ul>
		<?php $contact = get_post_meta(get_the_ID(), '_anti_user', true); ?>
		<?php $centre = get_post_meta(get_the_ID(), '_anti_centre', true); ?>
		<?php $comment = get_post_meta(get_the_ID(), '_anti_comment', true); ?>
		<?php $company = get_post_meta(get_the_ID(), '_anti_company', true); ?>
		<?php $catalogue = get_post_meta(get_the_ID(), '_anti_catalogue', true); ?>
		<?php if($contact != '') { ?><li>Contact: <?php echo $contact; ?></li><?php } ?>
		<?php if($centre != '') { ?><li>Centre: <?php echo $centre; ?></li><?php } ?>
		<?php if($comment != '') { ?><li>Comment: <?php echo $comment; ?></li><?php } ?>
		<?php if($company != '') { ?><li>Company: <?php echo $company; ?></li><?php } ?>
		<?php if($catalogue != '') { ?><li>Catalogue: <?php echo $catalogue; ?></li><?php } ?>
	</ul>
</div>

<?php
	endwhile;
	else :
	echo '<p>Sorry, no results matched your search.</p>';
	endif;
	wp_reset_query();
?>