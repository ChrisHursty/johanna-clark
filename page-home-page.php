<?php

/**
 * Template Name: Home Page
 *
 * @package Chris Hurst WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>

<section class="container home-hero">
    <div class="row">
        <div class="col-md-6 hero-content">
            <h1><?php echo wp_kses_post(get_field('hero_heading'));
                ?></h1>
            <p class="intro">
                <?php echo wp_kses_post(get_field('hero_intro')); ?>
            </p>
            <div class="button-box">
                <?php
                // Check if the ACF fields 'button_link' and 'button_text' exist and are not empty
                if (get_field('button_link') && get_field('button_text')) {
                    // Sanitize the URL and text to ensure security
                    $button_link = esc_url(get_field('button_link'));
                    $button_text = esc_html(get_field('button_text'));

                    // Output the button
                    echo '<a href="' . $button_link . '" class="ch-btn white-btn"><span>' . $button_text . '</span></a>';
                }
                ?>
            </div>
        </div>

        <div class="col-md-6 hero-image">
            <img src="<?php echo wp_kses_post(the_field('hero_image')); ?>" alt="Chris Hurst, Designer and Developer">
        </div>
    </div><!-- .row -->
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

<section class="container-fw services-container">
    <div class="container">
        <div class="row">
            <?php if (have_rows('services')) : ?>
                <?php while (have_rows('services')) : the_row();
                    // Your sub fields go here
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    $button_text = get_sub_field('button_text');
                    $button_url = get_sub_field('button_url');
                ?>
                    <div class="service-item" style="background-image: url('<?php echo esc_url($icon); ?>');">
                        <div class="service-content">
                            <h2 class="service-title"><?php echo esc_html($title); ?></h2>
                            <p class="service-description"><?php echo esc_html($description); ?></p>
                            <?php if ($button_url && $button_text) : ?>
                                <a href="<?php echo esc_url($button_url); ?>" class="learn-more-link"><span><?php echo esc_html($button_text); ?></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<section class="cta">
    <?php get_template_part('template-parts/call-to-action'); ?>
</section>
<section class="company-ticker">
    <?php get_template_part('template-parts/company-ticker'); ?>
</section>
<?php
get_footer();
