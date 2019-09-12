<div class="container-fluid product-highlight">
    <div class="row">
        <div class="col">
            <h3><?php echo $title ?></h3>
        </div>
    </div>
    <div class="row d-none d-md-block">
        <div class="col-md-10">
            <div class="row highlight-row">
                <div class="col-md-3 text-center">
                    <div class="highlight-box text-center">
                        <a href="#">
                            <div class="img-box" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/product_placeholder.png')"></div>
                            <p>Coffee Maker Cleaner</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="highlight-box text-center">
                        <a href="#">
                            <div class="img-box" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/product_placeholder.png')"></div>
                            <p>Coffee Maker Cleaner</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="highlight-box text-center">
                        <a href="#">
                            <div class="img-box" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/product_placeholder.png')"></div>
                            <p>Coffee Maker Cleaner</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="highlight-box text-center">
                        <a href="#">
                            <div class="img-box" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/product_placeholder.png')"></div>
                            <p>Coffee Maker Cleaner</p>
                            <a href="/test" class="highlight-box-arrow"><i class="fas fa-arrow-circle-right"></i></a>
                            <span class="highlight-box-arrow-bg"><i class="fas fa-circle"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 text-center my-auto">
            <a href="#" class="bkf-link">View All<br>Products</a>
        </div>
    </div>
    <div class="row d-md-none">
        <div class="col mobile-highlight" id="mobile-highlight-1">
            <div class="mobile-highlight-item active" id="mobile-highlight-item-1">
                <img src="<?php echo get_theme_file_uri(); ?>/images/product_placeholder.png" alt="">
                <a href="#">Coffee Maker Cleaner 1</a>
            </div>
            <div class="mobile-highlight-item" id="mobile-highlight-item-2">
                <img src="<?php echo get_theme_file_uri(); ?>/images/product_placeholder.png" alt="">
                <a href="#">Coffee Maker Cleaner 2</a>
            </div>
            <div class="mobile-highlight-item" id="mobile-highlight-item-3">
                <img src="<?php echo get_theme_file_uri(); ?>/images/product_placeholder.png" alt="">
                <a href="#">Coffee Maker Cleaner 3</a>
            </div>
            <div class="product-slider-buttons">
                <div class="product-slider-button active" id="product-slider-button-1"></div>
                <div class="product-slider-button" id="product-slider-button-2"></div>
                <div class="product-slider-button" id="product-slider-button-3"></div>
            </div>
            <span style="display:none" class="mobile-highlight-index-tracker" id="mobile-highlight-index-tracker-1"></span>
        </div>
    </div>
    <div class="row d-md-none">
        <div class="col text-center" style="margin-top:20px;">
            <a href="/products" class="bkf-link">View All Products <i class="fas fa-share"></i></a>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function($) {
        $(".product-slider-button").click(function() {
            $(".product-slider-button").removeClass("active");
            $(this).addClass("active");
            var id = $(this).attr("id");
            // console.log(id);
            id = id.substring(id.length - 1, id.length);
            for (var i = 1; i < 4; i++) {
                var target = $("#mobile-highlight-item-" + i);
                if (i < id) {
                    target.removeClass("active").addClass("left");
                } else if (i == id) {
                    target.removeClass("left").addClass("active");
                } else {
                    target.removeClass("left").removeClass("active");
                }
            }
            $(".mobile-highlight-index-tracker").attr("id", "mobile-highlight-index-tracker-" + id);
        });

        function nextProductSlider() {
            var current_slide = $(".mobile-highlight-index-tracker").attr("id");
            current_slide = current_slide.substring(current_slide.length - 1, current_slide.length);
            if (current_slide == 3) {
                current_slide = 1;
            } else {
                current_slide++;
            }
            $(".mobile-highlight-index-tracker").attr("id", current_slide);
            $("#product-slider-button-" + current_slide).trigger("click");
            console.log('looping...');
            setTimeout(nextProductSlider, 3000);
        }

        $(window).load(function() {
            //start looping
            setTimeout(nextProductSlider, 3000);
        });
    });
</script>