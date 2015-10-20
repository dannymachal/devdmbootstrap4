<?php
/*
 * Welcome to DevDmBootstrap4 a simple to use barebones theme for WordPress theme developers wishing to use the Twitter Bootstrap 4 frontend framework.
 *
 * Current Bootstrap Version: 4.0 Alpha
 *
 */

/*
 * Global Variables
 */
$themeVersion = "1.0";

/*
 * Setup the theme defaults
 */

if ( ! function_exists( 'devdmbootstrap_setup' ) ) {

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function devdmbootstrap_setup()
    {

        load_theme_textdomain('devdmbootstrap4', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');

        /*
         * Add Theme Support for Custom Background Images and Colors
         */
        add_theme_support( 'custom-background' );

        /*
         * Add Theme Support for Custom Header (logo) image
         */
        add_theme_support( 'custom-header', array(
            'default-image'          => 'http://placehold.it/350x150',
            'random-default'         => false,
            'width'                  => 350,
            'height'                 => 150,
            'flex-height'            => true,
            'flex-width'             => true,
            'default-text-color'     => '',
            'header-text'            => false,
            'uploads'                => true,
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        ));

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1140, 300, array('center','center'));

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'headermenu' => esc_html__('Header Menu', 'devdmbootstrap4'),
            'footermenu' => esc_html__('Footer Menu', 'devdmbootstrap4'),
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
         * Set the max content width
         */
        if ( ! isset( $content_width ) ) {
            $content_width = 1140;
        }

    }

} //end devdmbootstrap_setup
add_action( 'after_setup_theme', 'devdmbootstrap_setup' );


/*
 * Register left and right Sidebar
 */
if ( ! function_exists( 'devdmbootstrap_widgets_init' ) ) {

    function devdmbootstrap_widgets_init()
    {

        register_sidebar(array(
            'name' => __('Right Sidebar', 'devdmbootstrap4'),
            'id' => 'dmbs-right-sidebar',
            'description' => __('Widgets in this area will be shown on all posts and pages.', 'devdmbootstrap4'),
            'before_widget' => '<li id="%1$s" class="widget dmbs-widget dmbs-widget-right %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle dmbs-widget-title dmbs-widget-right-title">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => __('Left Sidebar', 'devdmbootstrap4'),
            'id' => 'dmbs-left-sidebar',
            'description' => __('Widgets in this area will be shown on all posts and pages.', 'devdmbootstrap4'),
            'before_widget' => '<li id="%1$s" class="widget dmbs-widget dmbs-widget-left %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle dmbs-widget-title dmbs-widget-left-title">',
            'after_title' => '</h2>',
        ));
    }

}//end devdmbootstrap_widgets_init
add_action( 'widgets_init', 'devdmbootstrap_widgets_init' );

/*
 * Include the Bootstrap Stylesheet and JS
 */

if ( ! function_exists( 'devdmbootstrap_scripts' ) ) {

    function devdmbootstrap_scripts()
    {

        global $themeVersion;

        //enqueue the default Bootstrap 4 CSS with the handle devdmbootstrap4-css
        wp_enqueue_style('devdmbootstrap4-css', get_template_directory_uri() . '/assets/bootstrap4/css/bootstrap.min.css');

        //enqueue the default style.css with the handle devdmbootstrap4-stylesheet
        wp_enqueue_style('devdmbootstrap4-stylesheet', get_stylesheet_uri());

        //enqueue the default WordPress Core CSS with the handle devdmbootstrap4-wordpresscore-css
        wp_enqueue_style('devdmbootstrap4-wordpresscore-css', get_template_directory_uri() . '/assets/css/wordpresscore.css');

        //grab the Theme Mod Setting for Font Awesome
        $loadFontAwesome = get_theme_mod('devdmbootstrap4_fontawesome_setting',1);

        if ($loadFontAwesome == 1) {
            //enqueue Font Awesome Icon Set with the handle devdmbootstrap4-fontawesome
            wp_enqueue_style('devdmbootstrap4-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
        }

        //enqueue the default Bootstrap 4 JS with the handle devdmbootstrap4-js
        wp_enqueue_script('devdmbootstrap4-js', get_template_directory_uri() . '/assets/bootstrap4/js/bootstrap.min.js', array('jquery'), $themeVersion, true);

    }
}// end devdmbootstrap_scripts
add_action( 'wp_enqueue_scripts', 'devdmbootstrap_scripts' );

/**
 * Customizer
 */
require get_template_directory() . '/includes/customizer.php';

/*
 * Calculate Column Sizes and return the value when called
 */
function devdmbootstrap_column_size($column = null) {

    $columnSizes = array(
        'left'  => '',
        'right' => '',
        'main'  => '',
    );

    if ($column != null && array_key_exists($column,$columnSizes)) {

        $columnSizes = array(
            'left' => get_theme_mod('devdmbootstrap4_leftsidebar_setting',0),
            'right' => get_theme_mod('devdmbootstrap4_rightsidebar_setting',3),
        );

        $columnSizes['main'] = 12 - ($columnSizes['right'] + $columnSizes['left']);

        return $columnSizes[$column];

    }

    return;
}

/**
 * Nav Walker
 */
require get_template_directory() . '/includes/devdmbootstrap_nav_walker.php';

//grab the Theme Mod Setting for Font Awesome
$loadEnhancedMenu = get_theme_mod('devdmbootstrap4_enhanced_menu_setting',1);

if ($loadEnhancedMenu == 1) {

    //enqueue Enhanced Menu System CSS with the handle devdmbootstrap4-enhanced-menu-css
    wp_enqueue_style('devdmbootstrap4-enhanced-menu-css', get_template_directory_uri() . '/assets/css/devdmbootstrap4_enhanced_nav.css');

    //enqueue the Enhanced Menu System JS with the handle devdmbootstrap4-enhanced-menu-js
    wp_enqueue_script('devdmbootstrap4-enhanced-menu-js', get_template_directory_uri() . '/assets/js/devdmbootstrap4_enhanced_nav.js', array('jquery'), $themeVersion, true);

    require get_template_directory() . '/includes/devdmbootstrap_enhanced_nav_walker.php';
}



/**
 * Nav Walker
 */
require get_template_directory() . '/includes/utilities.php';
