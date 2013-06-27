<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
<!--Meta Info-->
<meta charset="utf-8" />
<?php if(is_home() || is_single() || is_page()) { echo '<meta name="robots" content="index,follow" />'; } else { echo '<meta name="robots" content="noindex,follow" />'; } ?>
<meta name="description" content="<?php bloginfo('description'); ?>">
<!-- Google Chrome Frame for IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- Mobile Meta-->
<meta name="HandheldFriendly" content="True">
<!-- disable iPhone inital scale -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--End Meta-->
<link href='http://fonts.googleapis.com/css?family=Lato:400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
<link href='http://weloveiconfonts.com/api/?family=entypo' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/sidebar_style.css" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<!-- Put the following javascript before the closing </head> tag. -->
<!-- WordPress Head Functions -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="container">
	<header>
			<a href="http://brooklynphotoarchive.com" class="logo">
				<img id="logo" src="http://brooklynphotoarchive.com/wp-content/themes/eaglet/images/bpa1.png" alt="Brooklyn Photo Archive"/>
			</a>

<!-- Navigation -->
	</header>
<nav id="sidebar">
	      <ul>
	      	<li id="search"><?php get_sidebar(); ?></li>
	        <li><a href=" http://brooklynphotoarchive.com/alphabetical-index" class="entypo-archive" title="Alphabetical Index">&nbsp;&nbsp;Alphabetical Index</a></li>
	        <li><a href=" http://brooklynphotoarchive.com/tag-index/" class="entypo-tag" title="Tags">&nbsp;&nbsp;Tags</a></li>
	        <li><a href="http://brooklynphotoarchive.com/about/" class="entypo-info" title="About">&nbsp;&nbsp;About</a></li>
	        <li><a href="http://brooklynphotoarchive.com/contact/" class="entypo-mail" title="Contact">&nbsp;&nbsp;Contact</a></li>
	        <li><a href="http://brooklynphotoarchive.com/shopping-cart/" class="entypo-basket" title="Cart">&nbsp;&nbsp;Cart</a></li>
    	  </ul>
</nav>
<section id="content">