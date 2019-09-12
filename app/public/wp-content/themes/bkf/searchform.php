<form class="bkf-search-form" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <p>Search for Product</p>
    <div class="form-wrapper">
        <div class="input-wrapper">
            <input type="text" class="field" name="s" id="desktop-search-field" placeholder="<?php esc_attr_e('Search', 'twentyeleven'); ?>" />
        </div>
        <!-- <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'twentyeleven'); ?>" /> -->
        <button class="submit" type="submit" name="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
    </div>
</form>

<script type="text/javascript">
    jQuery(function($) {
        //open search box
        $(".bkf-nav-search-button").click(function() {
            $(".bkf-search-form").toggleClass("active");
            setTimeout(function() {
                //0.2s timeout to compensate for fly-in
                $("#desktop-search-field").focus();
            }, 200);
        });
        //hide search box on click
        $(document).mouseup(function(e) {
            if ($(e.target).closest(".bkf-search-form").length === 0 && !$(e.target).is("bkf-nav-search-button")) {
                $(".bkf-search-form").removeClass("active");
            }
        });
    });
</script>