<?php
/**
 * Registers the menus
 * 
 * @package Atsuya
 */
namespace ATSUYA_THEME\Inc;
use ATSUYA_THEME\Inc\Traits\singleton;

/**
 * Summary of Menus
 */
class Menus{
    use singleton;

    protected function __construct() {

        $this->setup_hooks();
    }

    /**
     * Summary of setup_hooks
     * @return void
     */
    protected function setup_hooks() {
        add_action("init", [ $this, "register_menus"] );

    }

    /**
     * Summary of register_menus
     * @return void
     */
    public function register_menus() {
        register_nav_menus( [ 
            "atsuya_header_menu"=> esc_html__("Header Menu","atsuya"),
            "atsuya_footer_menu"=> esc_html__("Footer Menu" ,"atsuya"),
        ]);
    }

    public function get_menu_id( $location ) {
        // Get all the locations
        $locations = get_nav_menu_locations(); 
    
        // Get menu id by location
        $menu_id = $locations[$location];
    
        return ! empty( $menu_id ) ? $menu_id : '';
    }

    public function get_child_menu_items( $menu_array, $parent_id ) {
        $child_menus = [];

        if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {
            foreach ( $menu_array as $menu ) {
                if ( intval( $menu->menu_item_parent ) === $parent_id ) {
                    array_push( $child_menus, $menu );
                }
        }
        return $child_menus;
    }
}
}