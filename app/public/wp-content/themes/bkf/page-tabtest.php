<?php get_header(); ?>

<?php insert_nav(true); ?>

<?php
//get home slider
$slider_control_panel = pods('slider_control_panel');
$home_products_page_slider = $slider_control_panel->field('home_products_page_slider');
insert_slider($home_products_page_slider['ID']);
?>

<div class="blue-bar"></div>

<div class="container">
    <div class="tabs-container">
        <div class="tab active"><span>Fun</span></div>
        <div class="tab"><span>Epic</span></div>
        <div class="tab"><span>Longer Name</span></span></div>
        <div class="tab"><span>I'm a Robot</span></div>
        <div class="tabs-divider"></div>
    </div>
</div>

<style>

</style>

<script type="text/javascript">
    jQuery(function($) {
        $(".tab").click(function() {
            $(".tab").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>

<?php insert_widget("places-box", "You might be surprised how many places Bar Keepers Friend cleaning products can be used throughout the home!"); ?>

<div class="banner-image" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/products.jpg')"></div>

<?php insert_widget("blog-highlight"); ?>

<?php get_footer(); ?>