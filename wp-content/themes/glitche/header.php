<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package glitche
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
	
	<!-- Custom CSS -->
	<?php if ( get_field( 'custom_css', 'options' ) ) : ?>
		<style>
			<?php the_field( 'custom_css', 'options' ) ?> 
		</style>
	<?php endif; ?>
	
	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body <?php body_class(); ?>>
	
	<?php
		$sidebar_disable = get_field( 'sidebar_disable', 'options' );
		$preloader_text = get_field( 'preloader_text', 'options' );
	?>
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="centrize full-width">
			<div class="vertical-center">
				<div class="pre-inner">
					<?php if( $preloader_text ) : ?>
					<div class="load typing-load"><p><?php echo esc_html( $preloader_text ); ?></p></div>
					<?php endif; ?>
					<span class="typed-load"></span>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Container -->
	<div class="container">
	
		<!-- Header -->
		<header class="header">
			<div class="head-top">
				<a href="#" class="menu-btn"><span></span></a>
				<div class="top-menu">
					<div class="top-menu-nav">	
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary'
							) );
						?>
					</div>
					
					<?php if ( ! $sidebar_disable && is_active_sidebar( 'sidebar-1' ) ) : ?>
						<span class="sidebar_btn">
							<span></span>
						</span>
					<?php endif; ?>
				</div>
			</div>
		</header>
		
		<!-- Wrapper -->
		<div class="wrapper">