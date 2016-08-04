<?php
	/*
		Template Name: Search
	*/
	get_header();
	$search = new WP_Advanced_Search('mainsearch');
?>

	<div class="row">

		<div class="small-12 large-12 column pageInner" role="main">

			<h2 class="page-title">Search</h2>

			<div class="row">

				<div class="large-6 small-12 columns">
					<?php $search->the_form(); ?>
				</div>

				<div class="large-6 small-12 columns">
					<div id="wpas-results"></div>
				</div>

			</div>

		</div>

	</div>

<?php get_footer(); ?>