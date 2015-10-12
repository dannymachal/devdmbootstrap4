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
$textDomain = "devdmbootstrap4";

/*
 * Setup the theme defaults
 */

if ( ! function_exists( 'devdmbootstrap_setup' ) ) {

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function devdmbootstrap_setup()
    {

        global $textDomain;

        load_theme_textdomain($textDomain, get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 0, true);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => esc_html__('Header Menu', $textDomain),
            'secondary' => esc_html__('Footer Menu', $textDomain),
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

    }

} //end devdmbootstrap_setup
add_action( 'after_setup_theme', 'devdmbootstrap_setup' );


/*
 * Include the Bootstrap Stylesheet and JS
 */

if ( ! function_exists( 'devdmbootstrap_scripts' ) ) {

    function devdmbootstrap_scripts()
    {
        global $textDomain;
        global $themeVersion;

        //enqueue the default Bootstrap 4 CSS with the handle $textDomain(devdmbootstrap4)css
        wp_enqueue_style($textDomain . 'css', get_template_directory_uri() . '/assets/bootstrap4/css/bootstrap.min.css');

        //enqueue the default style.css with the handle $textDomain(devdmbootstrap4)stylesheet
        wp_enqueue_style($textDomain . 'stylesheet', get_stylesheet_uri());

        //eqnueue the default Bootstrap 4 JS with the handle $textDomain(devdmbootstrap4)js
        wp_enqueue_script($textDomain . 'js', get_template_directory_uri() . '/assets/bootstrap4/js/bootstrap.min.js', array('jquery'), $themeVersion, true);

    }
}// end devdmbootstrap_scripts
add_action( 'wp_enqueue_scripts', 'devdmbootstrap_scripts' );



