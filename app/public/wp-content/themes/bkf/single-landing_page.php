<?php get_header(); ?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
        $myPod = pods('landing_page', get_the_id());
        $mySlider = $myPod->field('my_slider');
        insert_slider($mySlider['ID']);
        ?>
        <a href="/home">
            <div class="landing-logo">
                <img src="<?php echo get_theme_file_uri(); ?>/images/BarKeepersFriend_Logo.png" alt="Logo">
            </div>
        </a>
        <div class="blue-bar"></div>
        <div class="single">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php
                                if ($myPod->get_field('form_snippet')) {
                                    ?>
                            <!-- sidebar form -->
                            <div class="sidebar-form-container">
                                <div class="sidebar-form">
                                    <div class="form-close"><i class="fas fa-times"></i></div>
                                    <div class="text-center">
                                        <img src="<?php echo get_theme_file_uri(); ?>/images/bkf_howto.jpg" alt="">
                                    </div>
                                    <h6>Download our easy-to-follow guide on how to clean tough burnt-on stains from your cookware.</h6>
                                    <form action="post">
                                        <p>First Name*</p>
                                        <input type="text" class="input-fw" placeholder="First Name">
                                        <p>Last Name*</p>
                                        <input type="text" class="input-fw" placeholder="Last Name">
                                        <p>Email*</p>
                                        <input type="text" class="input-fw" placeholder="Email">
                                        <p>How did you hear about BKF?*</p>
                                        <select>
                                            <option value="default">Please Choose One Option</option>
                                        </select>
                                        <input type="checkbox" name="vehicle1" value="Bike" id="checkbox"> <span id="checkbox-text">I want to receive Bar Keepers Friend tips and special offers</span><br>
                                        <button type="submit" class="bkf-button blue">Get the Guide <i class="fas fa-chevron-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        <?php
                                }
                                ?>
                        <div class="sidebar-img-container">
                            <img src="<?php echo get_theme_file_uri(); ?>/images/products.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <div class="container">
        <h1>Not found</h1>
    </div>
<?php endif; ?>

<?php include(locate_template('template-parts/widgets/blog-how-to.php', false, false)); ?>

<?php include(locate_template('template-parts/landing_page/landing-footer.php', false, false)); ?>