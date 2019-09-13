<?php
$social_media_links = pods('social_media_links');
$twitter_url = $social_media_links->field('twitter');
$instagram_url = $social_media_links->field('instagram');
$facebook_url = $social_media_links->field('facebook');
$linkedin_url = $social_media_links->field('linkedin');
$pinterest_url = $social_media_links->field('pinterest');
$youtube_url = $social_media_links->field('youtube');

$footer_pod = pods('footer_control_panel');
$footer_address_line_1 = $footer_pod->field('address_line_1');
$footer_address_line_2 = $footer_pod->field('address_line_2');
$footer_phone = $footer_pod->field('phone');
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <span class="newsletter-text">Receive updates from Bar Keepers Friend®</span>
            </div>
            <div class="col-lg-6 d-none d-md-block">
                <div class="newsletter-container">
                    <form class="newsletter-form">
                        <div class="input-wrapper">
                            <input type="newsletter" class="newsletter-field" id="sidebar" placeholder="Enter Email for BKF Newsletter" />
                        </div>
                        <button type="submit" class="newsletter-submit"><span class="screen-reader-text">Sign Up <i class="fas fa-angle-right"></i></span></button>
                    </form>
                </div>
            </div>
            <div class="col-12 d-md-none">
                <div class="footer-mobile-newsletter-wrapper">
                    <form method="post" class="mobile-newsletter-form">
                        <input type="text" placeholder="Enter Email for BKF Newsletter">
                        <button class="bkf-button green">Sign Up <i class="fas fa-chevron-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row footer-links">
            <div class="col-6 col-md-2">
                <h6>What to Clean</h6>
                <?php
                $args = array(
                    'theme_location' => 'footer_what_to_clean_location'
                );
                echo "<div class='nav-footer'>";
                wp_nav_menu($args);
                echo "</div>";
                ?>
            </div>
            <div class="col-6 col-md-2">
                <h6>Our Products</h6>
                <?php
                $args = array(
                    'theme_location' => 'footer_our_products_location'
                );
                echo "<div class='nav-footer'>";
                wp_nav_menu($args);
                echo "</div>";
                ?>
            </div>
            <div class="col-6 col-md-2">
                <h6>About Us</h6>
                <?php
                $args = array(
                    'theme_location' => 'footer_about_us_location'
                );
                echo "<div class='nav-footer'>";
                wp_nav_menu($args);
                echo "</div>";
                ?>
            </div>
            <div class="col-6 col-md-3">
                <h6>Contact</h6>
                <div class="row">
                    <div class="col-1">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="col-11">
                        <?php echo $footer_address_line_1 . "<br>" . $footer_address_line_2; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="col-11">
                        <?php echo $footer_phone; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 footer-social-media">
                <h6>Social</h6>
                <div class="row">
                    <a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo $instagram_url; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="<?php echo $linkedin_url; ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="<?php echo $pinterest_url; ?>" target="_blank"><i class="fab fa-pinterest"></i></a>
                    <a href="<?php echo $youtube_url; ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="row footer-stores">
            <div class="col-md-3 mobile-center">
                <hr class="d-md-none">
                <span>Find Bar Keepers Friend Products Online</span>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-12 mobile-center" style="display:flex">
                        <a href="#" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/images/bedbathbeyond_logo.png" alt=""></a>
                        <a href="#" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/images/target_logo.png" alt=""></a>
                        <a href="#" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/images/menards_logo.png" alt=""></a>
                        <a href="#" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/images/amazon_logo.png" alt=""></a>
                        <a href="#" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/images/homedepot_logo.png" alt=""></a>
                        <a href="#" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/images/walmart_logo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-bottom">
            <div class="col mobile-center">
                <hr>
                <span>© <?php echo date("Y"); ?> Servaas Laboratories Inc., All Rights Reserved. | <a href="#">Privacy Policy</a></span>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>