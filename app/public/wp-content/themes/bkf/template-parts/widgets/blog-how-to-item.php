<?php
$myitem = $myitems[$i];
$myid = $myitem['ID'];
$mypod = pods('blog_how_to_item', $myid);
$myimg = pods_image_url($mypod->field('image.guid'), 'full');
$mylink = get_the_permalink($mypod->field('page')['ID']);
?>
<div class="mycarousel-item" id="citem-<?php echo $i; ?>">
    <a href="<?php echo $mylink; ?>">
        <img src="<?php echo $myimg; ?>" alt="">
        <p><?php echo $mypod->field('alt_title'); ?></p>
        <span>Learn more</span>
    </a>
</div>