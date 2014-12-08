<?php

class WidgetPromoText extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct(
			'widget-promo-text', 
			__('Promo text'), 
			array( 
				'description' => __('Add a promo text to sidebar.'), 
				'classname' => 'b-box-promo-text'
			)
		);
	}

	function widget($args, $instance) 
	{
		$arr['title']   = isset($instance['title']) ? $instance['title'] : '';
		$arr['content'] = isset($instance['content']) ? $instance['content'] : '';
		$arr['url']     = isset($instance['url']) ? $instance['url'] : '';
		
		extract($arr);
		echo $args['before_widget'];
		?>
		<div class="dt">
			<div class="text-holder dtc">
				<h4><?php echo $title; ?></h4>
				<p><?php echo $content; ?></p>
				<div class="text-right text-small">
					<a href="<?php echo $url; ?>">View More</a>
				</div>
			</div>
		</div>
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['title']   = strip_tags($new_instance['title']);
		$instance['content'] = strip_tags($new_instance['content']);
		$instance['url']     = strip_tags($new_instance['url']);
		
		return $instance;
	}

	function form( $instance ) 
	{
		$arr['title']   = isset($instance['title']) ? $instance['title'] : '';
		$arr['content'] = isset($instance['content']) ? $instance['content'] : '';
		$arr['url']     = isset($instance['url']) ? $instance['url'] : '';
	
		extract($arr);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:') ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" cols="30" rows="10"><?php echo $content; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('URL:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" value="<?php echo $url; ?>" />
		</p>
		<?php
	}
}