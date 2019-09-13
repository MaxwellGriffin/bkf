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
$args = array(
    'numberposts' => 4,
    'post_type' => 'post',
    'post_status' => 'publish',
    'offset' => 1,
);
$recent_posts = wp_get_recent_posts($args);
?>

<div class="index">
    <div class="container">
        <h1>Cleaning Tips</h1>
        <span class="filter-by">Filter By:</span>
        <?php
        for ($i = 0; $i < count($cats); $i++) {
            // echo "<span class='filter-button' id='filter-button-" . $cats[$i]->slug . "'>" . $cats[$i]->name . "</span>";
            ?>
            <span class="filter-button" id="filter-button-<?php echo $cats[$i]->slug; ?>"><?php echo $cats[$i]->name; ?></span>
        <?php
        }
        ?>
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
                <div class="featured-post">
                    <?php //echo var_dump($most_recent_post); 
                    ?>
                    <img src="<?php echo get_the_post_thumbnail_url($most_recent_post[0]['ID']); ?>" alt="">
                    <p class="category-links"><a href="#" class="category-link">How to Tips</a>, <a href="#">Kitchen</a></p>
                    <h3><?php echo $most_recent_post[0]['post_title']; ?></h3>
                    <p><?php echo substr($most_recent_post[0]['post_content'], 0, 50); ?>...</p>
                    <a href="<?php echo get_permalink($most_recent_post[0]['ID']); ?>" class="bkf-button blue">Read Article <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 blog-list">
                <?php
                for ($i = 0; $i < count($recent_posts); $i++) {
                    ?>
                    <?php include(locate_template('template-parts/index/blog-list-post.php', false, false)); ?>
                <?php
                }
                ?>
                <div class="text-right">
                    <span>Pagination Goes Here</span>
                </div>
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

            var category = $(this).attr("id").substring(14);

            console.log(category);

            var data = { //creating object to send to ajax handler
                'action': 'load_posts_by_ajax',
                'page': page,
                'security': '<?php echo wp_create_nonce("load_more_posts"); ?>',
                'cat': category,
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

        });
    });
</script>

<?php get_footer(); ?>