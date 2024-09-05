<?php

/**
 * Template Name: Home Page
 *
 * @package JCH WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>

<section class="container-fw home-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-7 hero-content">
                <h1><?php echo wp_kses_post(get_field('hero_heading')); ?></h1>
                <h2 class="intro">
                    <?php echo wp_kses_post(get_field('hero_intro')); ?>
                </h2>
                <div class="button-box">
                    <?php
                    if (get_field('button_link') && get_field('button_text')) {
                        $button_link = esc_url(get_field('button_link'));
                        $button_text = esc_html(get_field('button_text'));
                        echo '<a href="' . $button_link . '" class="jch-btn"><span>' . $button_text . '</span></a>';
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-5 hero-image">
                <?php 
                // Get the file array from ACF
                $hero_video = get_field('hero_video'); 
                if ($hero_video) {
                    // Get the URL of the video from the array
                    $video_url = esc_url($hero_video['url']);
                    echo '<video class="hero-video" autoplay muted loop playsinline>
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
<!-- About -->
<section class="container-fw home-about dark-bg">
    <div class="container">
        <div class="align-center">
            <h2>About</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 align-center">
                <?php 
                $about_content = get_field('about'); 
                if( $about_content ):
                    echo wp_kses_post($about_content); 
                endif; 
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Services -->
<section class="container-fw services-container light-bg">
    <div class="container">
        <div class="align-center">
            <h2>Services</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if (have_rows('services')) : ?>
                <?php while (have_rows('services')) : the_row();
                    // Your sub fields go here
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                ?>
                    <div class="service-item" style="background-image: url('<?php echo esc_url($icon); ?>');">
                        <div class="service-content">
                            <h2 class="service-title"><?php echo esc_html($title); ?></h2>
                            <p class="service-description"><?php echo esc_html($description); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <a class="jch-btn align-center" href="/services"><span>View All Of Our Services</span></a>
    </div>
</section>
<!-- Testimonial Slider -->
<section class="testimonials">
    <?php get_template_part('template-parts/testimonial-slider'); ?>
</section>
<section class="container">
    <div class="row">
        <?php
        $args = array(
            'post_type'      => 'portfolio',
            'posts_per_page' => 6,
            'orderby'        => 'rand',
            'order'          => 'ASC'
        );
        $portfolio_query = new WP_Query($args);

        if ($portfolio_query->have_posts()) {
            echo '<div class="portfolio-grid">';

            while ($portfolio_query->have_posts()) {
                $portfolio_query->the_post();
                $thumbnail_id = get_post_meta(get_the_ID(), '_portfolio_thumbnail_id', true);

                if ($thumbnail_id) {
                    $thumbnail_url = wp_get_attachment_url($thumbnail_id);

                    echo '<div class="portfolio-item">';
                    echo '<a href="' . esc_url(get_permalink()) . '">';
                    echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '">';
                    echo '<div class="portfolio-overlay">';
                    echo '<span class="portfolio-title">' . get_the_title() . '</span>';
                    echo '</div>'; // .portfolio-overlay
                    echo '</a>';
                    echo '</div>'; // .portfolio-item
                }
            }

            echo '</div>'; // .portfolio-grid
            wp_reset_postdata();
        }
        ?>

    </div><!-- .row -->
</section>

<section class="cta">
    <?php get_template_part('template-parts/call-to-action'); ?>
</section>
<section class="container-fw gallery-bg">
    <?php while (have_posts()) : the_post();
        $images = get_field('hp_gallery');
        if ($images) : ?>
            <div class="owl-carousel hp-slider owl-theme hp-gallery-carousel">
                <?php foreach ($images as $image) : ?>
                    <div class="item">
                        <img src="<?php echo wp_get_attachment_image_url( $image['id'], 'hp-gallery-img' ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
    <?php endif;
    endwhile; ?>
</section>
<?php
get_footer();
