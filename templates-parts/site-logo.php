<?php

if (function_exists('the_custom_logo')) {
	$logo_id = get_theme_mod('custom_logo');

	$logo = wp_get_attachment_image_src($logo_id);

	if ($logo) {
		echo '<img class="img-fluid site_logo" width="150px" src="' . $logo[0] . '" alt="Logo">';
	} else {
		echo 'Logo';
	}
} else {
	echo 'Logo';
}
