<?php 
// Change this to something unique
$theme_name = 'dmopress-starter-theme';

// Third Party Libraries
require_once 'lib/tgm-plugin-activation/class-tgm-plugin-activation.php';
require_once 'lib/wp-bootstrap-navwalker/wp-bootstrap-navwalker.php';

//Set up theme defaults and register support for various WordPress features.
if (!function_exists('dmopress_wordpress_starter_setup')){

	function dmopress_wordpress_starter_setup() {

		global $theme_name;

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		//Enable featured images  
		add_theme_support('post-thumbnails');

		//Let WordPress manage the document title.
		add_theme_support('title-tag');

		//Enable support for custom logo
		add_theme_support( 'custom-logo', array(
			'height'      => 120,
			'width'       => 400,
			'flex-width' => true,
		) );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Post Format support
		add_theme_support('post-formats', array('gallery'));

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//Enable shortcode support in text widgets
		add_filter('widget_text', 'do_shortcode');

		// Make theme available for translation.
		load_theme_textdomain($theme_name);

		// Register Nav Menus
		register_nav_menus(array(
			'top' => __('Top Bar Menu', $theme_name),
			'main' => __('Main Menu', $theme_name)
		));

		//Set content width
		if (!isset($content_width)){
			$content_width = 1200;
		}

		// Register sidebars
		$args = array(
			'name'          => __( 'Main Sidebar', $theme_name ),
			'id'            => 'main',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<div class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);
		register_sidebar( $args );	

		$args = array(
			'name'          => __( 'Top Bar, Left Side', $theme_name ),
			'id'            => 'topbar-left',
			'description'   => 'Supported Widgets: Custom Menu, Search, Social Link and Text. Other widgets will not display in this zone.',
			'class'         => '',
			'before_widget' => '<div class="topbar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);
		register_sidebar( $args );	

		$args = array(
			'name'          => __( 'Top Bar, Right Side', $theme_name ),
			'id'            => 'topbar-right',
			'description'   => 'Supported Widgets: Custom Menu, Search, Social Link and Text. Other widgets will not display in this zone.',
			'class'         => '',
			'before_widget' => '<div class="topbar-widget  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);
		register_sidebar( $args );	

		$args = array(
			'name'          => __( 'Footer Column 1', $theme_name ),
			'id'            => 'footer-column-1',
			'description'   => '',
			'class'         => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);
		register_sidebar( $args );	

		$args = array(
			'name'          => __( 'Footer Column 2', $theme_name ),
			'id'            => 'footer-column-2',
			'description'   => '',
			'class'         => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);
		register_sidebar( $args );	

		$args = array(
			'name'          => __( 'Footer Column 3', $theme_name ),
			'id'            => 'footer-column-3',
			'description'   => '',
			'class'         => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);
		register_sidebar( $args );

		$args = array(
			'name'          => __( 'Footer Column 4', $theme_name ),
			'id'            => 'footer-column-4',
			'description'   => '',
			'class'         => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);
		register_sidebar( $args );	

		// Add main styles to editor
		add_editor_style('css/app.min.css');
		add_editor_style('https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700');

	}
}
add_action( 'after_setup_theme', 'dmopress_wordpress_starter_setup' );

//Register plugin dependencies and recommendations
function dmopress_starter_register_plugins() {
	global $theme_name;

	$plugins = array(

		array(
			'name'               => 'DMOPress', // The plugin name.
			'slug'               => 'dmopress', // The plugin slug (typically the folder name).
			'source'             => 'https://www.dmopress.com/download/dmopress.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

	);

	$theme_text_domain = $theme_name;

	$config = array(
		'id'           => $theme_name,
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
		
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'dmopress_starter_register_plugins' );

//Load CSS
function dmopress_starter_enqueue_css() {
	wp_enqueue_style('bootstrap-core', get_template_directory_uri().'/css/bootstrap.css', false);
	wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/css/bootstrap-theme.css', false);
	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/2a31214d87.js');
	wp_enqueue_style('dmopress-starter-theme-css', get_template_directory_uri().'/css/dmopress-starter-theme.css', false);
}
add_action('wp_enqueue_scripts', 'dmopress_starter_enqueue_css');

//Load Javascript
function dmopress_starter_enqueue_js() { 
	wp_enqueue_script('jquery');
	wp_enqueue_script('dmopress-starter-theme-js', get_template_directory_uri().'/js/dmopress-starter-theme.js', false);
}
add_action('wp_enqueue_scripts', 'dmopress_starter_enqueue_js');

