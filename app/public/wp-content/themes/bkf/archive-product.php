<?php get_header(); ?>

<?php
$path = $_SERVER['REQUEST_URI'];
$path = explode("/", $path);

if ($path[1] == "products" && $path[2] == "category" && $path[3] == "institutional") {
    insert_nav(true, true);
} else {
    insert_nav(true, false);
}
?>

<?php
//get home slider
$slider_control_panel = pods('slider_control_panel');
$home_products_page_slider = $slider_control_panel->field('home_products_page_slider');
insert_slider($home_products_page_slider['ID']);

//get query vars
$product_type = get_query_var('product_type');

//get products
$args = array(
    'numberposts' => -1,
    'post_type' => 'product',
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_type',
            'field' => 'slug',
            'terms' => $product_type,
        )
    )
);
$products_query = new WP_Query($args);

//set up page vars
$str_title;
$last_type;
switch ($product_type) {
    case "home":
        $str_title = "BKF Household Products";
        $last_type = "Institutional";
        $last_url = "products/category/institutional";
        break;
    case "institutional":
        $str_title = "BKF Institutional Products";
        $last_type = "Household";
        $last_url = "products/category/home";
        break;
    default:
        $str_title = "ERROR";
        $last_type = "ERROR";
        $last_url = "/error";
        break;
}
?>

    <div class="blue-bar"></div>

    <div class="archive-product bg-papyrus">
        <div class="container text-center page-title">
            <h1><?php echo $str_title; ?></h1>
        </div>

        <div class="container product-list">
            <div class="row">
                <?php
                if ($products_query->have_posts()) : while ($products_query->have_posts()) : $products_query->the_post();
                        $product = pods('product', get_the_id());
                        ?>
                        <?php include(locate_template('template-parts/archive-product/product-list-item.php', false, false)); ?>
                    <?php
                        endwhile;
                    else :
                        ?>
                    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
                <?php
                endif;
                ?>
                <?php include(locate_template('template-parts/archive-product/product-list-item-last.php', false, false)); ?>
            </div>
        </div>
    </div>

    <?php insert_widget("places-box", "You might be surprised how many places Bar Keepers Friend cleaning products can be used throughout the home!"); ?>

    <div class="banner-image" style="background-image:url('<?php echo get_theme_file_uri(); ?>/images/products.jpg')"></div>

    <?php insert_widget("blog-highlight"); ?>

    <?php get_footer(); ?>