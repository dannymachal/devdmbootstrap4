<?php

if (!class_exists('devdmbootstrap_nav_walker')) {

    class devdmbootstrap_nav_walker extends Walker_Nav_Menu {

        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<div class=\"dropdown-menu\" aria-labelledby=\"Preview\">\n";
        }

        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</div>\n";

        }

        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'nav-item menu-item-' . $item->ID;

            if ($this->has_children) {
                $classes[] = 'dropdown';
            }

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            if (!$item->menu_item_parent) {
                $output .= $indent . '<li' . $id . $class_names .'>' . PHP_EOL;
            }

            $atts = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
            $atts['class'] = 'nav-link';

            if ($this->has_children) {
                $atts['class'] = 'nav-link dropdown-toggle';
                $atts['data-toggle'] = "dropdown";
                $atts['role'] = "button";
                $atts['aria-haspopup'] = "true";
                $atts['aria-expanded'] = "false";
            }

            if ($item->menu_item_parent) {
                $atts['class'] = 'dropdown-item';
            }

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            /** This filter is documented in wp-includes/post-template.php */
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>' . PHP_EOL;
            $item_output .= $args->after;


            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
            if (!$item->menu_item_parent) {
                $output .= "</li>\n";
            }
        }

    }

}