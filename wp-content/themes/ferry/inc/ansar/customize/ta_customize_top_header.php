<?php
function ferry_top_header_setting( $wp_customize ) {
/* Header Section */
	$wp_customize->add_panel( 'top_header_options', array(
		'priority' => 25,
		'capability' => 'edit_theme_options',
		'title' => __('Top Header Settings','ferry'),
	) );
	
	$wp_customize->add_section( 'top_header_contact' , array(
		'title' => __('Header Info Details Setting','ferry'),
		'panel' => 'top_header_options',
   	) );
	
	$wp_customize->add_setting(
		'ferry_head_info_one', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ferry_top_header_sanitize_text',
		'default'=> '<a><i class="fa fa-clock-o "></i>Open-Hours:10 am to 7pm</a>',
    ) );
    $wp_customize->add_control( 'ferry_head_info_one', array(
        'label' => __('Info One:','ferry'),
        'section' => 'top_header_contact',
        'type' => 'textarea',
    ) );
	
	
	$wp_customize->add_setting(
		'ferry_head_info_two', array(
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'ferry_top_header_sanitize_text',
		'default'=> '<a href="mailto:info@themeansar.com" title="Mail Me"><i class="fa fa-envelope"></i> info@themeansar.com</a>',
    ) );
    $wp_customize->add_control( 'ferry_head_info_two', array(
        'label' => __('Info Two:','ferry'),
        'section' => 'top_header_contact',
        'type' => 'textarea',
    ) );
	
	function ferry_top_header_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	
	}
	add_action( 'customize_register', 'ferry_top_header_setting' );
	?>