<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
?>
<!DOCTYPE html>
<!--[if lte IE 6]><script>document.location = '<?php bloginfo('template_directory'); ?>/oldbrowser.html';</script><![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php if (wp_title('')) wp_title(''); else bloginfo( 'name' ); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=3" />
<link type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<script src="<?php bloginfo('template_directory'); ?>/js/cufon-1.10.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bifon-1.1b.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/JSf1.js" type="text/javascript"></script>
<script type="text/javascript">
Cufon.replace('h1,#sidebar h3, .featured-text span, #content .wp-caption  p', {onBeforeReplace:Bifon.convert});
Cufon.replace('.breadcrumb .current_item, #respond h32', {onBeforeReplace:Bifon.convert});
Cufon.replace('h2', {textShadow: '#DDD 2px 2px', onBeforeReplace:Bifon.convert});
Cufon.replace('#footer .copyright', {color: '-linear-gradient(#999, 0.45=#fff, 0.45=#ddd, #999)' ,	onBeforeReplace:Bifon.convert}); // gradient
</script>
<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="header">
	<div class="top-bg"></div>
  		<div class="layout-978header"><div id="JShead">
			<img src="<?php bloginfo('template_directory'); ?>/images/iran.png" id="iran" alt="لوگوی ایران اسلامی">
			<img src="<?php bloginfo('template_directory'); ?>/images/rahbari.png" id="rahbar" alt="لوگوی رهبری">
        	<?php 
        		// Funcition to show the header logo, site title and site description
        		if ( function_exists( 'simplecatch_headerdetails' ) ) :
					simplecatch_headerdetails(); 
				endif;
			?>
			

    		<div class="row-end"></div></div>
            <div id="mainmenu">
            	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </div><!-- #mainmenu-->  
            <div class="row-end"></div>   
        <?php 
			// This function passes the value of slider effect to js file 
			if( function_exists( 'simplecatch_pass_slider_value' ) ) {
				simplecatch_pass_slider_value();
			}
			// Display slider in home page and breadcrumb in other pages 
			if ( function_exists( 'simplecatch_sliderbreadcrumb' ) ) :
				simplecatch_sliderbreadcrumb(); 
			endif;
		?> 
	</div><!-- .layout-978 -->
</div><!-- #header -->