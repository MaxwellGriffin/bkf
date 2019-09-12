<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
);
$my_query = new WP_Query($args);
?>
<div class="container-fluid blog-highlight">
    <div class="row">
        <?php
        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) {
                $my_query->the_post();
                include(locate_template('template-parts/widgets/blog-highlight-item.php', false, false));
            }
        }
        ?>
    </div>
</div>