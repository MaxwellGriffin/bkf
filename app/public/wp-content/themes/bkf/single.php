<?php get_header(); ?>

<?php insert_nav(true); ?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
        //$title = get_the_title();
        $mypod = pods('post', get_the_ID());
        ?>

        <?php insert_slider(null); ?>

        <div class="single">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <?php
                                if ($mypod->get_field('form_snippet')) {
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
                                    //end if
                                }
                                if ($mypod->get_field('what_to_use_items')) {
                                    insert_what_to_use_box("pod");
                                } else {
                                    insert_what_to_use_box("newest");
                                }
                                ?>
                    </div>
                </div>
                <h3>Related Posts</h3>
            </div>
        </div>

    <?php
        endwhile;
    else :
        ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
<?php
endif;
?>

<?php insert_widget("blog-highlight"); ?>

<script type="text/javascript">
    jQuery(function($) {
        $("#checkbox-text").click(function() {
            if (!$("#checkbox").prop("checked")) {
                $("#checkbox").prop("checked", true);
            } else {
                $("#checkbox").prop("checked", false);
            }
        });
    });
</script>

<?php get_footer(); ?>