<?php

try {
	/**
	 * Call config file
	 **/
	require get_template_directory() . '/inc/config.php';

	function reader_theme_support()
	{
		//adds dynamic title tags to page titles
		add_theme_support('title-tag');

		//allow users to add their own logo
		add_theme_support('custom-logo');

		//allow users to add post thumnails
		add_theme_support('post-thumbnails');

		add_theme_support('wp-block-styles');
		add_theme_support('block-templates');
		add_theme_support('responsive-embeds');
		add_theme_support('align-wide');

		//add post support
		// add_theme_support('post-formats',array("aside","gallery","posts"));

		$custom_header_args = array(
			'default-image' => THEME_DIR_URI . '/assets/images/header.jpg',
			'default-text-color' => '#333333',
			'width' => 1920,
			'height' => 1080,
			'flex-height' => true,
			'flex-width' => true
		);

		//  add_theme_support('custom-header', $custom_header_args);

		//register menus
		register_nav_menu('primary', __('Header Menu (Primary menu)'));

		register_nav_menu('footer', __('Footer Menu'));

		/**
		 * Register Custom Navigation Walker
		 */
		if (!file_exists(THEME_DIR . '/inc/class-wp-bootstrap-navwalker.php')) {
			// File does not exist... return an error.
			return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
		} else {
			// File exists... require it.
			require_once THEME_DIR . '/inc/class-wp-bootstrap-navwalker.php';
		}

		if (!file_exists(THEME_DIR . '/inc/class-wp-bootstrap-navwalker-footer.php')) {
			// File does not exist... return an error.
			return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker-footer.php file may be missing.', 'wp-bootstrap-navwalker'));
		} else {
			// File exists... require it.
			require_once THEME_DIR . '/inc/class-wp-bootstrap-navwalker-footer.php';
		}
	}

	add_action('after_setup_theme', 'reader_theme_support', 0);

	function reader_add_editor_styles()
	{
		add_theme_support('editor-styles');

		//custom editor css

		add_editor_style(THEME_DIR_URI . '/assets/plugins/bootstrap/bootstrap.min.css', THEME_VERSION, 'all');

		add_editor_style(THEME_DIR_URI . '/assets/plugins/themify-icons/themify-icons.css', THEME_VERSION, 'all');

		add_editor_style(THEME_DIR_URI . '/assets/plugins/slick/slick.css', THEME_VERSION, 'all');

		add_editor_style(THEME_DIR_URI . '/assets/css/style.css', THEME_VERSION, 'all');
		
		add_editor_style(THEME_DIR_URI . '/assets/css/editor.css', array('reader_bootsrap', 'reader_font-css', 'reader_slick-css'), THEME_VERSION, 'all');

		//add_editor_style( 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
	}
	add_action('after_setup_theme', 'reader_add_editor_styles');

	//remove default wordpress elipses on excerps
	function reader_excerpt_more($more)
	{
		// return '<a class="read-more btn btn-main " href="' . get_permalink(get_the_ID()) . '">Read More</a>';
		return '...';
	}

	add_filter('excerpt_more', 'reader_excerpt_more');

	//remove default partterns
	add_action('init', function () {
		//remove_theme_support('core-block-patterns');
	});

	//loads css files
	function reader_register_css()
	{
		// wp_enqueue_style('google-fonts',"https://fonts.googleapis.com/css?family=Droid&#43;Serif:400%7cJosefin&#43;Sans:300,400,600,700", [], THEME_VERSION , "all");

		wp_enqueue_style('reader_bootsrap', THEME_DIR_URI . '/assets/plugins/bootstrap/bootstrap.min.css', array(), '4.4.0', 'all');

		wp_enqueue_style('reader_font-css', THEME_DIR_URI . '/assets/plugins/themify-icons/themify-icons.css', array(), THEME_VERSION, 'all');

		wp_enqueue_style('reader_slick-css', THEME_DIR_URI . '/assets/plugins/slick/slick.css', array(), THEME_VERSION, 'all');

		wp_enqueue_style('reader_custom-css', THEME_DIR_URI . '/assets/css/style.css', array('reader_bootsrap', 'reader_font-css', 'reader_slick-css'), THEME_VERSION, 'all');

		wp_enqueue_style('reader_custom-additional-css', THEME_DIR_URI . '/assets/css/additional.css', array('reader_custom-css'), THEME_VERSION, 'all');
	}

	add_action('wp_enqueue_scripts', 'reader_register_css');

	////add custom css to admin block
	// function enqueue_admin_custom_css(){

	//     wp_enqueue_style( 'admin-custom-admin-area', THEME_DIR_URI . '/assets/plugins/bootstrap/bootstrap.min.css', [], "4.5.0", "all");

	// }

	//add_action( 'admin_enqueue_scripts', 'enqueue_admin_custom_css' );

	//loads js files
	function reader_register_js()
	{
		wp_enqueue_script('reader_jquery', THEME_DIR_URI . '/assets/plugins/jQuery/jquery.min.js', array(), THEME_VERSION, true);

		wp_enqueue_script('reader_bootsrap-js', THEME_DIR_URI . '/assets/plugins/bootstrap/bootstrap.min.js', array('reader_jquery'), '4.5.0', true);

		wp_enqueue_script('reader_slick-js', THEME_DIR_URI . '/assets/plugins/slick/slick.min.js', array('reader_jquery'), THEME_VERSION, true);

		wp_enqueue_script('reader_instafeed-js', THEME_DIR_URI . '/assets/plugins/instafeed/instafeed.min.js', array('reader_jquery'), THEME_VERSION, true);

		wp_enqueue_script('reader_custom-js', THEME_DIR_URI . '/assets/js/script.js', array('reader_jquery'), THEME_VERSION, true);
	}

	add_action('wp_enqueue_scripts', 'reader_register_js');

	/*
			add_action( 'after_switch_theme', 'create_page_on_theme_activation' );

			function create_page_on_theme_activation(){

				// Set the title, template, etc
				$new_page_title     = __('About Us','text-domain'); // Page's title
				$new_page_content   = '';                           // Content goes here
				$new_page_template  = 'page-custom-page.php';       // The template to use for the page
				$page_check = get_page_by_title($new_page_title);   // Check if the page already exists
				// Store the above data in an array
				$new_page = array(
						'post_type'     => 'page',
						'post_title'    => $new_page_title,
						'post_content'  => $new_page_content,
						'post_status'   => 'publish',
						'post_author'   => 1,
						'post_name'     => 'about-us'
				);
				// If the page doesn't already exist, create it
				if(!isset($page_check->ID)){
					$new_page_id = wp_insert_post($new_page);
					if(!empty($new_page_template)){
						update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
					}
				}
			}
		*/

	/**
	 * Register pattern categories.
	 */
	/*
		function reader_pattern_categories()
		{

			register_block_pattern_category(
				'reader_page',
				array(
					'label'       => _x('Pages', 'Block pattern category', 'vex'),
					'description' => __('A collection of full page layouts.', 'vex'),
				)
			);
		}

	add_action('init', 'reader_pattern_categories');
	*/

	/**
	 * Call Widget page
	 **/
	require get_template_directory() . '/inc/widgets/widgets.php';

	/**
	 * Call Customizer
	 **/
	require get_template_directory() . '/inc/customizer.php';

	/**
	 * Register customr widgets
	 **/
	require get_template_directory() . '/classes/register-widgets.php';

	/**
	 *
	 * Register users soscial accounts
	 *
	 **/
	require get_template_directory() . '/inc/users-social-accounts.php';
} catch (\Throwable $th) {
	echo $th->getMessage();
}
