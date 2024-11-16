<?php

class Example_widget extends WP_Widget
{
	public function __construct()
	{
		parent::__construct(
			// widget ID
			'example_widget',
			// widget name
			__('Reader Sample Widget', 'reader_theme_domain'),
			// widget description
			array('description' => __('Reader Widget Tutorial', 'reader_theme_domain'), )
		);
	}

	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);
		echo $args['before_widget'];
	 
		//if title is present
		if (!empty($title)) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		//output
		echo __('Greetings from Reader.com!', 'reader_theme_domain');
		echo $args['after_widget'];
	}

	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('Default Title', 'reader_theme_domain');
		}
		?>
                <p>
                    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
                </p>
        <?php
	}

	//refreshes widget every time its updated
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

		return $instance;
	}
}

//registering the  widgets
function reader_eaxample_register_widget()
{
	register_widget('Example_widget');
}
add_action('widgets_init', 'hstngr_register_widget');
