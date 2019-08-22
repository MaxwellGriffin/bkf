<?php get_header(); ?>

<?php insert_nav(); ?>

<div class="container-fluid slider">
    <div class="row">
        <div class="col-md-6">
            <h1>Bar Keepers Friend Cleanser</h1>
            <p>Our classic cleaning powder - flexible and versatile.</p>
            <a href="" class="bkf-button-blue">More Information  <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
    <div class="slider-featured text-center">
        <span>Featured</span>
        <img src="<?php echo get_theme_file_uri(); ?>/images/bkf_howto.jpg" alt="">
        <p>Lorem ipsum dolor sit amet consectetur.</p>
        <a href="#" class="bkf-link">Download Guide <i class="fas fa-download"></i></a>
    </div>
</div>

<div class="container-fluid before-after-box">
    <div class="row">
        <div class="col-md-6 my-auto">
            <span>Need some cleaning inspiration? You won't believe what Bar Keepers Friend can do.</span>
        </div>
        <div class="col-md-6 text-right">
            <a href="#" class="bkf-button-green">Before & After Gallery <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</div>

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