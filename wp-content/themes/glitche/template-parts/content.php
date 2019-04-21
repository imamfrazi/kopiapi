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

$blog_categories = get_field( 'blog_categories', 'option' );
$blog_excerpt = get_field( 'blog_excerpt', 'option' );

?>

<div class="box-item">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="image">
			<?php glitche_post_thumbnail(); ?>
		</div>
		<div class="desc">
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="date">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a>
				</div>
			<?php endif; ?>

			<?php if( $blog_categories ) : ?>
				<div class="category-list">
					<div class="category">
						<?php
						$categories_list = get_the_category();
						if ( $categories_list ) {
							foreach ( $categories_list as $category ) {
								echo '<span class="category-name">' . esc_html( $category->cat_name ) . '</span>';
							}
						}
						?>
					</div>
				</div>
			<?php endif; ?>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="name"><?php the_title(); ?></a>

			<?php if ( ! $blog_excerpt ) : ?>
			<div class="text">
				<?php the_excerpt(); ?>
			</div>
			<?php endif; ?>
		</div>
	</div><!-- #post-<?php the_ID(); ?> -->
</div>
