<?php

class devdmbootstrap_Customize {

    public function register ( $wp_customize ) {

        $wp_customize->add_section( 'devdmbootstrap_options',
            array(
                'title' => __( 'DevDmBootstrap4 Options', 'devdmbootstrap4' ),
                'priority' => 35,
                'capability' => 'edit_theme_options',
                'description' => __('Customize DevDmBootstrap4 Specific Theme Options.', 'devdmbootstrap4' ),
            )
        );

        $wp_customize->add_setting( 'link_textcolor',
            array(
                'default' => '#2BA6CB',
                'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            )
        );

        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    }
}

add_action( 'customize_register' , array( 'devdmbootstrap_Customize' , 'register' ) );
