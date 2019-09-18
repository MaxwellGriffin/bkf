<?php
$numResults;
global $post;
?>

<?php get_header(); ?>

<?php insert_nav(false); ?>

<div class="container search-page">
    <div class="row">
        <div class="col">
            <h1 class="result-heading">Search results for <span class="result-highlight">'<?php echo esc_html(get_search_query(false)); ?>'</span> (<span id="result-field">~ results</span>)</h1>
        </div>
    </div>
</div>

<div class="container search-page">
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
            ?>
            <a class="result-link" href="<?php the_permalink(); ?>">
                <div class="result-box">
                    <h2><?php the_title(); ?></h2>
                    <p class="result-link"><?php the_permalink(); ?></p>
                    <?php the_excerpt(); ?>
                </div>
            </a>
        <?php
                $numResults++;
            endwhile;
        else :
            ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php
    endif;
    ?>
</div>

<script type="text/javascript">
    numResults = <?php echo $numResults; ?>;
    jQuery(function($) {
        $(document).ready(function() {
            //set heading text
            if (numResults == 1) {
                $("#result-field").text(numResults + " result");
                console.log("single");
            } else {
                $("#result-field").text(numResults + " results");
                console.log("plural");
            }
        });
    });
</script>

<?php get_footer(); ?>