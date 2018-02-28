<?php
/**
 * Live_Gray functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Live_Gray
 */

if (!function_exists('live_gray_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function live_gray_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Live_Gray, use a find and replace
         * to change 'live-gray' to the name of your theme in all the template files.
         */
        load_theme_textdomain('live-gray', get_template_directory() . '/languages');

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
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'live-gray'),
            'menu-2' => esc_html__('Footer menu', 'live-gray'),
        ));

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
        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 966 );

        add_editor_style(array('css/editor-style.css', live_gray_fonts_url()));
    }
endif;
add_action('after_setup_theme', 'live_gray_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function live_gray_content_width()
{
    $GLOBALS['content_width'] = apply_filters('live_gray_content_width', 1050);
}

add_action('after_setup_theme', 'live_gray_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function live_gray_scripts()
{

    wp_enqueue_style('live-gray-fonts', live_gray_fonts_url(), array(), null);
    wp_enqueue_style('live-gray-style', get_stylesheet_uri());
    wp_enqueue_script('live-gray-main', get_template_directory_uri() . '/js/all.js', array(), '1.0.0', true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'live_gray_scripts');


if (!function_exists('live_gray_fonts_url')) :
    /**
     * Register Google fonts for Live_Gray.
     *
     * Create your own avior_fonts_url() function to override in a child theme.
     *
     * @since Live_Gray 1.0.0
     *
     * @return string Google fonts URL for the theme.
     */
    function live_gray_fonts_url()
    {
        $fonts_url = '';
        $font_families = array();

        /**
         * Translators: If there are characters in your language that are not
         * supported by Source Sans Pro, translate this to 'off'. Do not translate
         * into your own language.
         */
        $open_sans_display = esc_html_x('on', 'Open Sans  font: on or off', 'live-gray');
        if ('off' !== $open_sans_display) {
            $font_families[] = 'Open+Sans:400,400i,600,600i,700,700i';
        }
        if ($font_families) {
            $query_args = array(
                'family' => implode('%7C', $font_families),
                'subset' => urlencode('latin,latin-ext'),
            );
            if ($font_families) {
                $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
            }
        }

        return esc_url_raw($fonts_url);
    }
endif;


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add filter.  Add custom class for items menu "menu-1".
 */
add_filter('nav_menu_link_attributes', 'live_gray_menu_add_class', 10, 3);

function live_gray_menu_add_class($atts, $item, $args)
{
    if ($args->theme_location === "menu-1") {
        $class = ' button hollow small';
        $atts['class'] = $class;
    }
    if ($args->theme_location === "menu-2") {
        $class =  ' button hollow small dark';
        $atts['class'] = $class;
    }
    return $atts;
}
