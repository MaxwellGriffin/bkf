<?php
// Setup vars
$mypod = pods('what_to_clean_control_panel');
$mypages = array(
    $mypod->field('page_1'),
    $mypod->field('page_2'),
    $mypod->field('page_3'),
    $mypod->field('page_4'),
);
$myicons = array(
    pods_image_url($mypod->field('icon_1.guid'), 'full'),
    pods_image_url($mypod->field('icon_2.guid'), 'full'),
    pods_image_url($mypod->field('icon_3.guid'), 'full'),
    pods_image_url($mypod->field('icon_4.guid'), 'full'),
);
$myicons_hover = array(
    pods_image_url($mypod->field('icon_1_hover.guid'), 'full'),
    pods_image_url($mypod->field('icon_2_hover.guid'), 'full'),
    pods_image_url($mypod->field('icon_3_hover.guid'), 'full'),
    pods_image_url($mypod->field('icon_4_hover.guid'), 'full'),
);
?>
<div class="container-fluid places-box">
    <div class="row">
        <div class="col mobile-left">
            <span class="bigtext"><?php echo $title; ?></span>
        </div>
    </div>
    <div class="places-spacer">
        <?php
        for ($i = 0; $i < 4; $i++) {
            include(locate_template('template-parts/widgets/places-box-item.php', false, false));
        }
        ?>
    </div>
</div>
<script type="text/javascript">
    jQuery(function($) {
        // change image on hover
        $(".place").mouseenter(function() {
            $(this).find("img").toggleClass("hide");
        });
        $(".place").mouseleave(function() {
            $(this).find("img").toggleClass("hide");
        });
    });
</script>