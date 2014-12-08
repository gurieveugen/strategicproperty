<?php
/*
 * @package WordPress
 * Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<?php if (have_posts()) : the_post(); ?>
	<div class="b-box-visual" style="background: url(<?php echo TDU; ?>/images/img-6.jpg) no-repeat;">
		<h1><strong>Contact</strong> Us</h1>
	</div>
	<div class="b-c-holder cf">
		<div class="b-box-contact">
			<h2>Drop Us a Line</h2>
			<div class="contact-form">
				<?php echo do_shortcode('[contact-form-7 id="20" title="Contact Form"]'); ?>
			</div>
		</div>
		<div class="b-map">
			<img src="<?php echo TDU; ?>/images/map.png" alt="">
		</div>
	</div>
	<?php endif; ?>
<?php get_footer(); ?>