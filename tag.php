<?php
// Displays all blog posts with given tag

try {
	$page_title = 'Showing results with <mark>' . esc_html(single_tag_title('', false)) . '</mark> tag';

	get_template_part('template/content', 'excerpt-listing', array('page_title' => $page_title));
} catch (\Throwable $th) {
	echo $th->getMessage();
}
