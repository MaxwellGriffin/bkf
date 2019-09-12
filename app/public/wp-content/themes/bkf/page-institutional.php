<?php get_header(); ?>

<?php insert_nav(true, true); ?>

<?php
//get home slider
$slider_control_panel = pods('slider_control_panel');
$institutional_slider = $slider_control_panel->field('institutional_slider');
// echo $home_slider['ID'];
insert_slider($institutional_slider['ID']);
?>

<?php insert_widget('before-after-box'); ?>

<?php insert_widget('places-box'); ?>

<?php insert_widget('other-products', 'Once Tried, Always Used'); ?>

<div class="container big-box">
    <div class="row">
        <div class="col text-center">
            <span class="bigtext">We're Not Just For Tavern Owners</span>
            <span class="big-box-content">Trusted by homeowners, hobbyists, musicians, and professional cleaners worldwide, Bar Keepers Friend superior hard surface cleansers tackle rust, mineral deposits, baked-on food, and other tough stains with gentle, bleach-free formulations. Available wherever household cleaning products are sold, Bar Keepers Friend makes industrial-strength cleaning safe, quick, and easy.</span>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <a href="#" class="bkf-button-blue">View Products <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<?php insert_widget('blog-highlight'); ?>

<?php get_footer(); ?>