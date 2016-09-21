<?php
/*
* Template Name: Login Page
*/
?>

<?php get_header('login'); ?>

<?php the_custom_logo(); ?>

<?php
	$args = array(
		'echo' => true,
		'redirect' => site_url(),
		'form_id' => 'loginform',
		'label_username' => __( ' QMCR Network Username' ),
		'label_password' => __( ' QMCR Network Password' ),
		'label_remember' => __( 'Keep me logged in' ),
		'label_log_in' => __( 'Log In' ),
		'id_username' => 'user_login',
		'id_password' => 'user_pass',
		'id_remember' => 'rememberme',
		'id_submit' => 'wp-submit',
		'remember' => true,
		'value_username' => NULL,
		'value_remember' => false
	);
	wp_login_form( $args );
?>

<?php get_footer('login'); ?>