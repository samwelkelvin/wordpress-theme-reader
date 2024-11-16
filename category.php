<?php

/**
 *
 * Didplays blog post based on selected category
 *
 */

try {
	$current_category = get_queried_object();

	$page_title = 'Category : <mark> ' . esc_html($current_category->name) . '</mark>';

	get_template_part('template/content', 'excerpt-listing', array('page_title' => $page_title));
} catch (\Throwable $th) {
	echo $th->getMessage();
}
