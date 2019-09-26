<?php get_header(); ?>

<?php insert_nav(true); ?>

<?php
//get home slider
$slider_control_panel = pods('slider_control_panel');
$faq_page_slider = $slider_control_panel->field('faq_page_slider');
insert_slider($faq_page_slider['ID']);
?>

<?php
//get team categories
$cats = get_terms(array(
    'taxonomy' => 'faq_category',
    'hide_empty' => true,
));
?>

<div class="blue-bar"></div>

<div class="container archive-faq">
    <h1>Frequently Asked Questions</h1>
    <p>You have questions. We have answers.</p>

    <!-- <div class="row d-none d-md-flex"> -->
    <div class="row d-flex">
        <div class="tabs-container">
            <?php
            for ($i = 0; $i < count($cats); $i++) {
                if ($i == 0) {
                    $myclass = " active";
                } else {
                    $myclass = "";
                }
                ?>
                <div class="tab<?php echo $myclass; ?>" id="tab-<?php echo $i; ?>">
                    <span><?php echo $cats[$i]->name; ?></span>
                </div>
            <?php
            }
            ?>
            <div class="tabs-divider"></div>
        </div>
    </div>
</div>

<!-- <div class="container single-product d-none d-md-block archive-faq"> -->
<div class="container single-product d-block archive-faq">
    <div class="row product-content">
        <?php
        for ($i = 0; $i < count($cats); $i++) {
            $args = array(
                'post_type' => 'faq',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'faq_category',
                        'field' => 'slug',
                        'terms' => $cats[$i]->slug,
                    )
                )
            );
            $my_posts = new WP_Query($args);
            ?>
            <div class="col tab-content<?php if ($i == 0) {
                                                echo ' active';
                                            } ?>" id="content-<?php echo $i; ?>">
                <?php
                    if ($my_posts->have_posts()) : while ($my_posts->have_posts()) : $my_posts->the_post();
                            ?>
                        <div class="product-faq-wrapper">
                            <div class="product-faq-question">
                                <h4><span><?php echo the_title(); ?></span> <i class="float-right fas fa-plus"></i></h4>
                            </div>
                            <div class="product-faq-answer bg-papyrus">
                                <?php echo the_content(); ?>
                            </div>
                            <div class="product-faq-answer-heightref">
                                <?php echo the_content(); ?>
                            </div>
                        </div>
                <?php
                        endwhile;
                    endif;
                    ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<!-- <div class="container mobile-faq d-md-none archive-faq"> -->
<div class="container mobile-faq d-none archive-faq">
    <?php
    for ($i = 0; $i < count($cats); $i++) {
        $args = array(
            'post_type' => 'faq',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'faq_category',
                    'field' => 'slug',
                    'terms' => $cats[$i]->slug,
                )
            )
        );
        $my_posts = new WP_Query($args);
        ?>

        <div class="row faq-row-parent" id="parent-<?php echo $cats[$i]->slug; ?>">
            <div class="col-12">
                <h4><?php echo $cats[$i]->name; ?> <i class="float-right fas fa-chevron-down"></i></h4>
            </div>
        </div>
        <div class="row faq-row-child" id="child-<?php echo $cats[$i]->slug; ?>">
            <div class="col">
                <?php
                    if ($my_posts->have_posts()) : while ($my_posts->have_posts()) : $my_posts->the_post();
                            ?>
                        <div class="product-faq-wrapper">
                            <div class="product-faq-question">
                                <h4>
                                    <?php echo the_title(); ?> <i class="float-right fas fa-plus"></i>
                                </h4>
                            </div>
                            <div class="product-faq-answer">
                                <?php echo the_content(); ?>
                            </div>
                        </div>
                <?php
                        endwhile;
                    endif;
                    ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<script type="text/javascript">
    jQuery(function($) {
        $(".product-faq-wrapper h4").click(function() {
            var answer = $(this).parent().parent().find(".product-faq-answer");
            var icon = $(this).find("i");

            if (answer.height() == 0) {
                var newheight = answer.findAutoHeight();
                answer.height(newheight);
            } else {
                answer.height(0);
            }
            icon.toggleClass("fa-plus").toggleClass("fa-minus");
        });
        $(".faq-row-parent").click(function() {
            var id = $(this).attr("id").substring(7);
            $("#child-" + id).toggleClass("active");
            $(this).find("i").toggleClass("fa-chevron-down").toggleClass("fa-chevron-up");
        });
    });
</script>

<?php insert_widget("other-products", "You May Also Love"); ?>

<?php insert_widget("places-box"); ?>

<?php insert_widget("blog-highlight"); ?>

<?php get_footer(); ?>