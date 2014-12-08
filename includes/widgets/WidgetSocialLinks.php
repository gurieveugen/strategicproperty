<?php

class WidgetSocialLinks extends WP_Widget{
	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  	                                             
	function __construct() 
	{		
		parent::__construct(
			'widget-social-links', 
			__('Social links'), 
			array( 
				'description' => __('Add a social links box to sidebar.'), 
				'classname' => 'b-box-info_socials'
			)
		);
	}

	function widget($args, $instance) 
	{
		$arr['facebook']    = isset($instance['facebook']) ? sprintf('<a href="%s"><img alt="" src="http://site5.miydim.com/wp-content/themes/strategicproperty/images/ico-facebook.png"></a>', $instance['facebook']) : '';
		$arr['twitter']     = isset($instance['twitter']) ? sprintf('<a href="%s"><img alt="" src="http://site5.miydim.com/wp-content/themes/strategicproperty/images/ico-twitter.png"></a>', $instance['twitter']) : '';
		$arr['google_plus'] = isset($instance['google_plus']) ? sprintf('<a href="%s"><img alt="" src="http://site5.miydim.com/wp-content/themes/strategicproperty/images/ico-google.png"></a>', $instance['google_plus']) : '';
		$arr['linked_in']   = isset($instance['linked_in']) ? sprintf('<a href="%s"><img alt="" src="http://site5.miydim.com/wp-content/themes/strategicproperty/images/ico-in.png"></a>', $instance['linked_in']) : '';
		$arr['email']       = isset($instance['email']) ? sprintf('<a href="mailto:%s"><img alt="" src="http://site5.miydim.com/wp-content/themes/strategicproperty/images/ico-mail.png"></a>', $instance['email']) : '';
		
		extract($arr);
		echo $args['before_widget'];
		?>
		<ul class="cf">
			<li></li>
			<li>
				<?php echo $google_plus; ?>
			</li>
			<li>
				<?php echo $twitter; ?>
			</li>
			<li></li>
			<li>
				<?php echo $email; ?>
			</li>
			<li></li>
			<li>
				<?php echo $facebook; ?>
			</li>
			<li></li>
			<li>
				<?php echo $linked_in; ?>
			</li>
		</ul>
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) 
	{
		$instance['facebook']    = strip_tags($new_instance['facebook']);
		$instance['twitter']     = strip_tags($new_instance['twitter']);
		$instance['google_plus'] = strip_tags($new_instance['google_plus']);
		$instance['linked_in']   = strip_tags($new_instance['linked_in']);
		$instance['email']       = strip_tags($new_instance['email']);
		
		return $instance;
	}

	function form( $instance ) 
	{
		$arr['facebook']    = isset($instance['facebook']) ? $instance['facebook'] : '';
		$arr['twitter']     = isset($instance['twitter']) ? $instance['twitter'] : '';
		$arr['google_plus'] = isset($instance['google_plus']) ? $instance['google_plus'] : '';
		$arr['linked_in']   = isset($instance['linked_in']) ? $instance['linked_in'] : '';
		$arr['email']       = isset($instance['email']) ? $instance['email'] : '';

		extract($arr);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook (url):') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $facebook; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter (url):') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $twitter; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google_plus'); ?>"><?php _e('Google plus (url):') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('google_plus'); ?>" name="<?php echo $this->get_field_name('google_plus'); ?>" value="<?php echo $google_plus; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linked_in'); ?>"><?php _e('Linked in (url):') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('linked_in'); ?>" name="<?php echo $this->get_field_name('linked_in'); ?>" value="<?php echo $linked_in; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $email; ?>" />
		</p>

		<?php
	}
}