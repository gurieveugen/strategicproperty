<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : the_post(); ?>
<article id="content" class="main-content left content-style cf">
	<h1 class="title-page"><?php the_title(); ?></h1>
	<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'theme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
</article>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
