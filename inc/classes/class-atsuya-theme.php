<?php
/**
 * Bootstraps the theme
 * 
 * @package Atsuya
 */


 namespace ATSUYA_THEME\Inc;

 use ATSUYA_THEME\Inc\assets;
 use ATSUYA_THEME\Inc\Traits\singleton ;
 

 /**
  * Summary of ATSUYA_THEME
  */
 class ATSUYA_THEME {
     use singleton;

    protected function __construct() {

        //load the classes here

        Assets::get_instance();
        Menus::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         */
        add_action("after_setup_theme", [ $this, "setup_theme"] );


    }

    public function setup_theme() {
        add_theme_support("title-tag") ;

        // add_theme_support("custom-logo" , [
        //     'header-text' => ['site-title', 'site-description'],
        //     //'height'=> 150,
        //     //'width'=> 300,
        //     'flex-height' => true,
        //     'flex-width' => true,
        // ]) ;

        add_theme_support('custom-background' , [ 
            'default-color'=> '#fff',
            'default-image'=> '',
            'default-repeat'=> 'no-repeat',
        ]) ;

        add_theme_support('post-thumbnails');

        set_post_thumbnail_size(1200, 600, true);

        add_image_size('custom-size', 800, 400, true); 
    }

 }