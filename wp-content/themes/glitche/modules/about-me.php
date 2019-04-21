<?php
	$title = get_sub_field( 'title' );
	$photo = get_sub_field( 'photo' );
	$description = get_sub_field( 'text' ); 
	$info = get_sub_field( 'info' );
	$button = get_sub_field( 'button' );
	$section_id = get_sub_field( 'section_id' );
?>

<!-- About -->
<div class="section about" <?php if ( $section_id ) : ?>id="section-<?php echo esc_attr( $section_id ); ?>"<?php endif; ?>>
	<div class="content">
		<?php if ( $title ) : ?>
		<div class="title">
			<div class="title_inner"><?php echo esc_html( $title ); ?></div>
		</div>
		<?php endif; ?>
		
		<?php if ( $photo ) : ?>
		<div class="image">
			<img src="<?php echo esc_url( $photo['sizes']['glitche_100x100'] ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
		</div>
		<?php endif; ?>
		
		<?php if ( $description || $info || $button ) : ?>
		<div class="desc">
			<?php if ( $description ) : ?>
			<?php echo wp_kses_post( $description ); ?>
			<?php endif; ?>
			<?php if ( $info ) : ?>
			<div class="info-list">
				<ul>
					<?php foreach ( $info as $item ) { ?>
					<li><strong><?php echo esc_html( $item['label'] ); ?>:</strong> <?php echo esc_html( $item['value'] ); ?></li>
					<?php } ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php if ( $button ) : ?>
			<div class="bts">
				<a href="<?php echo esc_url( $button['url'] ); ?>" class="btn fill" data-text="<?php echo esc_attr( $button['label'] ); ?>">
					<?php echo esc_html( $button['label'] ); ?>	
				</a>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
</div>