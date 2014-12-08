<?php
/**
 * @package WordPress
 * @subpackage Base_theme
 */
?>
<?php if ( is_active_sidebar( 'internal-right-sidebar' ) ) : ?>
	<div class="main-sidebar right">
		<?php dynamic_sidebar( 'internal-right-sidebar' ); ?>
	</div>
<?php endif; ?>