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
        <div class="tab active">Fun</div>
        <div class="tab">Epic</div>
        <div class="tab">Longer Name</div>
        <div class="tabs-divider"></div>
    </div>
</div>

<style>
    .tabs-container {
        width: 100%;
        height: auto;
        position: relative;
        margin: 50px 0px;
        /* border: 1px solid red; */
    }

    .tabs-container .tab {
        display: inline-block;
        padding: 15px;
        border-top: 1px solid #E7E7E7;
        border-right: 1px solid #E7E7E7;
        border-left: 1px solid #E7E7E7;
        border-bottom: 1px solid white;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        background-color: white;
        margin: 0px 10px;
        z-index: 1;
        position: relative;
        cursor: pointer;
        background-color: #F7F7F7;
    }

    .tabs-container .tab.active {
        z-index: 3;
        border-top: 1px solid var(--blue);
        border-right: 1px solid var(--blue);
        border-left: 1px solid var(--blue);
        background-color: white;
    }

    .tabs-container .tabs-divider {
        position: absolute;
        bottom: 0;
        right: 0;
        left: 0;
        height: 0px;
        border-top: 1.5px solid var(--blue);
        z-index: 2;
    }
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