<?php get_header(); ?>

<?php insert_nav(true); ?>

<?php
//get home slider
$slider_control_panel = pods('slider_control_panel');
$home_products_page_slider = $slider_control_panel->field('home_products_page_slider');
insert_slider($home_products_page_slider['ID']);
?>

<div class="blue-bar"></div>

<div class="archive-product">
    <div class="container text-center page-title">
        <h1>BKF Household Products</h1>
    </div>

    <div class="container product-list">
        <div class="row">
            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                    $product = pods('product', get_the_id());
                    ?>
                    <?php include(locate_template('template-parts/archive-product/product-list-item.php', false, false)); ?>
                <?php
                    endwhile;
                else :
                    ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
            <?php
            endif;
            ?>
            <?php include(locate_template('template-parts/archive-product/product-list-item-last.php', false, false)); ?>
        </div>
    </div>
</div>

<?php insert_widget("places-box", "You might be surprised how many places Bar Keepers Friend cleaning products can be used throughout the home!"); ?>

<div class="banner-image" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/products.jpg')"></div>

<?php insert_widget("blog-highlight"); ?>

<?php get_footer(); ?>