<?php
	$title = get_sub_field( 'title' );
	$skills = get_sub_field( 'items' );
	$section_id = get_sub_field( 'section_id' );
?>

<!-- Skills -->
<div class="section skills" <?php if ( $section_id ) : ?>id="section-<?php echo esc_attr( $section_id ); ?>"<?php endif; ?>>
	<div class="content">
		<?php if ( $title ) : ?>
		<div class="title">
			<div class="title_inner"><?php echo esc_html( $title ); ?></div>
		</div>
		<?php endif; ?>
		
		<?php if ( $skills ) : ?>
		<div class="skills">
			<ul>
				<?php foreach ( $skills as $item ) { ?>
				<li> 
					<div class="name"><?php echo esc_html( $item['name'] ); ?></div>
					<div class="progress">
						<div class="percentage" style="width: <?php echo esc_attr( $item['progress'] ); ?>;">
							<span class="percent"><?php echo esc_html( $item['progress'] ); ?></span>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
</div>