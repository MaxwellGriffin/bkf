<?php

$url = urlencode( 'http://barkeepersfriend.com/before-after/' );
$message = urlencode( 'I saw this on Bar Keepers Friend! #BKFBeforeAndAfter' );
$twitter = $message . ' @barkeeperfriend';
$pinterest = $message . ' @bkfcleanser';
  
?>

<div class="col-md-3 mt-4">
    <a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="d-block instagram p-2">
        <img class="d-block col-md-12 mb-4 p-0" src="<?= get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?= esc_attr( get_the_title() ) ?>" />
        <p><?php the_excerpt(); ?></p>
    </a>
    <div>
      <?= __( 'Share it!', CHILD_THEME ) ?>
      
      <a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?= $url; ?>&media=<?= get_the_post_thumbnail_url() ?>&description=<?= $pinterest; ?>" target="_blank"><?= __( 'Pin on Pinterest', CHILD_THEME ) ?></a>
                
      <a class="twitter" href="https://twitter.com/home?status=<?= $twitter . ' ' . get_the_post_thumbnail_url(); ?>" target="_blank"><?= __( 'Share on Twitter', CHILD_THEME ) ?></a>
      
      <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?= get_the_post_thumbnail_url() ?>" target="_blank"><?= __( 'Share on Facebook', CHILD_THEME ) ?></a>
      
      <a class="googleplus" href="https://plus.google.com/share?url=<?= get_the_post_thumbnail_url() ?>" target="_blank"><?= __( 'Share on Google+', CHILD_THEME ) ?></a>
    </div>
</div>