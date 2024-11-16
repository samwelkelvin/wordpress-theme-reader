<?php

/**
 *
 *
 * Sanitizes data for theme Customizer input controls
 *
 * https://medium.com/@gonstoll/add-custom-sections-to-the-customizer-on-your-wordpress-theme-8fc04754c2d9
 *
 * https://divpusher.com/blog/wordpress-customizer-sanitization-examples/
 *
 * wordpress sanitatization
 * absint() – converts value to positive integer, useful for numbers, IDs, etc.
 * esc_url_raw() – for inserting URL in database safely
 * sanitize_email() – strips out all characters that are not allowable in an email address
 * sanitize_file_name() – removes special characters that are illegal in filenames on certain operating system
 * sanitize_hex_color() – returns 3 or 6 digit hex color with #, or nothing
 * sanitize_hex_color_no_hash() – the same as above but without a #
 * sanitize_html_class() – sanitizes an HTML classname to ensure it only contains valid characters
 * sanitize_key() – lowercase alphanumeric characters, dashes and underscores are allowed
 * sanitize_mime_type() – useful to save mime type in DB, e.g. uploaded file’s type
 * sanitize_option() – sanitizes values like update_option() and add_option() does for various option types. Here is the list of avaliable options: https://codex.wordpress.org/Function_Reference/sanitize_option#Notes
 * sanitize_sql_orderby() – ensures a string is a valid SQL order by clause
 * sanitize_text_field() – removes all HTML markup, as well as extra whitespace, leaves nothing but plain text
 * sanitize_title() – returned value intented to be suitable for use in a URL
 * sanitize_title_for_query() – used for querying the database for a value from URL
 * sanitize_title_with_dashes() – same as above but it does not replace special accented characters
 * sanitize_user() – sanitize username stripping out unsafe characters
 * wp_filter_post_kses(), wp_kses_post() – it keeps only HTML tags which are allowed in post content as well
 * wp_kses() – allows only HTML tags and attributes that you specify
 * wp_kses_data() – sanitize content with allowed HTML Kses rules
 * wp_rel_nofollow() – adds rel nofollow string to all HTML A elements in content
 * I also give you some PHP functions to fill some gaps.
 * filter_var($variable, $filter) – filters a variable with a specific filter
 * strlen() – gets string length, useful for ZIP codes, phone numbers
 *
 */

/*
//checkbox sanitization function
function theme_slug_sanitize_checkbox($input)
{
	//returns true if checkbox is checked
	return (isset($input) ? true : false);
}

//text sanitization function
function theme_slug_sanitize_text($input)
{
	//returns the sanitized text
	return sanitize_text_field($input);
}

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

//file input sanitization function
function theme_slug_sanitize_file($file, $setting)
{

	//allowed file types
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png'
	);

	//check file type from file name
	$file_ext = wp_check_filetype($file, $mimes);

	//if file has a valid mime type return it, otherwise return default
	return ($file_ext['ext'] ? $file : $setting->default);
}
*/

/**
 *
 *
 * all functions
 *
 *
 */

// Sanitaizing radio box

function theme_slug_customizer_radiobox($wp_customize)
{
	//your section
	$wp_customize->add_section(
		'theme_slug_customizer_your_section',
		array(
			'title' => esc_html__('Your Section', 'theme_slug'),
			'priority' => 150
		)
	);

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

	//add setting to your section
	$wp_customize->add_setting(
		'theme_slug_customizer_radio',
		array(
			'sanitize_callback' => 'theme_slug_sanitize_radio'
		)
	);

	$wp_customize->add_control(
		'theme_slug_customizer_radio',
		array(
			'label' => esc_html__('Your Setting with Radio Box', 'theme_slug'),
			'section' => 'theme_slug_customizer_your_section',
			'type' => 'radio',
			'choices' => array(
				'one' => esc_html__('Choice One', 'theme_slug'),
				'two' => esc_html__('Choice Two', 'theme_slug'),
				'three' => esc_html__('Choice Three', 'theme_slug')
			)
		)
	);
}
add_action('customize_register', 'theme_slug_customizer_radiobox');

// Sanitaizing sanitize checkbox

function theme_slug_customizer($wp_customize)
{
	//your section
	$wp_customize->add_section(
		'theme_slug_customizer_your_section',
		array(
			'title' => esc_html__('Your Section', 'theme_slug'),
			'priority' => 150
		)
	);

	//checkbox sanitization function
	function theme_slug_sanitize_checkbox($input)
	{
		//returns true if checkbox is checked
		return (isset($input) ? true : false);
	}

	//add setting to your section
	$wp_customize->add_setting(
		'theme_slug_customizer_checkbox',
		array(
			'default' => '',
			'sanitize_callback' => 'theme_slug_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'theme_slug_customizer_checkbox',
		array(
			'label' => esc_html__('Your Setting with Checkbox', 'theme_slug'),
			'section' => 'theme_slug_customizer_your_section',
			'type' => 'checkbox'
		)
	);
}
add_action('customize_register', 'theme_slug_customizer');

// Sanitaizing radio box

// Sanitaizing radio box

// Sanitaizing radio box

// Sanitaizing radio box

// Sanitaizing radio box

// Sanitaizing radio box

// Sanitaizing radio box

// Sanitaizing radio box
