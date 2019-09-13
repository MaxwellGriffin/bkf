<?php
if ($is_pod) {
    $my_slider = pods('slider', $id);
    $my_slides = $my_slider->field('my_slides');
    $slideCount = count($my_slides);
    if ($slideCount == 1) {
        $multiple_slides = false;
    } else {
        $multiple_slides = true;
    }
} else {
    $multiple_slides = false;
    $slideCount = 1;
}

?>
<div class="container-fluid slider-container">
    <?php
    for ($i = 0; $i < $slideCount; $i++) {
        //set up slide vars
        if ($is_pod) {
            $slide = pods('slide', $my_slides[$i]["ID"]);
            $slide_headline = $slide->field('slide_headline');
            $slide_paragraph = $slide->field('slide_paragraph');
            $slide_button_text = $slide->field('slide_button_text');
            $slide_button_url = $slide->field('slide_button_url');
            $slide_image = $slide->field('slide_image.guid');
            $featured_image = $my_slider->field('featured_image.guid');
            $featured_text = $my_slider->field('featured_text');
            $featured_link_text = $my_slider->field('featured_link_text');
            $featured_link_url = $my_slider->field('featured_link_url');
            if ($i == 0) {
                $slide_state = " active";
            } else {
                $slide_state = "";
            }
        } else {
            $slide_state = " active";
            $slide_headline = the_title('', '', false);
            $slide_paragraph = "Lorem ipsum dolor sit amet";
            $slide_button_text = "View Products";
            $slide_button_url = "/products";
            //get image
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
            $slide_image = $thumb_url_array[0];
        }
        ?>
        <div class="slide<?php echo $slide_state; ?>" style="background-image:url('<?php echo $slide_image; ?>');" id="slide-<?php echo $i; ?>">
            <h1><?php echo $slide_headline; ?></h1>
            <p><?php echo $slide_paragraph; ?></p>
            <?php
                if ($slide_button_text) {
                    ?>
                <a href="<?php echo $slide_button_url; ?>" class="bkf-button blue"><?php echo $slide_button_text; ?> <i class="fas fa-chevron-right"></i></a>
            <?php
                }
                ?>
        </div>
    <?php
    }
    if ($multiple_slides) {
        ?>
        <div class="slider-buttons">
            <?php
                for ($i = 0; $i < $slideCount; $i++) {
                    if ($i == 0) {
                        $button_state = " active";
                    } else {
                        $button_state = "";
                    }
                    ?>
                <div class="slider-button<?php echo $button_state; ?>" id="slider-button-<?php echo $i; ?>"></div>
            <?php
                }
                ?>
        </div>
    <?php
    }
    if ($featured_image) {
        ?>
        <div class="slider-featured">
            <span>Featured</span>
            <img src="<?php echo $featured_image; ?>" alt="">
            <p><?php echo $featured_text; ?></p>
            <a href="<?php echo $featured_link_url; ?>" class="bkf-link"><?php echo $featured_link_text; ?> <i class="fas fa-download"></i></a>
        </div>
    <?php
    }
    ?>
    <span style="display:none" class="slider-index-tracker" id="slider-index-tracker-0"></span>
</div>

<?php
if ($multiple_slides) {
    ?>
    <script type="text/javascript">
        jQuery(function($) {
            $(".slider-button").click(function() {
                $(".slider-button").removeClass("active");
                $(this).addClass("active");
                var id = $(this).attr("id");
                // console.log(id);
                id = id.substring(id.length - 1, id.length);
                for (var i = 0; i < <?php echo $slideCount; ?>; i++) {
                    var target = $("#slide-" + i);
                    if (i < id) {
                        target.removeClass("active").addClass("left");
                    } else if (i == id) {
                        target.removeClass("left").addClass("active");
                    } else {
                        target.removeClass("left").removeClass("active");
                    }
                }
                $(".slider-index-tracker").attr("id", "slider-index-tracker-" + id);
            });

            function nextSlider() {
                var current_slide = $(".slider-index-tracker").attr("id");
                current_slide = current_slide.substring(current_slide.length - 1, current_slide.length);
                if (current_slide == <?php echo $slideCount; ?> - 1) {
                    current_slide = 0;
                } else {
                    current_slide++;
                }
                $(".slider-index-tracker").attr("id", current_slide);
                $("#slider-button-" + current_slide).trigger("click");
                console.log('MAIN SLIDER looping...');
                setTimeout(nextSlider, 3000);
            }

            $(window).load(function() {
                setTimeout(nextSlider, 3000);
            });
        });
    </script>
<?php
}
?>