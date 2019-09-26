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
                        <?php insert_what_to_use_box("newest"); ?>
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

<?php
// ASC = oldest first
// DESC = newest first
// insert_widget("other-products", "Our Oldest, Most Trusted \"Friends\"—", "date", "ASC"); //oldest
//
//\
//\\
//\\\
//\\\\
//\\\\\
//\\\\\\
//\\\\\\\
//\\\\\\\\
//\\\\\\\\\
//\\\\\\\\\\
insert_widget("other-products", "Our Newest, Most Trusted \"Friends\"—", "date", "DESC"); //newest
////////////
///////////
//////////
/////////
////////
///////
//////
/////
////
///
//
?>

<?php get_footer(); ?>