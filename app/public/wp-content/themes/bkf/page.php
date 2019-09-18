<?php get_header(); ?>

<?php insert_nav(true); ?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
        $title = get_the_title();
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
                        <div class="what-to-use-box">
                            <h5>Our New "Friends"--</h5>
                            <?php include(locate_template('template-parts/single/what-to-use-item.php', false, false)); ?>
                            <?php include(locate_template('template-parts/single/what-to-use-item.php', false, false)); ?>
                            <?php include(locate_template('template-parts/single/what-to-use-item.php', false, false)); ?>
                            <?php include(locate_template('template-parts/single/what-to-use-item.php', false, false)); ?>
                            <a href="#" class="where-to-buy-button text-center">
                                Where to Buy&nbsp;<i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
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

<?php insert_widget("other-products", "Our Oldest, Most Trusted \"Friends\"--"); ?>

<?php get_footer(); ?>