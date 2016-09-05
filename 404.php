<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

			<h2 class="page-title"><?php echo bci_get_option( '404title' ); ?></h2>

			<?php  if(bci_get_option( '404image' ) != '' ) {
				echo '<img src="' . bci_get_option( '404image' ) . '">';
			} ?>

			<?php
				$wysiwyg = apply_filters( 'the_content', bci_get_option( '404content' ) );
				echo $wysiwyg;
			?>


		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>