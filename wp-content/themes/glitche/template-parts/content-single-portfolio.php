<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post-text">
		<?php
			if ( has_post_thumbnail() ) : 
				the_post_thumbnail( 'full', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					)),
				) );
			endif;
		
			the_content(); 

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glitche' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<div class="post-text-bottom">
		<?php	
			/*get categories*/
			$current_categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
			$categories_string = '';
			if ( $current_categories && ! is_wp_error( $current_categories ) ) {
				$arr_keys = array_keys( $current_categories );
				$last_key = end( $arr_keys );
				foreach ( $current_categories as $key => $value ) {
					$categories_string .= '<span class="tag">' . $value->name. '</span>';
				}
			}
		?>
		
		<span class="tags-links">
			<?php esc_html_e( 'Categories:', 'glitche' ); ?>
			
			<?php if ( $categories_string ) : ?>
				<?php echo wp_kses_post( $categories_string ); ?>
			<?php endif; ?>
		</span>
		
		<?php glitche_entry_footer(); ?>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->
