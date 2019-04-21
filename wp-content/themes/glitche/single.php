<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="date"><?php the_date(); ?></div>
					<?php endif; ?>
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
	
	<!-- Blog -->
	<div class="section blog">
		<div class="content">
			<?php
				get_template_part( 'template-parts/content', 'single' );
				
				the_post_navigation( array(
					'screen_reader_text' => ' ',
					'next_text' => '<span class="post-nav-prev post-nav-text">' . esc_html__( 'Next', 'glitche' ) . '</span>',
					'prev_text' => '<span class="post-nav-next post-nav-text">' . esc_html__( 'Prev', 'glitche' ) . '</span>'
				) );
			
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