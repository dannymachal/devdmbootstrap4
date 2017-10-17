<?php
/**
 * Welcome to DevDmBootstrap4 a simple to use barebones theme for WordPress theme developers wishing to use the Twitter
 * Bootstrap 4.x frontend framework.
 */

/**
 * Setup the theme defaults.
 */

if ( ! function_exists( 'devdmbootstrap_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function devdmbootstrap_setup()
    {

        // Load up the Text domain.
        load_theme_textdomain('devdmbootstrap4', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Add Theme Support for Custom Background Images and Colors
        add_theme_support( 'custom-background' );

        // Add Theme Support for Customize Selective Refresh Widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add Editor stylesheet.
        add_editor_style(get_template_directory_uri() . '/assets/css/devdmbootstrap/editor-style.css');

        // Add Theme Support for Custom Header (logo) image
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

        /**
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1140, 300, array('center','center'));

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'main_menu' => esc_html__('Main Menu', 'devdmbootstrap4'),
            'footer_menu' => esc_html__('Footer Menu', 'devdmbootstrap4'),
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

        // Set the max content width
        if ( ! isset( $content_width ) ) {
            $content_width = 1140;
        }

    }

}
add_action( 'after_setup_theme', 'devdmbootstrap_setup' );

/**
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

}
add_action( 'widgets_init', 'devdmbootstrap_widgets_init' );

/**
 * Include the Bootstrap 4.x Stylesheet and JS
 */
if ( ! function_exists( 'devdmbootstrap_scripts' ) ) {

    function devdmbootstrap_scripts()
    {
        $wpTheme = wp_get_theme();

        // Loading a new core version of jQuery for Bootstrap 4
        wp_deregister_script( 'jquery-core' );
        wp_register_script( 'jquery-core', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );
        wp_deregister_script( 'jquery-migrate' );
        wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.0.0.min.js", array(), '3.0.0' );


        // Enqueue the default Bootstrap 4.x CSS with the name devdmbootstrap4-css
        wp_enqueue_style('devdmbootstrap4-css', get_template_directory_uri() . '/assets/css/devdmbootstrap/devdmbootstrap4.css');

        // Enqueue the default style.css with the name devdmbootstrap4-stylesheet
        wp_enqueue_style('devdmbootstrap4-stylesheet', get_stylesheet_uri());

        // Grab the Theme Mod Setting for Font Awesome.
        $loadFontAwesome = get_theme_mod('devdmbootstrap4_fontawesome_setting',1);

        if ($loadFontAwesome == 1) {
            // Enqueue Font Awesome Icon Set with the name devdmbootstrap4-fontawesome.
            wp_enqueue_style('devdmbootstrap4-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        }

        // Enqueue popper.min.js with the name devdmbootstrap4-popper-js
        wp_enqueue_script('devdmbootstrap4-popper-js', get_template_directory_uri() . '/assets/js/bootstrap4x/popper.min.js', array('jquery'), $wpTheme->get( 'Version' ), true);

        // Enqueue the default Bootstrap 4.x JS with the name devdmbootstrap4-js.
        wp_enqueue_script('devdmbootstrap4-js', get_template_directory_uri() . '/assets/js/bootstrap4x/bootstrap.js', array('jquery'), $wpTheme->get( 'Version' ), true);
    }
}
add_action( 'wp_enqueue_scripts', 'devdmbootstrap_scripts' );

/**
 * Customizer
 */
require get_template_directory() . '/includes/customizer.php';

/**
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

// Grab the Theme Mod Setting for Enabling the Enhanced Menu Walker.
$loadEnhancedMenu = get_theme_mod('devdmbootstrap4_enhanced_menu_setting', 1);

if ($loadEnhancedMenu == 1) {

    function devdmbootstrap_fontawesome_enqueue() {
        $wpTheme = wp_get_theme();

        // Enqueue the Enhanced Menu System JS with the handle devdmbootstrap4-enhanced-menu-js
        wp_enqueue_script('devdmbootstrap4-enhanced-nav-js', get_template_directory_uri() . '/assets/js/devdmbootstrap4_enhanced_nav.js', array('jquery'), $wpTheme->get( 'Version' ), true);
    }

    add_action('wp_enqueue_scripts','devdmbootstrap_fontawesome_enqueue');

    require get_template_directory() . '/includes/devdmbootstrap_enhanced_nav_walker.php';
}


/**
 * Utilities
 */
require get_template_directory() . '/includes/utilities.php';
