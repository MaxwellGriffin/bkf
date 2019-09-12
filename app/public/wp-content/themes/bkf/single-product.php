<?php get_header(); ?>

<?php insert_nav(false); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();
        $product = pods('product', get_the_id());
        ?>
        <div class="single-product">
            <div class="container product-main">
                <p>Home > Products > Stainless Steel Cleaner & Polish</p>
                <div class="row">
                    <div class="col-md-5 product-images">
                        <img src="<?php echo get_theme_file_uri(); ?>/images/products/spray.jpg" alt="" class="main">
                        <div class="row no-gutters thumbnails">
                            <div class="col-2 text-center">
                                <div style="background-image:url('<?php echo $product->field('image_1.guid'); ?>');" alt="" class="bg-image-fit thumb active"></div>
                            </div>
                            <div class="col-2 text-center">
                                <div style="background-image:url('<?php echo $product->field('image_2.guid'); ?>');" alt="" class="bg-image-fit thumb"></div>
                            </div>
                            <div class="col-2 text-center">
                                <div style="background-image:url('<?php echo $product->field('image_3.guid'); ?>');" alt="" class="bg-image-fit thumb"></div>
                            </div>
                            <div class="col-2 text-center">
                                <div style="background-image:url('<?php echo $product->field('image_4.guid'); ?>');" alt="" class="bg-image-fit thumb"></div>
                            </div>
                            <div class="col-2 text-center">
                                <div style="background-image:url('<?php echo $product->field('image_5.guid'); ?>');" alt="" class="bg-image-fit thumb"></div>
                            </div>
                            <div class="col-2 text-center">
                                <div style="background-image:url('<?php echo $product->field('image_6.guid'); ?>');" alt="" class="bg-image-fit thumb"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 product-info">
                        <div class="product-info-smallbox">
                            <h1><?php echo the_title(); ?></h1>
                            <p><?php echo $product->field('tagline'); ?></p>
                            <a href="" class="bkf-button-blue" target="_blank">Where to Buy <i class="fas fa-chevron-right"></i></a>
                            <a href="https://www.amazon.com" class="bkf-button-gray amazon-btn" target="_blank">Buy on <img src="<?php echo get_theme_file_uri(); ?>/images/amazon_logo.png" alt="" class="buy-button-img"> <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="secondary">
                            <hr>
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <span class="info-button active" id="btn-description">Item Description</span>
                                </div>
                                <div class="col-4 text-center">
                                    <span class="info-button" id="btn-ingredients">Ingredients</span>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="info-button" id="btn-safety">Safety Information</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col infobox active" id="info-description">
                                    <p><?php echo $product->field('description'); ?></p>
                                </div>
                                <div class="col infobox" id="info-ingredients">
                                    <p><?php echo $product->field('ingredients'); ?></p>
                                </div>
                                <div class="col infobox" id="info-safety">
                                    <p><?php echo $product->field('safety_info'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container product-secondary">
                <div class="row">
                    <div class="col-2">
                        <div class="tab text-center active" id="tab-1">
                            <span>How to Use</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="tab text-center" id="tab-2">
                            <span>Where to Use</span>
                        </div>
                    </div>
                    <div class="col-2 col-lg-3 col-xl-2">
                        <div class="tab text-center" id="tab-3">
                            <span>Where NOT to Use!</span>
                        </div>
                    </div>
                    <!-- <div class="col-2">
                        <div class="tab text-center" id="tab-4">
                            <span>Reviews</span>
                        </div>
                    </div> -->
                    <div class="col-2">
                        <div class="tab text-center" id="tab-5">
                            <span>FAQ's</span>
                        </div>
                    </div>
                    <div class="tab-divider-container">
                        <hr class="tab-divider">
                    </div>
                </div>
            </div>

            <div class="container product-content">
                <div class="row">
                    <div class="col tab-content active" id="content-1">
                        <p><?php echo $product->field('how_to_use'); ?></p>
                    </div>
                    <div class="col tab-content" id="content-2">
                        <p><?php echo $product->field('where_to_use'); ?></p>
                    </div>
                    <div class="col tab-content" id="content-3">
                        <p><?php echo $product->field('where_not_to_use'); ?></p>
                    </div>
                    <!-- <div class="col tab-content" id="content-4">
                        <p></p>
                    </div> -->
                    <div class="col tab-content" id="content-5">
                        <?php
                                $faqs = $product->field("associated_faqs");
                                for ($i = 0; $i < count($faqs); $i++) {
                                    ?>
                            <div class="product-faq-wrapper">
                                <div class="product-faq-question">
                                    <h4><?php echo $faqs[$i]['post_title']; ?> <i class="float-right fas fa-plus"></i></h4>
                                </div>
                                <div class="product-faq-answer">
                                    <p><?php echo $faqs[$i]['post_content']; ?></p>
                                </div>
                            </div>
                        <?php
                                }
                                ?>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                jQuery(function($) {
                    $(".product-faq-wrapper h4").click(function() {
                        $(this).parent().parent().find(".product-faq-answer").toggleClass("show");
                        $(this).find("i").toggleClass("fa-plus").toggleClass("fa-minus");
                    });
                });
            </script>

            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <span class="product-big-text">Always Test First!</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="#guide" class="product-big-text-2"><i class="fas fa-chevron-down"></i></a>
                    </div>
                </div>
            </div>

            <div class="guide-box-wrapper" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/cleaning_sink.jpg');" id="guide">
                <div class="container guide-box">
                    <div class="row">
                        <div class="col text-center">
                            <span>Although this product is formulated to clean stainless steel, always text in a small, inconspicuous area first.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-right">
                            <a href="#" class="bkf-link-white">How To Use Tips</a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="bkf-link-white">Our Surface Guide</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container warning-box text-center">
                <p><?php echo $product->field('warning_text'); ?></p>
            </div>
        </div>

        <div class="photo-box bg-image-fit" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/modern_apartment.jpg');"></div>

    <?php endwhile; ?>
<?php else : ?>
    <h1>Not found</h1>
<?php endif; ?>

<?php insert_widget("other-products", "You May Also Love"); ?>

<?php insert_widget('places-box'); ?>

<?php insert_widget('blog-highlight'); ?>

<script type="text/javascript">
    jQuery(function($) {
        //thumbnail images
        $(".thumb").click(function() {
            $(".thumb").removeClass("active");
            $(this).addClass("active");
            var img = $(this).css("background-image").substring(5).slice(0, -2);
            //console.log(img);
            $(".main").attr("src", img);
        });
        $(".info-button").click(function() {
            $(".info-button").removeClass("active");
            $(this).addClass("active");
            var id = $(this).attr("id").substring(4);
            $(".infobox").removeClass("active");
            $("#info-" + id).addClass("active");
        });
    });
</script>

<?php get_footer(); ?>