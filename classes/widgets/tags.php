<?php

class Reader_Tags extends WP_Widget
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
			'reader_tags_widget',

			//Name
			__('Reader Tags Widget', 'reader'),

			//description array);
			array('description' => __('Display tags in a widget', 'reader')),
		);
	}

	// Front end display

	public function widget($args, $instance)
	{
		$this->getTags();
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
			$title = __('Tags', 'reader_domain');
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
	private function getTags()
	{
		?>

       <div class="widget">
            <h4 class="widget-title"><span>Tags</span></h4>
       <ul class="list-inline widget-list-inline  widget-card">

        <?php

		$tags = get_tags(array('get' => 'all'));

		if ($tags) {
			foreach ($tags as $tag):

				echo '<li  class="list-inline-item"><a href="' . get_term_link($tag) . '">' . $tag->name . '</a></li>';

			endforeach;
		} else {
			_e('No tags created.', 'text-domain');
		}

		?>

        </ul>
       </div>

        <?php
	}
}

//registering the  widgets
function register_reader_tags_widget()
{
	register_widget('Reader_Tags');
}
add_action('widgets_init', 'register_reader_tags_widget');
