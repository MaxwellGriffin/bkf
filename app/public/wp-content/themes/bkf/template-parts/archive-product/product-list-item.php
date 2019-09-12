<div class="col-lg-3 col-md-6">
    <a href="<?php the_permalink(); ?>">
        <div class="product-list-item same-height-column">
            <img src="<?php echo $product->field('image_1.guid'); ?>" alt="">
            <!-- <img src="<?php echo get_theme_file_uri(); ?>/images/product_placeholder.png" alt=""> -->
            <p class="text-center"><?php the_title(); ?></p>
        </div>
    </a>
</div>