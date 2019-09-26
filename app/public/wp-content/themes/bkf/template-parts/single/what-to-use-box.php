<?php
if ($type == "newest" || $type == "oldest") {
    if ($type == "newest") {
        $orderby = "date";
        $order = "DESC";
        $title = "Our New \"Friends\"—";
    } else if ($type == "oldest") {
        $orderby = "date";
        $order = "ASC";
        $title = "Our Oldest \"Friends\"—";
    }
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby' => $orderby,
        'order' => $order,
    );
} else if ($type == "pod") {
    // set title
    $title = "What to use:";
    // get list from post pod
    $post = pods('post', get_the_ID());
    $my_items = $post->get_field('what_to_use_items');
    // get the product IDs
    $my_item_IDs = array();
    for ($i = 0; $i < count($my_items); $i++) {
        $my_item_IDs[$i] = $my_items[$i]['ID'];
    }
    $args = array(
        'post_type' => 'product',
        'post__in' => $my_item_IDs,
    );
} else {
    $title = "ERROR";
}
$products = new WP_Query($args);
?>
<div class="what-to-use-box">
    <h5><?php echo $title; ?></h5>
    <?php
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            include(locate_template('template-parts/single/what-to-use-item.php', false, false));
        }
    }
    ?>
    <a href="#" class="where-to-buy-button text-center">
        Where to Buy&nbsp;<i class="fas fa-chevron-right"></i>
    </a>
</div>