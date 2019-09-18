<div class="col-md-6 col-lg-3">
    <div class="blog-list-post">
        <a href="<?php echo the_permalink(); ?>">
            <div class="post-image bg-image-fit" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>');"></div>
            <div class="post-preview">
                <h4><?php echo the_title(); ?></h4>
                <p><?php echo the_excerpt(); ?></p>
            </div>
        </a>
    </div>
</div>