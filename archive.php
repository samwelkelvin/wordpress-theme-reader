<?php
// Displays all archived blog posts
try {
	$page_title = 'Archive for : <mark> ' . esc_html(date('F', mktime(0, 0, 0, get_query_var('monthnum'), 10)) . ' ' . get_query_var('year')) . '</mark>';

	get_template_part('template/content', 'excerpt-listing', array('page_title' => $page_title));
} catch (\Throwable $th) {
	echo $th->getMessage();
}
