<?php get_header(); ?>

<?php insert_nav(true); ?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
        $title = get_the_title();
        ?>

        <?php insert_slider(get_the_ID(), false); ?>

        <?php insert_widget('before-after-box'); ?>

        <div class="single">
            <div class="container">
                <div class="content" style="margin-bottom:0;">
                    <h1>Questions about Bar Keepers Friend?</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        Contact form goes here
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

<div class="container-fluid distributors">
    <div class="row">
        <div class="col text-center">
            <h2>International Distributors</h2>
        </div>
    </div>
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'distributor',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );
        $distributors = new WP_Query($args);
        if ($distributors->have_posts()) {
            while ($distributors->have_posts()) {
                $distributors->the_post();
                include(locate_template('template-parts/page-contact/contact-box.php', false, false));
            }
        }
        ?>
    </div>
</div>

<?php insert_widget("blog-highlight"); ?>

<?php get_footer(); ?>