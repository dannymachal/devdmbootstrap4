<?php
/**
 * devdmbootstrap_Customize
 * Our main class for working with the WordPress Customizer
 */
if (!class_exists('devdmbootstrap_Customize')) {

    add_action('customize_register', array('devdmbootstrap_Customize', 'register'));

    class devdmbootstrap_Customize
    {

        public static function register($wp_customize)
        {

            $wp_customize->add_section('devdmbootstrap_options',
                array(
                    'title' => __('DevDmBootstrap4 Options', 'devdmbootstrap4'),
                    'priority' => 35,
                    'capability' => 'edit_theme_options',
                    'description' => __('Customize DevDmBootstrap4 Specific Theme Options.', 'devdmbootstrap4')
                )
            );

            // Show the Header
            $wp_customize->add_setting('devdmbootstrap4_show_header_setting',
                array(
                    'default' => 1,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array('devdmbootstrap_Customize', 'devdmbootstrap_sanitize_checkbox')
                )
            );

            $wp_customize->add_control('devdmbootstrap4_show_header',
                array(
                    'label' => __('Show the Header?', 'devdmbootstrap4'),
                    'section' => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_show_header_setting',
                    'description' => __( 'Toggle showing the header content area containing the logo, title and tagline.', 'devdmbootstrap4' ),
                    'type' => 'checkbox'
                )
            );

            // Right Side Bar Size
            $wp_customize->add_setting('devdmbootstrap4_rightsidebar',
                array(
                    'default' => 3,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array('devdmbootstrap_Customize', 'devdmbootstrap_sanitize_select')
                )
            );

            $wp_customize->add_control('devdmbootstrap4_rightsidebar',
                array(
                    'label' => __('Right Sidebar Size', 'devdmbootstrap4'),
                    'section' => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_rightsidebar',
                    'description' => __( 'The col-md-* size of the right sidebar.', 'devdmbootstrap4' ),
                    'type' => 'select',
                    'choices' => array(
                        '0' => '0 - ' . __('Hidden', 'devdmbootstrap4'),
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'
                    )

                )
            );

            // Left Side Bar Size
            $wp_customize->add_setting('devdmbootstrap4_leftsidebar',
                array(
                    'default' => 0,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array('devdmbootstrap_Customize', 'devdmbootstrap_sanitize_select')
                )
            );

            $wp_customize->add_control('devdmbootstrap4_leftsidebar',
                array(
                    'label' => __('Left Sidebar Size', 'devdmbootstrap4'),
                    'section' => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_leftsidebar',
                    'description' => __( 'The col-md-* size of the left sidebar.', 'devdmbootstrap4' ),
                    'type' => 'select',
                    'choices' => array(
                        '0' => '0 - ' . __('Hidden', 'devdmbootstrap4'),
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'
                    )

                )
            );

            // Use Font Awesome?
            $wp_customize->add_setting('devdmbootstrap4_fontawesome_setting',
                array(
                    'default' => 1,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array('devdmbootstrap_Customize', 'devdmbootstrap_sanitize_checkbox')
                )
            );

            $wp_customize->add_control('devdmbootstrap4_fontawesome',
                array(
                    'label' => __('Load the Font Awesome Free Icon Library?', 'devdmbootstrap4'),
                    'section' => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_fontawesome_setting',
                    'description' => __( 'Enqueue Font Awesome Icon Set (v5.0.2).', 'devdmbootstrap4' ),
                    'type' => 'checkbox'
                )
            );

            // Enable Enhanced Menu?
            $wp_customize->add_setting('devdmbootstrap4_enhanced_menu_setting',
                array(
                    'default' => 1,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array('devdmbootstrap_Customize', 'devdmbootstrap_sanitize_checkbox')
                )
            );

            $wp_customize->add_control('devdmbootstrap4_enhanced_menu',
                array(
                    'label' => __('Use the Enhanced menu system?', 'devdmbootstrap4'),
                    'section' => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_enhanced_menu_setting',
                    'description' => __( 'Enable hover for desktop browsers and icon classes for menu items using the menu item meta description field. See the theme website documentation for full details.', 'devdmbootstrap4' ),
                    'type' => 'checkbox'
                )
            );

            // Give Danny his Credit?
            $wp_customize->add_setting('devdmbootstrap4_show_credit_setting',
                array(
                    'default' => 1,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array('devdmbootstrap_Customize', 'devdmbootstrap_sanitize_checkbox')
                )
            );

            $wp_customize->add_control('devdmbootstrap4_show_credit',
                array(
                    'label' => __('Show Danny some love in the footer?', 'devdmbootstrap4'),
                    'section' => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_show_credit_setting',
                    'description' => __( 'Show Created By in the Footer.', 'devdmbootstrap4' ),
                    'type' => 'checkbox'
                )
            );

            $wp_customize->get_setting('blogname')->transport = 'refresh';
            $wp_customize->get_setting('blogdescription')->transport = 'refresh';

        }

        public static function devdmbootstrap_sanitize_checkbox($value)
        {
            return ($value == 1 ? $value : '');
        }

        public static function devdmbootstrap_sanitize_select($input, $setting)
        {
            $input = sanitize_key($input);
            $control = $setting->manager->get_control($setting->id);
            $choices = $control->choices;

            return (array_key_exists($input, $choices) ? $input : $setting->default);
        }

    }
}

/**
 * devdmbootstrap_customizer_js
 * Hook in our Live Preview jQuery file for customizer controls
 */
add_action( 'customize_preview_init', 'devdmbootstrap_customizer_js' );

if (!function_exists( 'devdmbootstrap_customizer_js' ) ) {
    function devdmbootstrap_customizer_js() {
        wp_enqueue_script(
            'devdmbootstrap_customizer_js',
            get_template_directory_uri() . '/assets/js/customizer.js',
            array( 'jquery','customize-preview' ),
            '',
            true
        );
    }
}





