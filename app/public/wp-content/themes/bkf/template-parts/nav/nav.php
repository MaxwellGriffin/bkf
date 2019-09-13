<?php
$header_pod = pods('header_control_panel');
$tagline = $header_pod->field('tagline');
$social_media_links = pods('social_media_links');
$twitter_url = $social_media_links->field('twitter');
$instagram_url = $social_media_links->field('instagram');
$facebook_url = $social_media_links->field('facebook');
$linkedin_url = $social_media_links->field('linkedin');
$pinterest_url = $social_media_links->field('pinterest');
$youtube_url = $social_media_links->field('youtube');
if ($inst) {
    $home_class = "";
    $home_nav_style = "display:none;";
    $inst_class = "active";
    $inst_nav_style = "";
} else {
    $home_class = "active";
    $home_nav_style = "";
    $inst_class = "";
    $inst_nav_style = "display:none;";
}
if (!$splash) {
    $splash_class = "nosplash";
}
?>
<div class="container-fluid bkf-nav-wrapper d-none d-md-block">
    <div class="row">
        <div class="col-6 col-md-4 col-xl-3 text-center bkf-nav-tab <?php echo $home_class ?>" id="nav-tab-home">
            <a href="/">
                <span class="align-middle">Household Cleaning</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3 text-center bkf-nav-tab <?php echo $inst_class ?>" id="nav-tab-inst">
            <a href="/institutional">
                <span class="align-middle">Institutional Cleaning</span>
            </a>
        </div>
    </div>
    <div class="row nav-row-shadow">
        <div class="col bkf-nav-info text-center d-none d-lg-block">
            <span><?php echo $tagline; ?></span>
            <a href="<?php echo $twitter_url; ?>" target="_blank" class="social-media-link"><i class="fab fa-twitter"></i></a>
            <a href="<?php echo $instagram_url; ?>" target="_blank" class="social-media-link"><i class="fab fa-instagram"></i></a>
            <a href="<?php echo $facebook_url; ?>" target="_blank" class="social-media-link"><i class="fab fa-facebook"></i></a>
            <a href="<?php echo $linkedin_url; ?>" target="_blank" class="social-media-link"><i class="fab fa-linkedin"></i></a>
            <a href="<?php echo $pinterest_url; ?>" target="_blank" class="social-media-link"><i class="fab fa-pinterest"></i></a>
            <a href="<?php echo $youtube_url; ?>" target="_blank" class="social-media-link"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
    <div class="row nav-row-shadow">
        <div class="col bkf-nav-items" id="nav-items-home" style="<?php echo $home_nav_style; ?>">
            <?php
            $args = array(
                'theme_location' => 'header_menu_location'
            );
            echo "<nav class='nav-desktop'>";
            wp_nav_menu($args);
            echo "</nav>";
            ?>
            <span href="" class="bkf-nav-item bkf-nav-search-button" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
        <div class="col bkf-nav-items" id="nav-items-inst" style="<?php echo $inst_nav_style; ?>">
            <?php
            $args = array(
                'theme_location' => 'header_menu_location_inst'
            );
            echo "<nav class='nav-desktop'>";
            wp_nav_menu($args);
            echo "</nav>";
            ?>
            <span href="" class="bkf-nav-item bkf-nav-search-button" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
    </div>
    <div class="row d-none d-md-block">
        <div class="col bkf-search-form-container">
            <?php include(locate_template('searchform.php', false, false)); ?>
        </div>
    </div>
    <a href="/">
        <img src="<?php echo get_theme_file_uri(); ?>/images/BarKeepersFriend_Logo.png" alt="" class="bkf-logo d-none d-lg-block" style="cursor:pointer;">
    </a>
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb-container <?php echo $splash_class; ?>">
                <!-- <div class="container"> -->
                <?php insert_breadcrumbs(); ?>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

</div>

<script type="text/javascript">
    jQuery(function($) {
        //show/hide nav tabs
        $("#nav-tab-home").click(function() {
            var url = $(this).find("a").first().attr("href");
            window.location.href = url;
        });
        $("#nav-tab-inst").click(function() {
            var url = $(this).find("a").first().attr("href");
            window.location.href = url;
        });
    });
</script>

<script type="text/javascript">
    jQuery(function($) {
        $(".menu").children("li").mouseenter(function() {
            $(".menu").children("li").children(".sub-menu").removeClass("show");
            var target = $(this).children(".sub-menu");
            target.addClass("show");
            var bottom = target.offset().top + target.outerHeight(true);

            target.mouseleave(function() {
                target.removeClass("show");
            });
            $(document).mousemove(function(event) {
                if (currentMousePos.y > bottom) {
                    target.removeClass("show");
                    //console.log("MERKED");
                }
            });
        });
        var currentMousePos = {
            x: -1,
            y: -1
        };
        $(document).mousemove(function(event) {
            currentMousePos.x = event.pageX;
            currentMousePos.y = event.pageY;
            // console.log("Mouse Position: x=" + currentMousePos.x + " y=" + currentMousePos.y);
        });
    });
</script>

<!-- Mobile Menu -->
<div class="container-fluid d-md-none bkf-nav-mobile-wrapper">
    <div class="row">
        <div class="col-2 nav-mobile-logo-container-container">
            <div class="nav-mobile-logo-container">
                <img src="<?php echo get_theme_file_uri(); ?>/images/BarKeepersFriend_Logo.png" alt="" class="nav-mobile-logo">
            </div>
        </div>
        <div class="col-5 text-center bkf-nav-mobile-tab">
            <a href="/" class="<?php echo $home_class; ?>">Household Cleaning</a>
        </div>
        <div class="col-5 text-center bkf-nav-mobile-tab">
            <a href="/institutional" class="<?php echo $inst_class; ?>">Institutional Cleaning</a>
        </div>
    </div>
    <div class="row">
        <div class="col text-right nav-mobile-white-menu">
            <span class="mobile-menu-button">Menu <i class="fas fa-bars"></i></span>
        </div>
    </div>
</div>

<!-- Mobile breadcrumbs -->
<!-- <div class="breadcrumb-container d-md-none">
    <?php insert_breadcrumbs(); ?>
</div> -->

<div class="container-fluid d-md-none bkf-nav-mobile-main-menu">
    <div class="row">
        <div class="col mobile-search-box">
            <p>Search for Product</p>
            <?php include(locate_template('template-parts/nav/mobile-search.php', false, false)); ?>
        </div>
    </div>
    <div style="<?php echo $home_nav_style; ?>">
        <?php
        $args = array(
            'theme_location' => 'mobile_header_menu_location',
            'walker' => new BKF_Mobile_Nav_Walker()
        );
        echo "<nav class='nav-mobile'>";
        wp_nav_menu($args);
        echo "</nav>";
        ?>
    </div>
    <div style="<?php echo $inst_nav_style; ?>">
        <?php
        $args = array(
            'theme_location' => 'mobile_header_menu_location_inst',
            'walker' => new BKF_Mobile_Nav_Walker()
        );
        echo "<nav class='nav-mobile'>";
        wp_nav_menu($args);
        echo "</nav>";
        ?>
    </div>
</div>

<script type="text/javascript">
    jQuery(function($) {
        $(".mobile-menu-button").click(function() {
            if ($(".bkf-nav-mobile-main-menu").hasClass("open") || $(".bkf-nav-mobile-main-menu").hasClass("left")) {
                $(".bkf-nav-mobile-main-menu").removeClass("open");
                $(".bkf-nav-mobile-main-menu").removeClass("left");
                $(".bkf-nav-mobile-sub-menu").removeClass("open");
                $(this).text("Menu ");
                $(this).append("<i class='fas fa-bars'></i>");
                $("nav.nav-mobile .menu li.menu-item-has-children ul").removeClass("active");
            } else {
                $(".bkf-nav-mobile-main-menu").addClass("open");
                $(this).text("Close ");
                $(this).append("<i class='fas fa-times'></i>");
            }
        });
        $(".mobile-menu-expand-button").click(function() {
            $(".bkf-nav-mobile-main-menu").toggleClass("open");
            $(".bkf-nav-mobile-main-menu").toggleClass("left");
            var target = $(this).attr("id");
            target = target.substring(0, target.length - 4);
            $("#" + target + "-menu").toggleClass("open");
        });
    });
</script>

<script type="text/javascript">
    jQuery(function($) {
        $("nav.nav-mobile .menu li.menu-item-has-children").click(function() {
            $(".bkf-nav-mobile-main-menu").toggleClass("open");
            $(".bkf-nav-mobile-main-menu").toggleClass("left");
            $(this).children("ul").addClass("active");
            console.log("oops");
        });
        $(".special-back-button").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(".bkf-nav-mobile-main-menu").removeClass("left").addClass("open");
            $(this).parent().removeClass("active");
            //.removeClass("active");
            console.log("ok");
        });
        $(".sub-menu").click(function(e) {
            e.stopPropagation();
        });
    });
</script>