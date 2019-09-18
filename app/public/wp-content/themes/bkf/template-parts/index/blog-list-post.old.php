<div class="blog-list-post">
    <div class="row">
        <div class="col-md-4">
            <!-- <img src="<?php echo get_the_post_thumbnail_url($recent_posts[$i]['ID']); ?>" alt=""> -->
            <a href="<?php echo get_the_permalink($recent_posts[$i]['ID']); ?>">
                <div class="post-image bg-image-fit" style="background-image:url('<?php echo get_the_post_thumbnail_url($recent_posts[$i]['ID']); ?>');"></div>
            </a>
        </div>
        <div class="col-md-8 blog-preview">
            <p class="category-links">
                <?php
                $myterms = get_the_terms($recent_posts[$i]['ID'], "category");
                for ($o = 0; $o < count($myterms); $o++) {
                    if ($o == count($myterms) - 1) {
                        $comma = "";
                    } else {
                        $comma = ", ";
                    }
                    ?>
                    <a href="#" class="category-link" id="filter-button-<?php echo $myterms[$o]->slug; ?>"><?php echo $myterms[$o]->name; ?></a><span><?php echo $comma; ?></span>
                <?php
                }
                ?>
            </p>
            <a href="<?php echo get_the_permalink($recent_posts[$i]['ID']); ?>">
                <h4><?php echo $recent_posts[$i]['post_title']; ?></h4>
                <!-- <p><?php //echo substr($recent_posts[$i]['post_content'], 0, 50); ?>...</p> -->
                <p><?php echo $recent_posts[$i]['post_excerpt']; ?></p>
            </a>
        </div>
    </div>
</div>