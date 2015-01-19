<?php
/*
 * @package WordPress
 * @subpackage Base_Theme
 */

define('TDU', get_bloginfo('template_url'));

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

add_theme_support( 'post-thumbnails' );
/*set_post_thumbnail_size( 604, 270, true );
add_image_size( 'single-post-thumbnail', 400, 9999, false );*/

register_nav_menus( array(
	'primary_nav' => __( 'Primary Navigation', 'theme' )
) );

function change_menu_classes($css_classes){
	$css_classes = str_replace("current-menu-item", "current-menu-item active", $css_classes);
	$css_classes = str_replace("current-menu-parent", "current-menu-parent active", $css_classes);
	return $css_classes;
}
add_filter('nav_menu_css_class', 'change_menu_classes');

function filter_template_url($text) {
	return str_replace('[template-url]',get_bloginfo('template_url'), $text);
}
add_filter('the_content', 'filter_template_url');
add_filter('get_the_content', 'filter_template_url');
add_filter('widget_text', 'filter_template_url');

function theme_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<div class="nav-links cf">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'theme' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'theme' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
function theme_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'theme' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'theme' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'theme' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
function theme_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'theme' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'theme' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
function theme_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'theme' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		theme_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'theme' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'theme' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'theme' ), get_the_author() ) ),
			get_the_author()
		);
	}
}

// register tag [template-url]
function template_url($text) {
	return str_replace('[template-url]',get_bloginfo('template_url'), $text);
}
add_filter('the_content', 'template_url');
add_filter('get_the_content', 'template_url');
add_filter('widget_text', 'template_url');


// ==============================================================
// REQUIRE
// ==============================================================
require_once 'includes/__.php';
require_once 'includes/widgets/WidgetImageBox.php';
require_once 'includes/widgets/WidgetSocialLinks.php';
require_once 'includes/widgets/WidgetIconBox.php';
require_once 'includes/widgets/WidgetPromoText.php';

// ==============================================================
// Actions and filters
// ==============================================================
add_action('widgets_init', 'widgetsInit');
add_action('wp_enqueue_scripts', 'scriptsAndStyles');

// ==============================================================
// Control Collections
// ==============================================================
$ccollection_contacts = new Controls\ControlsCollection(
	array(		
		new Controls\Textarea(
			'Address', 
			array(
				'default-value' => '80 Beaufort st, Mount Lawley. Perth Western Australia',
				'description'   => 'Your address'
			), 
			array('placeholder' => 'Enter your address')
		),
		new Controls\Textarea(
			'Front page text', 
			array(
				'default-value' => 'Welcome to Strategic Property Conveyancing, Our professional service will settle your property with peace of mind.',
				'description'   => 'Featured text'
			), 
			array('placeholder' => 'Enter front page text')
		),
	)
);

$ccollection_gmap = new Controls\ControlsCollection(
	array(		
		new Controls\Text(
			'Latitude', 
			array(
				'default-value' => '-31.949603',
				'description'   => 'Latitude from google maps'
			), 
			array('placeholder' => 'Enter your Latitude')
		),
		new Controls\Text(
			'Longitude', 
			array(
				'default-value' => '115.862642',
				'description'   => 'Longitude from google maps'
			), 
			array('placeholder' => 'Enter your Longitude')
		),
		new Controls\Text(
			'Map height', 
			array(
				'default-value' => '540',
				'description'   => 'Height in pixels'
			), 
			array('placeholder' => 'Pixels')
		),
	)
);
// ==============================================================
// Sections
// ==============================================================
$section_contacts    = new Admin\Section(
	'Contacts settings', 
	array(
		'prefix'   => 'sc_',
		'tab_icon' => 'fa-book'
	), 
	$ccollection_contacts
);

$section_google_map    = new Admin\Section(
	'Google map settings', 
	array(
		'prefix'   => 'gms_',
		'tab_icon' => 'fa-map-marker'
	), 
	$ccollection_gmap
);
// ==============================================================
// Pages
// ==============================================================
$page_settings = new Admin\Page(
	'Theme setting', 
	array(
		'parent_page' => 'options-general.php',
		'capability'  => 'edit_others_posts',
	), 
	array(
		$section_contacts,
		$section_google_map
	)
);
// ==============================================================
// Other classes
// ==============================================================
$gmap = new GMap();

//                    __  __              __    
//    ____ ___  ___  / /_/ /_  ____  ____/ /____
//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
//                                              
/**
 * Register custom sidebar
 */
function widgetsInit()
{
	register_sidebar(
		array(
			'id'            => 'main-right-sidebar',
			'name'          => 'Main right sidebar',
			'before_widget' => '<div class="b-box-info %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>'
		)
	);

	register_sidebar(
		array(
			'id'            => 'main-footer-sidebar',
			'name'          => 'Main footer sidebar',
			'before_widget' => '<div class="b-box-info %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>'
		)
	);

	register_sidebar(
		array(
			'id'            => 'internal-right-sidebar',
			'name'          => 'Internal right sidebar',
			'before_widget' => '<aside class="b-box-info %2$s" id="%1$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>'
		)
	);

	register_widget('WidgetImageBox');
	register_widget('WidgetSocialLinks');
	register_widget('WidgetIconBox');
	register_widget('WidgetPromoText');
}

function scriptsAndStyles() 
{
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', TDU.'/js/jquery-1.11.1.min.js');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'google_map', 'https://maps.googleapis.com/maps/api/js?v=3.exp' );
	wp_enqueue_style('for_scripts', TDU.'/css/for_scripts.css');
}