<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">
<?php
if( !isset($_SERVER['PHP_AUTH_USER']) )

{

    list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));

    if( strlen($_SERVER['PHP_AUTH_USER']) == 0 || strlen($_SERVER['PHP_AUTH_PW']) == 0 )

    {

        unset($_SERVER['PHP_AUTH_USER']);

        unset($_SERVER['PHP_AUTH_PW']);

    }

}
?>
<?php
	echo $_SERVER['PHP_AUTH_USER'] . '<br />' . $_SERVER['PHP_AUTH_PW'];
	echo '<pre>';
	print_r($_SERVER);
	echo '</pre>';
?>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>