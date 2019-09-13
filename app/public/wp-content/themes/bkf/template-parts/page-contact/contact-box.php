<?php
$mydist = pods('distributor', get_the_id());
$myphone = $mydist->field('phone');
$myinfo = $mydist->field('info');
?>
<div class="col-md-6 col-lg-3">
    <div class="contact-box text-center">
        <span href="#" class="bkf-link"><?php the_title(); ?></span>
        <span id="contact-phone"><strong><?php echo $myphone; ?></strong></span>
        <span><?php echo $myinfo; ?></span>
    </div>
</div>