<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo (wp_title( ' ', false, 'right' ) == '') ? get_bloginfo('name') : wp_title( ' ', false, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" media="(min-width: 768px)" href="<?php echo TDU; ?>/css/sm.css" />
	<link rel="stylesheet" media="(min-width: 1220px)" href="<?php echo TDU; ?>/css/md.css" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
		wp_head(); ?>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.main.js" ></script>
	<!--[if lt IE 9]>
		<script src="<?php echo TDU; ?>/js/html5shiv.min.js"></script>
		<script src="<?php echo TDU; ?>/js/respond.min.js"></script>
	<![endif]-->
	<!--[if lte IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<header id="header">
			<div class="container">
				<strong class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo TDU; ?>/images/logo.png" alt="<?php bloginfo('name'); ?>"></a></strong>
				<a href="#" class="btn-menu visible-xs">Toggle Menu</a>
				<?php wp_nav_menu( array(
				'container' => 'nav',
				'container_class' => 'main-navigation',
				'theme_location' => 'primary_nav',
				'menu_id' => 'nav',
				'menu_class' => 'main-nav'
				)); ?>
			</div>
		</header>
		<div class="content-black">
			<div class="container">