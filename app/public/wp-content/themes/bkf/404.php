<?php get_header(); ?>

<?php insert_nav(true); ?>

<?php insert_slider(null, array(
    "Error 404",
    "Page not found",
    "Take me home",
    "/home",
    "/wp-content/uploads/servaas_streetview.jpg",
)); ?>

<?php insert_widget("other-products", "Try checking out some of our amazing Bar Keepers Friend products!"); ?>

<?php get_footer(); ?>