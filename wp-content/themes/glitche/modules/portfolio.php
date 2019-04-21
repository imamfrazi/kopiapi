<?php
	$title = get_sub_field( 'title' );
	$filters = get_sub_field( 'filters' );
	$portfolio = get_sub_field( 'items' );
	$portfolio_categories = glitche_get_categories( 'portfolio_categories' );
	$portfolio_qv = get_field( 'portfolio_qv', 'option' );
	$section_id = get_sub_field( 'section_id' );
?>

<!-- Works -->
<div class="section works" <?php if ( $section_id ) : ?>id="section-<?php echo esc_attr( $section_id ); ?>"<?php endif; ?>>
	<div class="content">
		<?php if ( $title ) : ?>
		<div class="title">
			<div class="title_inner"><?php echo esc_html( $title ); ?></div>
		</div>
		<?php endif; ?>
		
		<?php if ( $filters == '1' && $portfolio_categories ) : ?>
		<div class="filter-menu">
			<div class="filters">
				<div class="btn-group">
					<?php foreach ( $portfolio_categories as $cat ) { ?>
					<label data-text="<?php echo esc_attr( $cat->name ); ?>">
						<input type="checkbox" value="f-<?php echo esc_attr( $cat->slug ); ?>" /><?php echo esc_html( $cat->name ); ?>
					</label>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( $portfolio ) : ?>
		<div class="box-items portfolio-items">
			
			<?php foreach ( $portfolio as $row ) { ?>
			<?php
				/*get categories*/
				$current_categories = get_the_terms( $row['post']->ID, 'portfolio_categories' );
				$categories_string = '';
				$categories_slugs_string = '';
				if ( $current_categories && ! is_wp_error( $current_categories ) ) {
					$arr_keys = array_keys( $current_categories );
					$last_key = end( $arr_keys );
					foreach ( $current_categories as $key => $value ) {
						if ( $key == $last_key ) {
							$categories_string .= $value->name . ' ';
						} else {
							$categories_string .= $value->name . ', ';
						}
						$categories_slugs_string .= 'f-' . $value->slug . ' ';
					}
				}
				/*get content*/
				$title = get_the_title( $row['post']->ID );
				$content = apply_filters( 'the_content', get_post_field( 'post_content', $row['post']->ID ) );
				/*get button url*/
				$btn_url = get_field( 'button_url', $row['post']->ID );
			?>
			
			<div class="box-item <?php echo esc_attr( $categories_slugs_string ); ?>">
				<div class="image">
					<?php if ( $portfolio_qv ) : ?>
					<a href="#popup-<?php echo esc_attr( $row['post']->ID ); ?>" class="has-popup">
						<?php if ( has_post_thumbnail ( $row['post']->ID ) ) : 
							echo get_the_post_thumbnail( $row['post']->ID, 'glitche_282x282' );
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
					<a href="<?php echo esc_url( get_the_permalink( $row['post']->ID ) ); ?>">
						<?php if ( has_post_thumbnail ( $row['post']->ID ) ) : 
							echo get_the_post_thumbnail( $row['post']->ID, 'glitche_282x282' );
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
					<a href="<?php echo esc_url( get_the_permalink( $row['post']->ID ) ); ?>" class="name"><?php echo esc_html( $title ); ?></a>
				</div>
				<?php if ( $portfolio_qv ) : ?>
				<div id="popup-<?php echo esc_attr( $row['post']->ID ); ?>" class="popup-box mfp-fade mfp-hide">
					<div class="content">
						<div class="image">
							<?php if ( has_post_thumbnail( $row['post']->ID ) ) : 
								echo get_the_post_thumbnail( $row['post']->ID, 'glitche_500x500' );
							endif; ?>
						</div>
						
						<div class="desc">
							<?php if ( $categories_string ) : ?>
							<div class="category"><?php echo esc_html( $categories_string ); ?></div>
							<?php endif; ?>
							<h4><?php echo esc_html( $title ); ?></h4>
							<?php echo wp_kses_post( $content ); ?>
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
			<?php } ?>
		</div>
		<?php endif; ?>
		
		<div class="clear"></div>
	</div>
</div>