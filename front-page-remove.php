    <?php
	/**
	 *
	 *  Displays landing page / home page / front page is set to static other wise displays blogs
	 *
	 *  home template is left to display blog posts
	 *
	 * To make landing page / home page / front page use specified template rename this file or remove it
	 *
	 *
	 */

	try {
		get_header();

		if (is_home()) :
			echo '<h1>Blog home page. Show all blog</h1>';
			get_template_part('template/blog', 'full-width-left-sidebar');
		else:
			echo '<h1>Static page from front-page.php</h1>';
			the_content();
		endif;
   
		get_footer();
	} catch (\Throwable $th) {
		echo $th->getMessage();
	}
