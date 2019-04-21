<?php

function glitche_ocdi_import_files() {
    return array(
        array(
            'import_file_name'             => 'Default',
            'categories'                   => array( 'Main' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/01/content.xml',
            //'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/01/widgets.json',
            //'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/01/customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/demo/01/preview.jpg',
            'preview_url'                  => 'https://glitche.beshley.com/',
        ),
        array(
            'import_file_name'             => 'One Page',
            'categories'                   => array( 'Main', 'One Page' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/02/content.xml',
            //'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/02/widgets2.json',
            //'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/02/customizer2.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/demo/02/preview.jpg',
            'preview_url'                  => 'https://glitche.beshley.com/onepage/',
        ),
        array(
            'import_file_name'             => 'One Page Image Background',
            'categories'                   => array( 'Image Background', 'One Page' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/03/content.xml',
            //'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/02/widgets2.json',
            //'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/02/customizer2.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/demo/03/preview.jpg',
            'preview_url'                  => 'https://glitche.beshley.com/onepage-image/',
        ),
        array(
            'import_file_name'             => 'One Page Video Background',
            'categories'                   => array( 'Video Background', 'One Page' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/04/content.xml',
            //'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/02/widgets2.json',
            //'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/02/customizer2.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/demo/04/preview.jpg',
            'preview_url'                  => 'https://glitche.beshley.com/onepage-video/',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'glitche_ocdi_import_files' );

function glitche_ocdi_after_import_setup( $selected_import ) {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'TopMenu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'posts_per_page', 6 );

    $ocdi_fields_static = array(
    	'options_copyright' => '© 2018 Glitche. All rights reserved.',
        '_options_copyright' => 'field_5b68cceac1b66',
    	'options_social_links_0_icon' => 'ion-social-dribbble',
        '_options_social_links_0_icon' => 'field_5b68cccfc1b64',
    	'options_social_links_0_url' => 'https://dribbble.com/',
        '_options_social_links_0_url' => 'field_5b68ccd7c1b65',
    	'options_social_links_1_icon' => 'ion-social-twitter',
        '_options_social_links_1_icon' => 'field_5b68cccfc1b64',
    	'options_social_links_1_url' => 'https://twitter.com/',
        '_options_social_links_1_url' => 'field_5b68ccd7c1b65',
    	'options_social_links_2_icon' => 'ion-social-github',
        '_options_social_links_2_icon' => 'field_5b68cccfc1b64',
    	'options_social_links_2_url' => 'https://github.com/',
        '_options_social_links_2_url' => 'field_5b68ccd7c1b65',
    	'options_social_links_3_icon' => 'ion-social-instagram-outline',
        '_options_social_links_3_icon' => 'field_5b68cccfc1b64',
    	'options_social_links_3_url' => 'https://www.instagram.com/',
        '_options_social_links_3_url' => 'field_5b68ccd7c1b65',
    	'options_social_links' => 4,
        '_options_social_links' => 'field_5b68ccabc1b63',
        'options_preloader_text' => 'loading...',
        '_options_preloader_text' => 'field_5b74af51444c8',
    );
    $ocdi_fields_to_change = array();
    
    if( 'Default' === $selected_import['import_file_name'] ) {
        $ocdi_fields_to_change = array(
            'options_theme_bg_color' => '#f26b38',
            '_options_theme_bg_color' => 'field_5b86baa686d10',
            'options_theme_color' => '#f26b38',
            '_options_theme_color' => 'field_5b68d509665d9',
        );
    }
    if( 'One Page' === $selected_import['import_file_name'] ) {
    	$ocdi_fields_to_change = array(
			'options_theme_bg_color' => '#f26b38',
            '_options_theme_bg_color' => 'field_5b86baa686d10',
			'options_theme_color' => '#f26b38',
            '_options_theme_color' => 'field_5b68d509665d9',
		);
    }
    if( 'One Page Image Background' === $selected_import['import_file_name'] ) {
        $ocdi_fields_to_change = array(
            'options_theme_bg_color' => '#f9f9f9',
            '_options_theme_bg_color' => 'field_5b86baa686d10',
            'options_theme_color' => '#e84a5f',
            '_options_theme_color' => 'field_5b68d509665d9',
        );
    }
    if( 'One Page Video Background' === $selected_import['import_file_name'] ) {
        $ocdi_fields_to_change = array(
            'options_theme_bg_color' => '#303f9f',
            '_options_theme_bg_color' => 'field_5b86baa686d10',
            'options_theme_color' => '#303f9f',
            '_options_theme_color' => 'field_5b68d509665d9',
        );
    }

    global $wpdb;
	foreach ( array_merge( $ocdi_fields_static, $ocdi_fields_to_change ) as $field => $value ) {
		if ( $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'options WHERE option_name = \'' . $field . '\'' ) == 0 ) {
			$wpdb->insert( $wpdb->prefix . 'options', array( 'option_value' => $value, 'option_name' => $field, 'autoload' => 'no' ), array( '%s', '%s', '%s' ) );
		} else {
			$wpdb->update( $wpdb->prefix . 'options', array( 'option_value' => $value ), array( 'option_name' => $field ) );
		}
	}

}
add_action( 'pt-ocdi/after_import', 'glitche_ocdi_after_import_setup' );