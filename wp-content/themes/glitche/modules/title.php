<?php
	$title = get_sub_field( 'title' );
	$logo_switch = get_sub_field( 'logo_switch' );
	$logo = get_sub_field( 'logo' );
	$logo_url = get_sub_field( 'logo_url' );
	$type = get_sub_field( 'type' );
	$under = get_sub_field( 'under' );
	$subtitles = get_sub_field( 'subtitles' );
	$subtitles_class = 'typing-subtitle';
	$bg_type = get_sub_field( 'background_type' );
	$bg_image = get_sub_field( 'background_image' );
	$bg_video = get_sub_field( 'background_video' );
	$bg_video_image = get_sub_field( 'background_video_image' );
	$bg_video_mute = get_sub_field( 'background_video_mute' );
	$section_id = get_sub_field( 'section_id' );
	
	if ( $bg_video_mute ) {
		$bg_video_mute = 'true';
	} else {
		$bg_video_mute = 'false';
	}

	if ( $under == 2 ) {
		$subtitles_class = 'typing-bread';
	}
?>

<!-- Started -->
<div class="section started <?php if ( $bg_type ) : ?>background-enabled<?php endif; ?>" <?php if ( $section_id ) : ?>id="section-<?php echo esc_attr( $section_id ); ?>"<?php endif; ?>>
	<?php if ( $bg_type == 1 ) : ?>
	<div class="video-bg" style="background-image: url(<?php echo esc_url( $bg_image ); ?>);"></div>
	<?php endif; ?>
	<?php if ( $bg_type == 2 ) : ?>
	<div id="video-bg" class="video-bg" data-mobile-preview="<?php echo esc_url( $bg_video_image ); ?>" data-property="{videoURL:'<?php echo esc_url( $bg_video ); ?>', containment:'#video-bg', showControls:false, autoPlay:true, loop:true, mute:<?php echo esc_attr( $bg_video_mute ); ?>, startAt:0, opacity:1, addRaster:true, quality:'default'}"></div>
	<?php endif; ?>
	<div class="centrize full-width">
		<div class="vertical-center">
			<div class="started-content">
				<?php if ( $logo_switch ) : ?>
					<div class="logo">
						<?php if ( $logo_url ) : ?>
						<a href="<?php echo esc_url( $logo_url ); ?>">
						<?php endif; ?>
							<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
						<?php if ( $logo_url ) : ?>
						</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( $title ) : ?>
				<div class="h-title <?php if ( $type ) : ?>glitch-effect<?php endif; ?>" data-text="<?php echo esc_attr( $title ); ?>"><?php echo esc_html( $title ); ?></div>
				<?php endif; ?>
				<?php if ( $under ) : ?>
				<div class="h-subtitle <?php echo esc_attr( $subtitles_class ); ?>">
					<?php if ( $under == 1 ) : ?>
						<?php foreach ( $subtitles as $item ) { ?>
							<p><?php echo wp_kses_post( $item['text'] );?></p>
						<?php } ?>
					<?php endif; ?>
					<?php if ( $under == 2 ) : ?>
						<?php glitche_breadcrumb(); ?>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<?php if ( $under == 1 ) : ?>
					<span class="typed-subtitle"></span>
				<?php endif; ?>
				<?php if ( $under == 2 ) : ?>
					<span class="typed-bread"></span>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<a href="#" class="mouse_btn" style="display: none;"><span class="ion ion-mouse"></span></a>
</div>