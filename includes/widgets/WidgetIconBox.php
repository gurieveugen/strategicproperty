<?php

class WidgetIconBox extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct(
			'widget-icon-box', 
			__('Icon box'), 
			array( 
				'description' => __('Add a icon box to sidebar.'), 
				'classname' => 'b-box-icon-box'
			)
		);
	}

	function widget($args, $instance) 
	{
		$arr['icon']  = isset($instance['icon']) ? $instance['icon'] : '';
		$arr['title'] = isset($instance['title']) ? $instance['title'] : '';
		$arr['url'] = isset($instance['url']) ? $instance['url'] : '';
		
		extract($arr);
		echo $args['before_widget'];
		?>
		<div class="dt">
			<div class="dtc text-center">
				<a class="b-icon-item" href="<?php echo $url; ?>">
					<div class="img">
						<img alt="icon" src="<?php echo $icon; ?>">
					</div>
					<span><?php echo $title; ?></span>
				</a>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['icon']  = strip_tags($new_instance['icon']);
		$instance['url']  = strip_tags($new_instance['url']);
		
		return $instance;
	}

	function form( $instance ) 
	{
		$arr['title'] = isset($instance['title']) ? $instance['title'] : '';
		$arr['icon'] = isset($instance['icon']) ? $instance['icon'] : '';
		$arr['url'] = isset($instance['url']) ? $instance['url'] : '';

		extract($arr);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Image ( url ):') ?></label>
			<div class="widefat">
				<input type="text" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" value="<?php echo $icon; ?>" style="width: 70%;" />
				<button type="button" class="button button-upload" onclick="uploadMedia(event, this)">Upload</button>	
			</div>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('URL:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" value="<?php echo $url; ?>" />
		</p>
		<?php
	}
}