<?php
// Displays all blog posts or static page

try {
	get_header();

	get_template_part('templates-parts/default', 'header');

	//if its blog home page use blog template

	if (is_home()) :

		$args = array();
		
		get_template_part('template/post/default', 'blog-template', $args);

	else:

		get_template_part('template/default', 'page-template');

	endif;

	get_template_part('templates-parts/default', 'footer');

	get_footer();
} catch (\Throwable $th) {
	echo $th->getMessage();
}
