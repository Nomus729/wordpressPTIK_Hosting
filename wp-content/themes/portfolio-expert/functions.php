<?php

/**
 * Portfolio Expert functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Portfolio Expert
 */


if (!defined('PORTFOLIO_EXPERT_VERSION')) {
	$portfolio_expert_theme = wp_get_theme();
	define('PORTFOLIO_EXPERT_VERSION', $portfolio_expert_theme->get('Version'));
}

if (!function_exists('portfolio_expert_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function portfolio_expert_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Portfolio Expert, use a find and replace
		 * to change 'portfolio-expert' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('portfolio-expert', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__('Main Menu', 'portfolio-expert'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'portfolio_expert_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');
		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');
		add_theme_support("responsive-embeds");

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_editor_style(array(portfolio_expert_fonts_url()));
	}
endif;
add_action('after_setup_theme', 'portfolio_expert_setup');



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolio_expert_content_width()
{
	$GLOBALS['content_width'] = apply_filters('portfolio_expert_content_width', 1170);
}
add_action('after_setup_theme', 'portfolio_expert_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portfolio_expert_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'portfolio-expert'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'portfolio-expert'),
			'before_widget' => '<section id="%1$s" class="widget mb-4 p-3 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'portfolio_expert_widgets_init');

/**
 * Register custom fonts.
 */
function portfolio_expert_fonts_url()
{
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Poppins:400,400i,700,700i';
	$font_families[] = 'montserrat:400,400i,700,700i';

	$query_args = array(
		'family' => urlencode(implode('|', $font_families)),
		'subset' => urlencode('latin,latin-ext'),
	);

	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');


	return esc_url_raw($fonts_url);
}


/**
 * Enqueue scripts and styles.
 */
function portfolio_expert_scripts()
{
	wp_enqueue_style('portfolio-expert-google-font', portfolio_expert_fonts_url(), array(), null);
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.2.2', 'all');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.css', array(), '5.15.3');
	wp_enqueue_style('portfolio-expert-default-style', get_template_directory_uri() . '/assets/css/default-style.css', array(), PORTFOLIO_EXPERT_VERSION);
	wp_enqueue_style('portfolio-expert-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), PORTFOLIO_EXPERT_VERSION);
	wp_enqueue_style('portfolio-expert-style', get_stylesheet_uri(), array(), PORTFOLIO_EXPERT_VERSION);
	wp_enqueue_style('portfolio-expert-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), PORTFOLIO_EXPERT_VERSION);

	wp_enqueue_script('masonry');
	wp_enqueue_script('portfolio-expert-mobile-menu', get_template_directory_uri() . '/assets/js/mobile-menu.js', array(), PORTFOLIO_EXPERT_VERSION, true);
	wp_enqueue_script('portfolio-expert-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), PORTFOLIO_EXPERT_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'portfolio_expert_scripts');

function portfolio_expert_gb_block_style()
{
	wp_enqueue_style('portfolio-expert-admin-google-font', portfolio_expert_fonts_url(), array(), null);
}
add_action('enqueue_block_assets', 'portfolio_expert_gb_block_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load all actions file
require get_template_directory() . '/actions/header-actions.php';
require get_template_directory() . '/actions/home-intro.php';

/*
* Customizer pro info .
*/
require get_template_directory() . '/inc/info/class-customize.php';

if (is_admin()) {
	require_once trailingslashit(get_template_directory()) . 'inc/about/about.php';
}


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
add_filter('excerpt_more', '__return_empty_string', 999);
function portfolio_expert_excerpt_length($length)
{
	if (is_admin()) {
		return $length;
	}
	return 20;
}
add_filter('excerpt_length', 'portfolio_expert_excerpt_length', 999);

/**
 * Add tem plugin activation
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/recomended-plugin.php';
