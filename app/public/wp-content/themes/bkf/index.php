<?php get_header(); ?>

<?php insert_nav(false); ?>

<?php
//get categories
$cats = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => true,
));

$postsPerPage = 12;

//get most recent post
$args = array(
    'numberposts' => 1,
    'post_type' => 'post',
    'post_status' => 'publish',
);
$most_recent_post = wp_get_recent_posts($args);

//get 4 recent posts
$paged = get_query_var('paged');
if ($paged == 0) {
    $paged = 1;
}
$my_paged = $paged;
global $my_paged;
$posts_per_page = 4;
$offset = 1;
$calculated_offset = (($paged - 1) * $posts_per_page) + $offset;

echo "<!-- Paged = " . $paged . " -->";
$args = array(
    'posts_per_page' => $posts_per_page,
    // 'paged' => 2,
    'post_type' => 'post',
    'post_status' => 'publish',
    'offset' => $calculated_offset,
    'orderby' => 'post_date',
    'order' => 'DESC',
);
// $recent_posts = wp_get_recent_posts($args);
$main_query = new WP_Query($args);
global $main_query;
?>

<div class="index">
    <div class="container">
        <h1>Cleaning Tips</h1>
        <div class="d-none d-md-block">
            <span class="filter-by">Filter By:</span>
            <?php
            for ($i = 0; $i < count($cats); $i++) {
                // echo "<span class='filter-button' id='filter-button-" . $cats[$i]->slug . "'>" . $cats[$i]->name . "</span>";
                ?>
                <span class="filter-button" id="filter-button-<?php echo $cats[$i]->slug; ?>"><?php echo $cats[$i]->name; ?></span>
            <?php
            }
            ?>
            <span class="filter-button" id="filter-button-none" style="display:none;"><strong>Undo Filter</strong></span>
            <hr>
            <div class="blog-list-filtered" style="display:none">
                <div class="row">
                    <!--Posts go here (ajax)-->
                </div>
                <span>Pagination Goes Here</span>
            </div>
            <h2>Most Recent</h2>
            <div class="row">
                <div class="col-md-6">
                    <!-- most recent post -->
                    <div class="featured-post">
                        <img src="<?php echo get_the_post_thumbnail_url($most_recent_post[0]['ID']); ?>" alt="">
                        <p class="category-links">
                            <?php
                            $myterms = get_the_terms($most_recent_post[0]['ID'], "category");
                            for ($i = 0; $i < count($myterms); $i++) {
                                if ($i != count($myterms) - 1) {
                                    $comma = ", ";
                                } else {
                                    $comma = "";
                                }
                                ?>
                                <a href="#" class="category-link" id="filter-button-<?php echo $myterms[$i]->slug; ?>"><?php echo $myterms[$i]->name; ?></a><span><?php echo $comma; ?></span>
                            <?php
                            }
                            ?>
                        </p>
                        <h3><?php echo $most_recent_post[0]['post_title']; ?></h3>
                        <!-- <p><?php // echo substr($most_recent_post[0]['post_content'], 0, 50);
                                ?>...</p> -->
                        <p><?php echo $most_recent_post[0]['post_excerpt']; ?></p>
                        <a href="<?php echo get_permalink($most_recent_post[0]['ID']); ?>" class="bkf-button blue">Read Article <i class="fas fa-chevron-right"></i></a>
                        <hr>
                    </div>
                </div>
                <div class="col-md-6 blog-list">
                    <!-- main index -->
                    <?php
                    if ($main_query->have_posts()) {
                        while ($main_query->have_posts()) {
                            $main_query->the_post();
                            include(locate_template('template-parts/index/blog-list-post.php', false, false));
                        }
                    }
                    wp_reset_postdata();
                    ?>
                    <div class="text-right">
                        <!-- <span>Pagination Goes Here</span> -->
                        <?php main_query_pagination(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-md-none blog-list">
            <?php
            if ($main_query->have_posts()) {
                while ($main_query->have_posts()) {
                    $main_query->the_post();
                    include(locate_template('template-parts/index/blog-list-post.php', false, false));
                }
            }
            wp_reset_postdata();
            ?>
            <div class="text-right">
                <!-- <span>Pagination Goes Here</span> -->
                <?php main_query_pagination(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var page = 1;
    var postsPerPage = <?php echo $postsPerPage ?>;
    var anotherPage = true;
    jQuery(function($) {
        $(".filter-button").click(function() {
            $(".filter-button").removeClass("active");
            $(this).addClass("active");
            $('.blog-list-filtered .row').empty();

            //show "all" button
            $("#filter-button-none").show();

            var category = $(this).attr("id").substring(14);
            console.log(category);
            reloadBlogFilter(category);
        });

        $(".category-link").click(function() {
            var category = $(this).attr("id").substring(14);

            $(".filter-button").removeClass("active");
            $("#filter-button-" + category).addClass("active");
            $('.blog-list-filtered .row').empty();

            //show "all" button
            $("#filter-button-none").show();

            console.log(category);
            reloadBlogFilter(category);
        })

        $("#filter-button-none").click(function() {
            $('.blog-list-filtered .row').empty();
            $('.blog-list-filtered').hide();
            $(this).hide();
        });

        function reloadBlogFilter($category) {
            var data = { //creating object to send to ajax handler
                'action': 'load_posts_by_ajax',
                'page': page,
                'security': '<?php echo wp_create_nonce("load_more_posts"); ?>',
                'cat': $category,
                'ppp': postsPerPage,
            };
            $.post(ajaxurl, data, function(response) { //post our object
                if (response != '') {
                    console.log("DATA");
                    console.log("RESPONSE: " + response);

                    $('.blog-list-filtered .row').append(response);
                    $(".blog-list-filtered").css("display", "block");
                    //check if there are no more posts
                    if ($("#no-more-posts").length) {
                        //$('.loadmore').hide();
                        anotherPage = false;
                        console.log("No more posts!");
                    }
                    //check if another page
                    if (anotherPage) {
                        page++;
                    }
                }
            });
        }
        //hide "all" button on click
        // $("#filter-button-").click(function() {
        //     $(this).hide();
        // });
    });
</script>

<?php get_footer(); ?>