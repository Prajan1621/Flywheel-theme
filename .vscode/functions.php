<?php
use ATSUYA_THEME\Inc\ATSUYA_THEME;
/**
 * Theme functions
 * 
 * @package Atsuya
 */

 if (!defined('ATSUYA_DIR_PATH')) { 
    define('ATSUYA_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('ATSUYA_DIR_URI')) {
    define('ATSUYA_DIR_URI', untrailingslashit(get_template_directory_uri()));
}



require_once ATSUYA_DIR_PATH . '/inc/helpers/autoloader.php';

/**
 * Summary of atsuya_get_theme_instance
 * @return void
 */
function atsuya_get_theme_instance() {
    ATSUYA_THEME::get_instance();
}   
atsuya_get_theme_instance();

 function atsuya_enqueue_scripts() { 
    
    
    

    
}


