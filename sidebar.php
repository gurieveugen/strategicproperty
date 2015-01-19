<?php
/**
 * @package WordPress
 * @subpackage Base_theme
 */
?>
<?php if ( is_active_sidebar( 'internal-right-sidebar' ) ) : ?>
	<div id="sidebar" class="main-sidebar right">
		<?php dynamic_sidebar( 'internal-right-sidebar' ); ?>
	</div>
<?php endif; ?>