<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

		    <?php
		    	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
		    ?>

		    <h2 class="page-title"><?php echo $curauth->_me_ttitle; ?> <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h2>
		    <?php $userID = $curauth->ID; echo get_avatar( $userID, 128 ); ?>
		    <h3>
			    <?php
					if($curauth->_usercentre_centre_lead == 'on') {
						echo 'Centre Lead';
					}
					if($curauth->_usercentre_centre_administrator == 'on') {
						echo 'Centre Administrator';
					}
					if($curauth->_usercentre_lab_manager == 'on') {
						echo 'Laboratory Manager';
					}
					if($curauth->_usercentre_deputy_lab_manager == 'on') {
						echo 'Deputy Laboratory Manager';
					}
				?>
				<?php echo $curauth->_me_title; ?> - <?php echo get_the_title($curauth->_usercentre_centre); ?>
			</h3>
			<p><i class="nav-phone"></i> x<?php echo $curauth->_me_ext; ?></p>
			<p><i class="nav-envelope"></i> <a href="mailto:<?php echo $curauth->user_email ?>"><?php echo $curauth->user_email ?></a></p>
			<?php echo $curauth->description; ?>
		    <?php
				if($curauth->_usercentre_main_safety == 'on') {
					echo '<p>Local Safety Officers</p>';
				}
				if($curauth->_usercentre_fire_marshall == 'on') {
					echo '<p>Fire Marshalls</p>';
				}
				if($curauth->_usercentre_first_aider == 'on') {
					echo '<p>First Aiders</p>';
				}
			?>
		    <?php
				if($curauth->_me_social_committee == 'on') {
					echo '<p>Social Committee</p>';
				}
				if($curauth->_me_phd_forum == 'on') {
					echo '<p>PhD Forum</p>';
				}
				if($curauth->_me_postdoc_forum == 'on') {
					echo '<p>Postdoc Forum</p>';
				}
				if($curauth->_me_coms_committee == 'on') {
					echo '<p>Comms Committee</p>';
				}
				if($curauth->_me_athena_swan == 'on') {
					echo '<p>Athena SWAN</p>';
				}
				if($curauth->_me_smt == 'on') {
					echo '<p>SMT</p>';
				}
			?>
		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>