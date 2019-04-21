<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */

?>

<?php
// quick view
$portfolio_qv = get_field( 'portfolio_qv', 'option' );

// get categories
$current_categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
$categories_string = '';
if ( $current_categories && ! is_wp_error( $current_categories ) ) {
	$arr_keys = array_keys( $current_categories );
	$last_key = end( $arr_keys );
	foreach ( $current_categories as $key => $value ) {
		if ( $key == $last_key ) {
			$categories_string .= $value->name . ' ';
		} else {
			$categories_string .= $value->name . ', ';
		}
	}
}
/*get button url*/
$btn_url = get_field( 'button_url' );
?>

<div class="box-item">
	<div class="image">
		<?php if ( $portfolio_qv ) : ?>
		<a href="#popup-<?php the_ID(); ?>" class="has-popup">
			<?php if ( has_post_thumbnail() ) : 
				the_post_thumbnail( 'glitche_282x282' );
			?>
			<span class="info">
				<span class="centrize full-width">
					<span class="vertical-center">
						<span class="ion ion-ios-plus-empty"></span>
					</span>
				</span>
			</span>
			<?php endif; ?>
		</a>
		<?php else : ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php if ( has_post_thumbnail() ) : 
				the_post_thumbnail( 'glitche_282x282' );
			?>
			<span class="info">
				<span class="centrize full-width">
					<span class="vertical-center">
						<span class="ion ion-ios-book-outline"></span>
					</span>
				</span>
			</span>
			<?php endif; ?>
		</a>	
		<?php endif; ?>
	</div>
	<div class="desc">
		<?php if ( $categories_string ) : ?>
		<div class="category"><?php echo esc_html( $categories_string ); ?></div>
		<?php endif; ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="name"><?php the_title(); ?></a>
	</div>
	<?php if ( $portfolio_qv ) : ?>
	<div id="popup-<?php the_ID(); ?>" class="popup-box mfp-fade mfp-hide">
		<div class="content">
			<div class="image">
				<?php if ( has_post_thumbnail() ) : 
					the_post_thumbnail( 'glitche_500x500' );
				endif; ?>
			</div>
			
			<div class="desc">
				<?php if ( $categories_string ) : ?>
				<div class="category"><?php echo esc_html( $categories_string ); ?></div>
				<?php endif; ?>
				<h4><?php the_title(); ?></h4>
				<?php the_content(); ?>
				<?php if ( $btn_url ) : ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" class="btn" data-text="<?php echo esc_attr__( 'View Project', 'glitche' ); ?>">
					<?php echo esc_html__( 'View Project', 'glitche' ); ?>
				</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
