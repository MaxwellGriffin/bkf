<?php
$product = pods('product', get_the_id());
?>
<div class="col-md-2 text-center">
    <div class="highlight-box text-center">
        <a href="<?php the_permalink(); ?>">
            <div class="img-box" style="background-image:url('<?php echo $product->field('image_1.guid'); ?>')"></div>
            <p><?php the_title(); ?></p>
        </a>
    </div>
</div>



<!-- <div class="col-md-3 text-center">
    <div class="highlight-box text-center">
        <a href="#">
            <div class="img-box" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/product_placeholder.png')"></div>
            <p>Coffee Maker Cleaner</p>
            <a href="/test" class="highlight-box-arrow"><i class="fas fa-arrow-circle-right"></i></a>
            <span class="highlight-box-arrow-bg"><i class="fas fa-circle"></i></span>
        </a>
    </div>
</div> -->