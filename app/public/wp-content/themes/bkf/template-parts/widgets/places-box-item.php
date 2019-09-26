<?php
$mypost = get_post($mypages[$i]['ID']);
?>
<div class="mobile-left place" id="place-<?php echo $i; ?>">
    <a href="<?php echo get_permalink($mypost->ID); ?>" class="floating-card">
        <div class="row">
            <div class="col-4 col-md-12 col-lg-12 col-xl-12">
                <img src="<?php echo $myicons[$i]; ?>" alt="">
                <img src="<?php echo $myicons_hover[$i]; ?>" alt="" class="hide">
            </div>
            <div class="col-8 col-md-12 col-lg-12 col-xl-12 mobile-left">
                <h6><?php echo $mypost->post_title; ?></h6>
                <p><?php echo $mypost->post_excerpt; ?></p>
                <span>Learn More</span>
            </div>
        </div>
    </a>
</div>