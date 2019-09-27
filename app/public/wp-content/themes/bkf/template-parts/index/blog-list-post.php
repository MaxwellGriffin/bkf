<div class="blog-list-post">
    <div class="row">
        <div class="col-md-4">
            <a href="<?php echo get_the_permalink(get_the_ID()); ?>">
                <div class="post-image bg-image-fit" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');"></div>
            </a>
        </div>
        <div class="col-md-8 blog-preview">
            <p class="category-links">
                <?php
                $myterms = get_the_terms(get_the_ID(), "category");
                if ( is_array( $myterms ) ) :
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
                endif;
                ?>
            </p>
            <a href="<?php the_permalink(); ?>">
                <h4><?php the_title(); ?></h4>
                <!-- <p><?php //echo substr($recent_posts[$i]['post_content'], 0, 50); ?>...</p> -->
                <p><?php the_excerpt(); ?></p>
            </a>
        </div>
    </div>
</div>