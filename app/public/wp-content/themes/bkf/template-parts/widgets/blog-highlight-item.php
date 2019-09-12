<!-- <?php 
$mycat = get_post_primary_category(the_ID())['primary_category']->name; 
?> -->
<div class="col-md-4 text-center post bg-image-fit" style="background-image:url('<?php echo the_post_thumbnail_url(); ?>')">
    <a href="<?php the_permalink(); ?>">
        <div class="post-content">
            <div class="row">
                <div class="col">
                    <span class="category"><?php echo $mycat; ?></span>
                    <span class="title"><?php the_title(); ?></span>
                    <span class="excerpt"><?php the_excerpt(); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="<?php the_permalink(); ?>" class="link">Read More</a>
                </div>
            </div>
        </div>
    </a>
</div>