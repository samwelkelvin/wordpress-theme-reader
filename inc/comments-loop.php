<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

?>

<!--  -->

<?php

/**
 * Comments
 *
 * @package Reader
 *
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

/**
 * Comment reply
 */
// function reader_reply()
// {

//     if (is_singular() && comments_open() && get_option('thread_comments')) {
//         wp_enqueue_script('comment-reply');
//     }
// }

// add_action('wp_enqueue_scripts', 'reader_reply');

/**
 * Comments
 */
if (!function_exists('reader_comment')) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 */
	function reader_comment($comment, $args, $depth)
	{
		// $GLOBALS['comment'] = $comment;

		if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <div id="comment-<?php comment_ID(); ?>" <?php comment_class('media alert alert-info'); ?>>
                <div class="comment-body">
                    <?php _e('Pingback:', 'reader'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'reader'), '<span class="edit-link">', '</span>'); ?>
                </div>
            </div>

        <?php else : ?>

            <div class="media d-block d-sm-flex mb-4 pb-4" id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>

                <!-- <img class="mr-3" src="images/post/arrow.png" alt="gdfgdgdgdg"> -->

                <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                    <?php if (0 != $args['avatar_size']) {
                    	echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'mr-3 rounded-circle'));
                    } ?>
                </a>

                <div class="media-body">
                    <a href="<?php echo  get_comment_author_url() ?>" class="h4 d-inline-block mb-3">
                        <?php echo  get_comment_author() ?>
                    </a>

                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation alert alert-info"><?php _e('Your comment is awaiting moderation.', 'reader'); ?></p>
                    <?php endif; ?>

                    <?php edit_comment_link(__('Edit Comment', 'reader'), '<span class="edit-link">', '</span>'); ?>

                    <?php comment_text(); ?>

                    <span class="text-black-800 mr-3 font-weight-600" datetime="<?php comment_time('c'); ?>"> <?php printf(_x('%1$s at %2$s', '1: date, 2: time', 'reader'), get_comment_date(), get_comment_time()); ?></span>

                    <?php comment_reply_link(
                    	array_merge(
                    		$args,
                    		array(
                    			'add_below' => 'div-comment',
                    			'depth'     => $depth,
                    			'max_depth' => $args['max_depth'],
                    			'before'    => '<p class="text-primary font-weight-600">',
                    			'after'     => '</p>'
                    		)
                    	)
                    ); ?>
                </div><!-- .comment-content -->
              
            </div><!-- #comment -->

<?php
		endif;
	}
endif;

/**
 * h2 Reply Title
 */
add_filter('comment_form_defaults', 'custom_reply_title');
function custom_reply_title($defaults)
{
	$defaults['title_reply_before'] = '<h2 id="reply-title" class="h4">';
	$defaults['title_reply_after']  = '</h2>';

	return $defaults;
}

/**
 *
 *
 * Comment Cookie Checkbox
 *
 *
 */
function wp44138_change_comment_form_cookies_consent($fields)
{
	$consent           = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';
	$fields['cookies'] = '<p class="comment-form-cookies-consent custom-control form-check mb-3">' .
		'<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" class="form-check-input"' . $consent . ' />' .
		'<label for="wp-comment-cookies-consent" class="form-check-label">' . __('Save my name, email, and website in this browser for the next time I comment.', 'reader') . '</label>' .
		'</p>';

	return $fields;
}

add_filter('comment_form_default_fields', 'wp44138_change_comment_form_cookies_consent');

/**
 * Open comment author link in new tab
 */
add_filter('get_comment_author_link', 'open_comment_author_link_in_new_window');
function open_comment_author_link_in_new_window($author_link)
{
	return str_replace('<a', "<a target='_blank'", $author_link);
}

/**
 * Open links in comments in new tab
 */
if (!function_exists('bs_comment_links_in_new_tab')) :
	function bs_comment_links_in_new_tab($text)
	{
		return str_replace('<a', '<a target="_blank" rel=”nofollow”', $text);
	}

	add_filter('comment_text', 'bs_comment_links_in_new_tab');
endif;

/**
 * Comment Button
 */
if (!function_exists('reader_comment_button')) :
	function reader_comment_button($args)
	{
		$args['class_submit'] = 'btn btn-outline-primary'; // since WP 4.1

		return $args;
	}

	add_filter('comment_form_defaults', 'reader_comment_button');
endif;
?>
<!--  -->