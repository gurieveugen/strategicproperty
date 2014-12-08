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
			<?php echo do_shortcode('[gmap]'); ?>
		</div>
	</div>
	<script>
		google.maps.event.addDomListener(window, 'load', initializeGMap);
		function initializeGMap() 
		{
			var myLatlng = new google.maps.LatLng(jQuery('#map-canvas').data('lat'), jQuery('#map-canvas').data('lng'));
			var mapOptions = {
				zoom: 14,
				center: myLatlng,
				disableDefaultUI: true
			}
			var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title: 'My location!'
			});
		}
	</script>
	<?php endif; ?>
<?php get_footer(); ?>