<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */

get_header();
?>

	<?php while ( have_posts() ) : the_post(); ?>

	<!-- Started -->
	<div class="section started">
		<div class="centrize full-width">
			<div class="vertical-center">
				<div class="started-content">
					<div class="h-title blog_title"><?php the_title(); ?></div>
					<div class="h-subtitle typing-bread">
						<?php glitche_breadcrumb(); ?>
					</div>
					<span class="typed-bread"></span>
				</div>
			</div>
		</div>
		<a href="#" class="mouse_btn"><span class="ion ion-mouse"></span></a>
	</div>
	
	<!-- Page -->
	<div class="section blog s-page">
		<div class="content">
			<?php
				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
			<div class="clear"></div>
		</div>
	</div>
	
	<?php endwhile; ?>

<?php
get_sidebar();
get_footer();
