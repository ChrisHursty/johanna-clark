<?php

/**
 * Landing Page CPT
 *
 * @package JCH WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$post_id = get_the_ID();
$featured_image_url = get_the_post_thumbnail_url($post_id, 'full');
?>
<!-- LP HERO -->
<section class="container-fw lp-hero light-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-7 lp-hero-content align-left">
                <h1>Johanna Clark Hair | Expert Balayage and Hair Services Near <?php the_field('location_name'); ?> in Brookhaven</h1>
                <div class="lp-hero-text">
                    <?php echo wp_kses_post(get_field('additional_details')); ?>
                </div>
                <div class="button-box">
                    <a href="<?php the_field('sign_up_url'); ?>" target="_blank" class="jch-btn">
                        <span>Book An Appointment<i style="margin-left: 6px;" class="fas fa-external-link-alt"></i></span>
                    </a>
                </div>
            </div>

            <div class="col-md-5 lp-hero-image align-right">
                <?php 
                $hero_video = get_field('lp_video', 'option'); 
                if ($hero_video) {
                    $video_url = esc_url($hero_video['url']);
                    echo '<video class="lp-hero-video" autoplay muted loop playsinline>
                            <source src="' . $video_url . '" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>';
                } else {
                    echo '<p>Video not available.</p>'; // Optional message if the video is missing
                }
                ?>
            </div>
        </div><!-- .row -->
    </div>
</section>

<!-- About Section -->
<section class="container about-section">
    <div class="row">
        <div class="col-sm-12 col-md-6 align-left image">
            <?php 
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail(get_the_ID(), 'full', ['alt' => get_the_title()]);
            } else {
                echo '<p>No featured image available.</p>';
            }
            ?>
        </div>
        <div class="col-sm-12 col-md-6 align-right content">
            <?php echo apply_filters('the_content', get_field('lp_intro', 'option')); ?>
            <a href="<?php the_field('sign_up_url'); ?>" target="_blank" class="jch-btn white-btn">
                <span>Book An Appointment<i style="margin-left: 6px;" class="fas fa-external-link-alt"></i></span>
            </a>
        </div>
    </div>
</section>

<!-- Services -->
<section class="container-fw services-container dark-bg">
    <div class="container">
        <div class="align-center">
            <h2>Services</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $home_page_id = 5;
            $services = get_field('services', $home_page_id);

            if (is_array($services)) {
                foreach ($services as $service) {
                    echo '<div class="service-item"><div class="service-content">';
                    if (!empty($service['title'])) {
                        echo '<h2 class="service-title">' . esc_html($service['title']) . '</h2>';
                    }
                    if (!empty($service['description'])) {
                        echo '<p class="service-description">' . esc_html($service['description']) . '</p>';
                    }
                    echo '</div></div>';
                }
            } else {
                echo 'No services available.';
            }
            ?>
        </div>
        <a class="jch-btn align-center white-btn" href="/services"><span>View All Of Our Services</span></a>
    </div>
</section>

<!-- LP Gallery Slider -->
<section class="container-fw gallery-bg">
    <?php
    $images = get_field('lp_gallery', 'option');
    if ($images) : ?>
        <div class="owl-carousel hp-slider owl-theme lp-gallery-carousel">
            <?php foreach ($images as $image) : ?>
                <div class="item">
                    <img src="<?php echo wp_get_attachment_image_url($image['id'], 'lp-gallery-img'); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>No gallery images found.</p>
    <?php endif; ?>
</section>

<!-- Testimonials Section -->
<?php if (have_rows('testimonials', 'option')): ?>
    <div class="container-fw testimonials">
        <div class="container">
            <div class="row">
            <?php while (have_rows('testimonials', 'option')): the_row(); ?>
                <div class="col-sm-12 col-md-4 text-center single-testi">
                    <h2><?php echo esc_html(get_sub_field('testimonial_heading')); ?></h2>
                    <blockquote>
                        <p><?php echo esc_html(get_sub_field('testimonial_text')); ?></p>
                    </blockquote>
                    <h4><?php echo esc_html(get_sub_field('name')); ?></h4>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<section class="cta">
    <?php get_template_part('template-parts/call-to-action'); ?>
</section>
<?php
// Ensure ACF is active
if( function_exists('have_rows') && have_rows('mobile_buttons', 'option') ):

    while( have_rows('mobile_buttons', 'option') ): the_row();

    $button_one_text = get_sub_field('button_one_text', 'option');
    $button_one_url = get_sub_field('button_one_url', 'option');
    $button_one_icon = get_sub_field('button_one_icon', 'option');
    $button_one_bg_color = get_sub_field('button_one_bg_color', 'option');
    $button_one_text_color = get_sub_field('button_one_text_color', 'option');

    $button_two_text = get_sub_field('button_two_text', 'option');
    $button_two_url = get_sub_field('button_two_url', 'option');
    $button_two_icon = get_sub_field('button_two_icon', 'option');
    $button_two_bg_color = get_sub_field('button_two_bg_color', 'option');
    $button_two_text_color = get_sub_field('button_two_text_color', 'option');

    ?>

    <div class="mobile-buttons">
        <a href="<?php echo esc_url($button_one_url); ?>" class="mobile-button" style="background-color: <?php echo esc_attr($button_one_bg_color); ?>; color: <?php echo esc_attr($button_one_text_color); ?>;">
            <?php echo esc_html($button_one_text); ?><i class="fas <?php echo esc_attr($button_one_icon); ?>" aria-label="Free Class" aria-hidden="true"></i>
        </a>
        <?php if ($button_two_text && $button_two_url): ?>
            <a href="<?php echo esc_url($button_two_url); ?>" class="mobile-button" style="background-color: <?php echo esc_attr($button_two_bg_color); ?>; color: <?php echo esc_attr($button_two_text_color); ?>;">
                <?php echo esc_html($button_two_text); ?><i class="fas <?php echo esc_attr($button_two_icon); ?>" aria-label="Register for Events" aria-hidden="true"></i>
            </a>
        <?php endif; ?>
    </div>

<?php endwhile; endif; ?>

<?php get_footer();
