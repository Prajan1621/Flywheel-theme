<?php
/**
 * Theme header
 * 
 * @package Atsuya
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset '); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atsuya Technology</title>
    <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?> >
    <?php
    if ( function_exists('wp_body_open') ) {
        wp_body_open();
    }
    ?>

    <div class="head" id="page">
        <header class="hhead"  role="banner">
            <?php get_template_part('template-parts/header/nav'); ?>
        </header>
    </div>
