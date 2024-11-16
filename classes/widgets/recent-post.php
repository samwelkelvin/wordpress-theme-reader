<?php

class Reader_Recent_Posts extends WP_Widget
{
	/**
	 *
	 * Register widget with wordpress
	 *
	 */
	public function __construct()
	{
		parent::__construct(
			//base id
			'reader_recent_posts_widget',

			//Name
			__('Reader Recent Posts Widget', 'reader'),

			//description array);
			array('description' => __('Display recent posts in a widget', 'reader')),
		);
	}

	// Front end display

	public function widget($args, $instance)
	{
		$this->getRecentPosts();
	}

	/***
	 *
	 * Widget backend
	 *
	 * $instance previously  saved values in database
	 *
	 */

	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('Recent posts', 'reader_domain');
		}
		?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>

            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

    <?php
	}

	/***
	 *
	 * sanitize widget form values as they are being saved
	 *
	 * refreshes widget every time its updated
	 */

	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

		return $instance;
	}

	/**
	 *
	 *
	 * User functions
	 *
	 *
	 */

	//post tags

	private function getRecentPosts()
	{
		?>
        <div class="widget">
            <h4 class="widget-title">Recent Post </h4>
            <?php
				$recent_posts = wp_get_recent_posts(array(
					'numberposts' => 4, // Number of recent posts thumbnails to display
					'post_status' => 'publish' // Show only the published posts
				));
		foreach ($recent_posts as $post_item) : ?>
                <article class="widget-card">
                    <div class="d-flex">
                        <img class="card-img-sm" src="<?php echo get_the_post_thumbnail_url($post_item['ID'], 'thumbnail') ?>">
                        <div class="ml-3">
                            <h5><a class="post-title" href="<?php echo get_permalink($post_item['ID']) ?>">
                                    <?php echo $post_item['post_title'] ?>
                                </a>
                            </h5>
                            <ul class="card-meta list-inline mb-0">
                                <li class="list-inline-item mb-0">
                                    <i class="ti-calendar"></i><?php echo date('F j, Y, g:i a', strtotime($post_item['post_date'])); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>
            <?php
		endforeach;
		echo '</div>';
	}
}

//registering the  widgets
function register_reader_recent_posts_widget()
{
	register_widget('Reader_Recent_Posts');
}
add_action('widgets_init', 'register_reader_recent_posts_widget');
