<?php
$orderby_args = array(
    'rand',
    'date',
);
$order_args = array(
    'ASC',
    'DESC',
);
$orderby_valid = false;
$order_valid = false;

for ($i = 0; $i < count($orderby_args); $i++) {
    if ($orderby == $orderby_args[$i]) {
        $orderby_valid = true;
    }
}
for ($i = 0; $i < count($order_args); $i++) {
    if ($order == $order_args[$i]) {
        $order_valid = true;
    }
}

if ($orderby_valid && $order_valid) {

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby' => $orderby,
        'order' => $order,
    );
    $products_query = new WP_Query($args);
    ?>
    <div class="container-fluid product-highlight bg-papyrus">
        <div class="row">
            <div class="col">
                <h3><?php echo $title ?></h3>
            </div>
        </div>
        <div class="row d-none d-md-flex">
            <?php
                if ($products_query->have_posts()) {
                    while ($products_query->have_posts()) {
                        $products_query->the_post();
                        include(locate_template('template-parts/widgets/other-products-item.php', false, false));
                    }
                }
                ?>
            <!-- <div class="col-md-2 text-center my-auto">
                <a href="/products/category/home" class="bkf-link">View All<br>Products</a>
            </div> -->
        </div>
        <div class="row d-none d-md-block text-right"style="margin-top:50px;">
            <a href="/products/category/home" class="bkf-link">View All Products <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="row d-md-none">
            <div class="col-12 mobile-highlight" id="mobile-highlight-1">
                <?php
                    if ($products_query->have_posts()) {
                        $count = 1;
                        while ($products_query->have_posts()) {
                            $products_query->the_post();
                            include(locate_template('template-parts/widgets/other-products-item-mobile.php', false, false));
                            $count++;
                        }
                    }
                    ?>
                <div class="product-slider-buttons">
                    <?php
                        if ($products_query->have_posts()) {
                            $count = 1;
                            while ($products_query->have_posts()) {
                                $products_query->the_post();
                                if ($count == 1) {
                                    $myclass = " active";
                                } else {
                                    $myclass = "";
                                }
                                ?>
                            <div class="product-slider-button<?php echo $myclass; ?>" id="product-slider-button-<?php echo $count; ?>"></div>
                    <?php
                                $count++;
                            }
                        }
                        ?>
                </div>
                <span style="display:none" class="mobile-highlight-index-tracker" id="mobile-highlight-index-tracker-1"></span>
            </div>
            <div class="col-12 text-center d-md-none" style="margin-top:20px;">
                <a href="/products/category/home" class="bkf-link">View All Products <i class="fas fa-share"></i></a>
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
                for (var i = 1; i < 5; i++) {
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
                if (current_slide == 4) {
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

<?php
} else {
    echo "<span style='color:red'>ERROR: INVALID ARGS</span>";
}
?>