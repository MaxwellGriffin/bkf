<?php
global $post;
$multiple_slides = false;
if ($id) {
    $my_slider = pods('slider', $id);
    $my_slides = $my_slider->field('my_slides');
    $slideCount = count($my_slides);
    if ($slideCount > 1) {
        $multiple_slides = true;
    }
} else {
    $slideCount = 1;
}
$slider_control_panel = pods('slider_control_panel');
$slider_delay_time = $slider_control_panel->field('slider_delay_time');
?>
<div class="container-fluid slider-container">
    <?php
    for ($i = 0; $i < $slideCount; $i++) {
        //set up slide vars
        if ($id) {
            //for pod-based slider
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
        } else if ($slider_args) {
            //for hardcoded slider
            $slide_state = " active";
            $slide_headline = $slider_args[0];
            $slide_paragraph = $slider_args[1];
            $slide_button_text = $slider_args[2];
            $slide_button_url = $slider_args[3];
            $slide_image = $slider_args[4];
        } else {
            //for auto-generated slider
            $slide_state = " active";
            $slide_headline = the_title('', '', false);
            $slide_paragraph = $post->post_excerpt;
            $slide_button_text = "View Products";
            $slide_button_url = "/products/category/home";
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
                if ($multiple_slides) {
                    ?>
                <div class="slider-big-button" id="sbb-left">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="slider-big-button" id="sbb-right">
                    <i class="fas fa-chevron-right"></i>
                </div>
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
        <!-- <div class="slider-big-button" id="sbb-left">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="slider-big-button" id="sbb-right">
            <i class="fas fa-chevron-right"></i>
        </div> -->
    <?php
    }
    if ($featured_image) {
        ?>
        <div class="slider-featured">
            <span id="featured-banner">Featured</span>
            <span id="featured-close"><i class="fas fa-chevron-down"></i></span>
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
            var timeoutHandler;

            $(".slider-button").click(function() {
                $(".slider-button").removeClass("active");
                $(this).addClass("active");
                var id = $(this).attr("id");
                console.log(id);
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
                //clear and reset timeout
                clearTimeout(timeoutHandler);
                timeoutHandler = setTimeout(nextSlider, <?php echo $slider_delay_time; ?>);
            });

            function nextSlider() {
                var current_slide = getCurrentSlide();
                if (current_slide == <?php echo $slideCount; ?> - 1) {
                    current_slide = 0;
                } else {
                    current_slide++;
                }
                $(".slider-index-tracker").attr("id", current_slide);
                $("#slider-button-" + current_slide).trigger("click");
                console.log('MAIN SLIDER looping...');
            }

            $(window).load(function() {
                timeoutHandler = setTimeout(nextSlider, <?php echo $slider_delay_time; ?>);
                featured_setup();
            });

            $(".slider-big-button").click(function() {
                var current_index = getCurrentSlide();
                var last_slide = <?php echo $slideCount; ?> - 1;
                var id = $(this).attr("id");
                if (id == "sbb-left") {
                    if (current_index == 0) {
                        current_index = last_slide;
                    } else {
                        current_index--;
                    }
                } else if (id == "sbb-right") {
                    if (current_index == last_slide) {
                        current_index = 0;
                    } else {
                        current_index++;
                    }
                }
                $("#slider-button-" + current_index).trigger("click");
            });

            function getCurrentSlide() {
                var current_slide = $(".slider-index-tracker").attr("id");
                return current_slide.substring(current_slide.length - 1, current_slide.length);
            }

            var featuredState = 0;

            $("#featured-close").click(function() {
                // $("#featured-close i").toggleClass("fa-chevrown-down").toggleClass("fa-chevron-up");
                // $("#featured-close i").toggleFA();
                var slider_featured = $(".slider-featured");
                switch (featuredState) {
                    case 0:
                        console.log("Featured CLOSE");
                        var buttonHeight = $(this).innerHeight();
                        var newHeight = 0 - slider_featured.innerHeight() + buttonHeight + 10;
                        newHeight += "px";
                        slider_featured.css("bottom", newHeight);
                        featuredState = 1;
                        $("#featured-close i").css('transform', 'rotate(180deg)');
                        break;
                    case 1:
                        console.log("Featured OPEN");
                        slider_featured.css("bottom", "0px");
                        featuredState = 0;
                        $("#featured-close i").css('transform', 'rotate(360deg)');
                        break;
                    default:
                        console.log("Featured ERROR");
                }
            });

            function featured_setup() {
                console.log("SETUP");
                var buttonHeight = $("#featured-close").innerHeight();
                var slider_featured = $(".slider-featured");
                var newHeight = 0 - slider_featured.innerHeight() + buttonHeight + 10;
                newHeight += "px";
                slider_featured.css("bottom", newHeight);

                setTimeout(function() {
                    slider_featured.css("display", "block");
                    setTimeout(function() {
                        slider_featured.css("bottom", "0px");
                    }, 1); //1ms delay so animation takes place
                }, 500);
            }
        });
    </script>
<?php
}
?>