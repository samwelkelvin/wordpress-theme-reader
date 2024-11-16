<?php

/**
 *
 * Didplays single blog post
 *
 */

try {
	get_header();

	get_template_part('templates-parts/default', 'header');
 
	if (have_posts()):
		while (have_posts()) : the_post();

			get_template_part('template/post/single', 'blog-template');

		endwhile;
	else:
		echo '<h3>No data.</h3>';
	endif;

	get_template_part('templates-parts/default', 'footer');

	get_footer();
} catch (\Throwable $th) {
	echo $th->getMessage();
}
