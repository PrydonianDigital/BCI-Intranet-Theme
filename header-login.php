<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php include_once('analytics.php') ?>
<?php
$less = new lessc;
echo '<style>' . $less->compile("@furniture: ".bci_get_option( "color" )."; @navBg: ".bci_get_option( "color3" )."; @navSecondary: ".bci_get_option( "color2" )."; body { background: @navBg; }") . '</style>';
?>
</head>

<body <?php body_class(); ?>>
