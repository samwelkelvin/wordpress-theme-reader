<?php

/**
 *
 *
 * Theme Customizer
 *
 *
 *
 */

//select sanitization function
function theme_slug_sanitize_select($input, $setting)
{
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible select options
	$choices = $setting->manager->get_control($setting->id)->choices;

	//return input if valid or return default option
	return (array_key_exists($input, $choices) ? $input : $setting->default);
}

//checkbox sanitization function
function theme_slug_sanitize_checkbox($input)
{
	//returns true if checkbox is checked
	return (isset($input) ? true : false);
}

//radio box sanitization function
function theme_slug_sanitize_radio($input, $setting)
{
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible radio box options
	$choices = $setting->manager->get_control($setting->id)->choices;

	//return input if valid or return default option
	return (array_key_exists($input, $choices) ? $input : $setting->default);
}

//soc
function reader_social_media($wp_customize)
{
	//Settings
	$wp_customize->add_setting(
		'twitter',
		array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw', //cleans URL from all invalid characters
			'transport' => 'refresh',
			'default' => 'https://twitter.com/'
		)
	);

	$wp_customize->add_setting(
		'instagram',
		array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
			'default' => 'https://instalgram.com/'
		)
	);

	$wp_customize->add_setting(
		'facebook',
		array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
			'default' => 'https://facebook.com/'
		)
	);

	$wp_customize->add_setting(
		'linkedin',
		array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
			'default' => 'https://linkedin.com/'
		)
	);

	$wp_customize->add_setting(
		'github',
		array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
			'default' => 'https://github.com/'
		)
	);

	$wp_customize->add_setting(
		'youtube',
		array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
			'default' => 'https://youtube.com/'
		)
	);

	$wp_customize->add_setting(
		'show_social_media_handles',
		array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
			'default' => ''
		)
	);

	// $wp_customize->add_setting('setting_id', array(
	//     'type' => 'theme_mod', // or 'option' not recommended for themes unless its a plugin
	//     'capability' => 'edit_theme_options',
	//     'theme_supports' => '', // Rarely needed.
	//     'default' => '',
	//     'transport' => 'refresh', // or postMessage
	//     'sanitize_callback' => '',
	//     'sanitize_js_callback' => '', // Basically to_json.
	// ));

	//Sections
	$wp_customize->add_section(
		'social-media',
		array(
			'title' => esc_html__('Social Media', '_s'),
			'priority' => 30,
			'description' => esc_html__('Enter the URL to your accounts for each social media for the icon to appear in the header.', '_s')
		)
	);

	//Controls
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_social_media_handles',
			array(
				'label' => esc_html__('Display social media handles', '_s'),
				'section' => 'social-media',
				'settings' => 'show_social_media_handles',
				'type' => 'checkbox'
			)
		)
	);

	//Controls
	//Twitter
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'twitter',
			array(
				'label' => esc_html__('Twitter', '_s'),
				'section' => 'social-media',
				'settings' => 'twitter',
				'transport' => 'refresh',
				'type' => 'url'
			)
		)
	);
	//Instragram
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'instagram',
			array(
				'label' => esc_html__('Instagram', '_s'),
				'section' => 'social-media',
				'settings' => 'instagram',
				'type' => 'url'
			)
		)
	);
	//Facebook
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'facebook',
			array(
				'label' => esc_html__('Facebook', '_s'),
				'section' => 'social-media',
				'settings' => 'facebook',
				'type' => 'url'
			)
		)
	);
	//Linkedin
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'linkedin',
			array(
				'label' => esc_html__('Linkedin', '_s'),
				'section' => 'social-media',
				'settings' => 'linkedin',
				'type' => 'url'
			)
		)
	);
	//Github
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'github',
			array(
				'label' => esc_html__('Github', '_s'),
				'section' => 'social-media',
				'settings' => 'github',
				'type' => 'url'
			)
		)
	);
	//Youtube
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'youtube',
			array(
				'label' => esc_html__('YouTube', '_s'),
				'section' => 'social-media',
				'settings' => 'youtube',
				'type' => 'url'
			)
		)
	);
}

add_action('customize_register', 'reader_social_media');

//blog page layout settings

function reader_theme_settings($wp_customize)
{
	$wp_customize->add_setting('show_sidebar_in_blog_pages', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
	
	$wp_customize->add_setting(
		'blog-layout',
		array('default' => 'grid', 'transport' => 'refresh', 'sanitize_callback' => 'theme_slug_sanitize_select')
	);

	$wp_customize->add_setting(
		'blog_pages_sidebar',
		array('default' => 'right_sidebar', 'transport' => 'refresh', 'sanitize_callback' => 'theme_slug_sanitize_select')
	);

	//Blog page layout settings section
	
	$wp_customize->add_section(
		'blog-layout',
		array(
			'title' => esc_html__('Blog Page Layout', '_s'),
			'priority' => 30,
			'description' => esc_html__('Select the layout for your blog page.', '_s'),
		)
	);

	//Controls
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_sidebar_in_blog_pages',
			array(
				'label' => esc_html__('Display Sidebar in blog pages', '_s'),
				'section' => 'blog-layout',
				'settings' => 'show_sidebar_in_blog_pages',
				'type' => 'checkbox'
			)
		)
	);

	//Blog layout
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog-layout',
			array(
				'label' => esc_html__('Blog Layout', '_s'),
				'section' => 'blog-layout',
				'settings' => 'blog-layout',
				'type' => 'select',
				'choices' => array(
					'grid' => esc_html__('Grid', '_s'),
					'list' => esc_html__('List', '_s'),
				),
			)
		)
	);

	//Blog pages sidebar
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_pages_sidebar',
			array(
				'label' => esc_html__('Blog Pages Sidebar location', '_s'),
				'section' => 'blog-layout',
				'settings' => 'blog_pages_sidebar',
				'type' => 'select',
				'choices' => array(
					'left_sidebar' => esc_html__('Sidebar on the left side.', '_s'),
					'right_sidebar' => esc_html__('Sidebar on the right side.', '_s'),
				),
			)
		)
	);

	//Blog pages sidebar
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_pages_sidebar',
			array(
				'label' => esc_html__('Blog Pages Sidebar location', '_s'),
				'section' => 'blog-layout',
				'settings' => 'blog_pages_sidebar',
				'type' => 'select',
				'choices' => array(
					'left_sidebar' => esc_html__('Sidebar on the left side.', '_s'),
					'right_sidebar' => esc_html__('Sidebar on the right side.', '_s'),
				)
			)
		)
	);
}

add_action('customize_register', 'reader_theme_settings');

/*
$wp_customize->add_setting('themecheck_checkbox_setting_id', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'themeslug_sanitize_checkbox',
));

$wp_customize->add_control('themeslug_checkbox_setting_id', array(
	'type' => 'checkbox',
	'section' => 'custom_section', // Add a default or your own section
	'label'=> esc_html__('Custom Checkbox'),
	'description'=> esc_html__('This is a custom checkbox input.'),
));


function themeslug_sanitize_checkbox($checked)
{
	// Boolean check.
	return ((isset($checked) && true == $checked) ? true : false);
}
*/
/*
function social_media($wp_customize)
{
	//Setting
	$wp_customize->add_setting('instagram', array('default' => ''));

	//Section
	$wp_customize->add_section(
		'social-media',
		array(
			'title'=> esc_html__('Social Media', '_s'),
			'priority' => 30,
			'description'=> esc_html__('Enter the URL to your accounts for each social media for the icon to appear in the header.', '_s')
		)
	);

	//Control
	//Instragram
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'instagram',
			array(
				'label'=> esc_html__('Instagram', '_s'),
				'section' => 'social-media',
				'settings' => 'instagram'
			)
		)
	);
}
*/
