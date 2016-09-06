

	</div>

</div>

<footer class="site-footer" itemscope="" itemtype="http://schema.org/WPFooter" id="footer">

	<div class="row">

		<div class="small-12 large-4 columns">

			<ul class="widgets">
				<?php dynamic_sidebar('footer1'); ?>
			</ul>

		</div>

		<div class="small-12 large-4 columns">

			<ul class="widgets">
				<?php dynamic_sidebar('footer2'); ?>
			</ul>

		</div>

		<div class="small-12 large-4 columns">

			<ul class="widgets">
				<?php dynamic_sidebar('footer3'); ?>
			</ul>

		</div>

		<p><small>&copy; Copyright <?php echo date('Y'); ?> <?php echo bloginfo('site_title'); ?>. All rights reserved.</small><br /><small>Spotted a mistake? <a href="mailto:<?php echo bci_get_option( 'intranet_email' ); ?>?subject=Intranet error on <?php the_permalink(); ?>" class="post-edit-link"><i class="nav-envelope"></i> Let us know</a></small></p>

	</div>

</footer>

<a href="#0" class="cd-top"><i class="nav-angle-double-up"></i></a>

<?php wp_footer(); ?>

<?php
global $current_user;
get_currentuserinfo();
$userID = $current_user->ID;
$tour = get_user_meta( $userID, '_me_tourNO', true );
if($tour != 'on') { ?>
<script>
var tour = new Tour({
	name: "BCITour",
	keyboard: true,
	storage: window.localStorage,
	debug: false,
	backdrop: true,
	backdropContainer: 'body',
	steps: [
	<?php
		require_once 'tour.php';
	?>
	]});
tour.init();
tour.start();
</script>
<?php } ?>

</body>
</html>