<?php
$product = pods('product', get_the_id());
?>
<div class="col-md-3 text-center">
    <div class="highlight-box text-center">
        <a href="<?php the_permalink(); ?>">
            <div class="img-box" style="background-image:url('<?php echo $product->field('image_1.guid'); ?>')"></div>
            <p><?php the_title(); ?></p>
        </a>
    </div>
</div>