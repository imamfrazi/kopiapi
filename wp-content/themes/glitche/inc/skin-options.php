<?php
/**
 * Skin
 */
function glitche_skin() {
	$bg_color = get_field( 'theme_bg_color', 'options' );
	$theme_color = get_field( 'theme_color', 'options' );
	$line_color = get_field( 'line_color', 'options' );
	$heading_color = get_field( 'heading_color', 'options' );
	$text_color = get_field( 'text_color', 'options' );
	$heading_font = get_field( 'heading_font_family', 'options' );
	$text_font = get_field( 'text_font_family', 'options' );
	$heading_font_size = get_field( 'heading_font_size', 'options' );
	$text_font_size = get_field( 'text_font_size', 'options' );
?>
	
<style>
	<?php if ( $theme_color ) : ?>
	/* 1. Theme Colors */
	body, .container .line, a.btn.fill, .btn.fill, a.btn:hover, .btn:hover, .header .head-top .menu-btn:hover:before,
	.header .head-top .menu-btn:hover:after, .header .head-top .menu-btn:hover span, .header .head-top .top-menu ul li.menu-contact-btn.current-menu-item a,
	.header .head-top .top-menu ul li.menu-contact-btn a:hover, .resume-items .resume-item:before, .resume-items .resume-item .date:before,
	.skills ul li .progress .percentage, .box-items .box-item .image .info .centrize, .single-post-text ul li:before, .single-post-text ol li:before,
	.sidebar_btn:hover, .single-post-text input[type="submit"], .header .head-top .top-menu ul li.menu-contact-btn.current-menu-item > a, .header .head-top .top-menu ul li.menu-contact-btn > a:hover {
		background: <?php echo esc_attr( $theme_color ); ?>;
	}
	a:hover, .preloader .load, .preloader .typed-load, .preloader .typed-cursor, .header .head-top .top-menu ul li.current-menu-item a,
	.section.started .mouse_btn, .info-list ul li strong, .resume-items .resume-item .date, .service-items .service-item .icon,
	.section.works .filters label.glitch-effect, .box-items .box-item:hover .desc .name, .box-items .box-item .date,
	.started-content .date, .single-post-text p a, .post-text-bottom span.cat-links a, .post-text-bottom .tags-links a, .post-text-bottom .tags-links span,
	footer .soc a:hover .ion, .content-sidebar .tagcloud a, .content-sidebar .widget ul li a:hover, .box-items .box-item .date a {
		color: <?php echo esc_attr( $theme_color ); ?>;
	}
	a.btn.fill, .btn.fill, .header .head-top .top-menu ul li.menu-contact-btn.current-menu-item a, .header .head-top .top-menu ul li.menu-contact-btn a:hover,
	.resume-items .resume-item .date, .box-items .box-item .date, .started-content .date, .post-text-bottom .tags-links a, .post-text-bottom .tags-links span,
	.sidebar_btn:hover, .content-sidebar .tagcloud a {
		border-color: <?php echo esc_attr( $theme_color ); ?>;
	}
	.single-post-text blockquote {
		border-left-color: <?php echo esc_attr( $theme_color ); ?>;
	}
	input:focus, textarea:focus, button:focus, button:hover {
		border-bottom-color: <?php echo esc_attr( $theme_color ); ?>;
	}
	@media (min-width: 580px) {
		.glitch-effect-white:before,
		.glitch-effect-white:after {
			background: <?php echo esc_attr( $theme_color ); ?>;
		}
		.glitch-effect:after,
		.glitch-effect-white:after {
			text-shadow: -1px 0 <?php echo esc_attr( $theme_color ); ?>;
		}
		.glitch-effect:before,
		.glitch-effect-white:before {
			text-shadow: 2px 0 <?php echo esc_attr( $theme_color ); ?>;
		}
	}
	<?php endif; ?>
	
	<?php if ( $bg_color ) : ?>
	body, .container .line {
		background: <?php echo esc_attr( $bg_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $line_color ) : ?>
	/* 2. Line Color */
	.section .content .title .title_inner, .box-items .box-item .category, .comment-info span.comment-reply,
	.content-sidebar span.screen-reader-text span, .content-sidebar h2.widget-title span, .popup-box .category {
		box-shadow: inset 0 -6px 0px <?php echo esc_attr( $line_color ); ?>;
		-moz-box-shadow: inset 0 -6px 0px <?php echo esc_attr( $line_color ); ?>;
		-webkit-box-shadow: inset 0 -6px 0px <?php echo esc_attr( $line_color ); ?>;
		-khtml-box-shadow: inset 0 -6px 0px <?php echo esc_attr( $line_color ); ?>;
	}
	<?php endif; ?>
	
	<?php if ( $heading_color ) : ?>
	/* 3. Heading Color */
	.section.started .started-content .h-title {
		color: <?php echo esc_attr( $heading_color ); ?>;
	}
	<?php endif; ?>
	
	<?php if ( $text_color ) : ?>
	/* 4. Text Color */
	body {
		color: <?php echo esc_attr( $text_color ); ?>;
	}
	<?php endif; ?>
	
	<?php if ( $heading_font ) : ?>
	/* 5. Heading Font Family */
	.section.started .started-content .h-title {
		font-family: '<?php echo esc_attr( $heading_font['font_name'] ); ?>';
	}
	<?php endif; ?>
	
	<?php if ( $text_font ) : ?>
	/* 6. Text Font Family */
	body {
		font-family: '<?php echo esc_attr( $text_font['font_name'] ); ?>';;
	}
	<?php endif; ?>
	
	<?php if ( $heading_font_size ) : ?>
	/* 7. Heading Font Family */
	.section.started .started-content .h-title {
		font-size: <?php echo esc_attr( $heading_font_size ); ?>px;
	}
	<?php endif; ?>
	
	<?php if ( $text_font_size ) : ?>
	/* 8. Text Font Family */
	body, p, .single-post-text ul li, .single-post-text ol li, .section.started .started-content .typed-subtitle, .section.started .started-content .typed-bread,
	.box-items .box-item {
		font-size: <?php echo esc_attr( $text_font_size ); ?>px;
	}
	<?php endif; ?>
	
</style>
		
<?php
}
add_action( 'wp_head', 'glitche_skin' );
