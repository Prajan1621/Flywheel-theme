<?php
/**
 * Template Name: Contact Page
 * 
 * @package Atsuya
 */

get_header(); ?>

<div class="contact-page">
    <!-- Navigation -->
    <?php get_template_part('template-parts/header/nav'); ?>

    <!-- Hero Image Section -->
    <div class="contact-hero-image">
    <?php if (has_post_thumbnail()) : ?>
        <div class="hero-image-content">
            <?php the_post_thumbnail('full'); ?>
            <div class="hero-text">
                <span>Contact</span>
                <p><a href="#">Home</a> / Contact</p>
            </div>
        </div>
    <?php endif; ?>
</div>
    <!-- Contact Details and Form Section -->
    <div class="contact-details-form">
        <div class="contact-address">
            <h4><mark>Contact Us</mark></h4>
            <p>We help navigate your journey to a sustainable business.</p>
            <h4><mark>Corporate office</mark></h4>
            <?php
            // Output the dynamic office address using a custom field
            if (function_exists('get_field')) {
                $address = get_field('office_address');
                echo $address ? wp_kses_post($address) : '<p>No address provided.</p>';
            }
            ?>
            <h4><mark>Technical Support</mark></h4>
            <p>For technical support, please send mail to
            support@atsuyatech.com</p>
        </div>

        <div class="contact-form">
            <?php
            // Output the contact form using a shortcode
            if (function_exists('get_field')) {
                $form_shortcode = get_field('contact_form_shortcode');
                echo $form_shortcode ? do_shortcode($form_shortcode) : '<p>No contact form available.</p>';
            }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
