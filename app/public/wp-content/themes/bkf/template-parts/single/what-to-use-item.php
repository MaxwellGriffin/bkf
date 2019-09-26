<?php
$product = pods('product', get_the_id());
?>
<div class="row what-to-use-item">
    <div class="col-3" style="padding:0px">
        <div class="image" style="background-image:url('<?php echo $product->field('image_1.guid'); ?>')"></div>
    </div>
    <div class="col-9 what-to-use-title">
        <a href="#"><?php echo the_title(); ?></a>
    </div>
</div>