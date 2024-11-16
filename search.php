<?php
// Displays all search results

try {
	$page_title = 'Search results for <mark>' . esc_html(get_search_query()) . '</mark>';
	
	get_template_part('template/content', 'excerpt-listing', array('page_title' => $page_title));
} catch (\Throwable $th) {
	echo $th->getMessage();
}
