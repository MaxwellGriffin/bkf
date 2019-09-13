<?php
$product = pods('product', get_the_id());
if ($count == 1) {
    $myclass = " active";
} else {
    $myclass = "";
}
?>
<div class="mobile-highlight-item<?php echo $myclass; ?>" id="mobile-highlight-item-<?php echo $count; ?>">
    <img src="<?php echo $product->field('image_1.guid'); ?>" alt="">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div>