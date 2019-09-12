<div class="blog-list-post">
    <div class="row">
        <div class="col-4">
            <img src="<?php echo get_the_post_thumbnail_url($recent_posts[$i]['ID']); ?>" alt="">
        </div>
        <div class="col-8 blog-preview">
            <p class="category-links"><a href="#">How to Tips</a>, <a href="#">Kitchen</a></p>
            <h4><?php echo $recent_posts[$i]['post_title']; ?></h4>
            <p><?php echo substr($recent_posts[$i]['post_content'], 0, 50); ?>...</p>
        </div>
    </div>
</div>