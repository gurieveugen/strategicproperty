<?php
$front_page_text = (string) get_option('sc_front_page_text');
?>

<?php get_header(); ?>

<div class="b-boxes-holder">
	<div class="holder cf">
		<div class="b-box-info b-box-info_size-4">
			<div class="dt">
				<a href="/contact" class="text-holder dtc">
					<p><?php echo $front_page_text; ?></p>
					<p class="text-right">Contact us today.</p>
				</a>
			</div>
		</div>
		
		<?php get_sidebar('main'); ?>
		<?php get_sidebar('footer'); ?>
	</div>
</div>

<?php get_footer(); ?>