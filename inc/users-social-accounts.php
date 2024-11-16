<?php

// -----------------------------------------------------------
/* Add User Social Links (functions.php)
/*-----------------------------------------------------------*/
function reader_add_user_social_links($user_contact)
{
	// Add user contact methods
	$user_contact['twitter'] = __('Twitter Link', 'textdomain');
	$user_contact['facebook'] = __('Facebook Link', 'textdomain');
	$user_contact['linkedin'] = __('LinkedIn Link', 'textdomain');
	$user_contact['github'] = __('Github Link', 'textdomain');
	$user_contact['instagram'] = __('Instagram Link', 'textdomain');
	$user_contact['dribbble'] = __('Dribbble Link', 'textdomain');
	$user_contact['behance'] = __('Behance Link', 'textdomain');
	$user_contact['skype'] = __('Skype Link', 'textdomain');

	$user_contact['whatsapp'] = __('WhatsApp Link', 'textdomain');
	$user_contact['tiktok'] = __('TikTok Link', 'textdomain');
	$user_contact['youtube'] = __('Youtube Link', 'textdomain');
	$user_contact['pinterest'] = __('Pinterest Link', 'textdomain');

	return $user_contact;
}

function reader_get_user_social_links()
{
	$return = '<ul class="list-inline social-icons">';
	if (!empty(get_the_author_meta('twitter'))) {
		$return .= ' <li class="list-inline-item"><a href="' . get_the_author_meta('twitter') . '" title="Twitter" target="_blank" id="twitter"><i class="ti-twitter"></i></a></li>';
	}
	if (!empty(get_the_author_meta('facebook'))) {
		$return .= ' <li class="list-inline-item"><a href="' . get_the_author_meta('facebook') . '" title="Facebook" target="_blank" id="facebook"><i class="ti-facebook"></i></a></li>';
	}
	if (!empty(get_the_author_meta('linkedin'))) {
		$return .= ' <li class="list-inline-item"><a href="' . get_the_author_meta('linkedin') . '" title="LinkedIn" target="_blank" id="linkedin"><i class="ti-linkedin"></i></a></li>';
	}
	if (!empty(get_the_author_meta('github'))) {
		$return .= ' <li class="list-inline-item"><a href="' . get_the_author_meta('github') . '" title="Github" target="_blank" id="github"><i class="ti-github"></i></a></li>';
	}
	if (!empty(get_the_author_meta('instagram'))) {
		$return .= ' <li class="list-inline-item"><a href="' . get_the_author_meta('instagram') . '" title="Instagram" target="_blank" id="instagram"><i class="ti-instagram"></i></a></li>';
	}
	if (!empty(get_the_author_meta('dribbble'))) {
		$return .= ' <li class="list-inline-item"><a href="' . get_the_author_meta('dribbble') . '" title="Dribbble" target="_blank" id="dribbble"><i class="ti-dribbble"></i></a></li>';
	}
	if (!empty(get_the_author_meta('behance'))) {
		$return .= ' <li class="list-inline-item"><a href="' . get_the_author_meta('behance') . '" title="Behance" target="_blank" id="behance"><i class="ti-behance"></i>Behance</a></li>';
	}
	if (!empty(get_the_author_meta('skype'))) {
		$return .= ' <li class="list-inline-item"><a href="' . get_the_author_meta('skype') . '" title="Skype" target="_blank" id="skype"><i class="ti-skype"></i></a></li>';
	}
	if (!empty(get_the_author_meta('whatsapp'))) {
		$return .= ' <li class="list-inline-item"><a href="' . get_the_author_meta('whatsapp') . '" title="WhatsApp" target="_blank" id="whatsapp"><i class="ti-skype"></i></a></li>';
	}
	$return .= '</ul>';

	return $return;
}

add_filter('user_contactmethods', 'reader_add_user_social_links');
