<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function bootstrap_blog_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'bootstrap-blog'),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget  dynamic_widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Blog Page Sidebar', 'bootstrap-blog'),
		'id'            => 'blog-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget  dynamic_widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Left Sidebar', 'bootstrap-blog' ),
	// 	'id'            => 'sidebar-left',
	// 	'description'   => '',
	// 	'before_widget' => '<div id="%1$s" class="widget  dynamic_widget  %2$s">',
	// 	'after_widget'  => '</div>',
	// 	'before_title'  => '<h4 class="widget-title">',
	// 	'after_title'   => '</h4>',
	// ) );

	register_sidebar(array(
		'name'          => esc_html__('Instagram', 'bootstrap-blog'),
		'id'            => 'instagram',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget  dynamic_widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Email Subscription', 'bootstrap-blog'),
		'id'            => 'email-subscription',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget  dynamic_widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Widget', 'bootstrap-blog'),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget  dynamic_widget  %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));

	// if ( class_exists( 'WooCommerce' ) ) {
	// 	register_sidebar( array(
	// 		'name'          => esc_html__( 'WooCommerce Sidebar', 'bootstrap-blog' ),
	// 		'id'            => 'woocommerce_sidebar',
	// 		'description'   => '',
	// 		'before_widget' => '<div id="%1$s" class="widget  dynamic_widget  %2$s">',
	// 		'after_widget'  => '</div>',
	// 		'before_title'  => '<h5 class="widget-title">',
	// 		'after_title'   => '</h5>',
	// 	) );
	// }
}
add_action('widgets_init', 'bootstrap_blog_widgets_init');
