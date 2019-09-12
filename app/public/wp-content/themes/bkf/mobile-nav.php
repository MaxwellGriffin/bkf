<div class="container-fluid d-md-none bkf-nav-mobile-wrapper">
    <!-- Mobile Menu -->
    <div class="row">
        <div class="col-2 nav-mobile-logo-container-container">
            <div class="nav-mobile-logo-container">
                <img src="<?php echo get_theme_file_uri(); ?>/images/BarKeepersFriend_Logo.png" alt="" class="nav-mobile-logo">
            </div>
        </div>
        <div class="col-5 text-center bkf-nav-mobile-tab">
            <span class="active">Household Cleaning</span>
        </div>
        <div class="col-5 text-center bkf-nav-mobile-tab">
            <span>Institutional Cleaning</span>
        </div>
    </div>
    <div class="row">
        <div class="col text-right nav-mobile-white-menu">
            <span class="mobile-menu-button">Menu <i class="fas fa-bars"></i></span>
        </div>
    </div>
</div>

<div class="container-fluid d-md-none bkf-nav-mobile-main-menu">
    <div class="row">
        <div class="col mobile-search-box">
            <p>Search for Product</p>
            <?php include(locate_template('template-parts/nav/mobile-search.php', false, false)); ?>
        </div>
    </div>
    <div class="mobile-menu-top-level">
        <div class="mobile-menu-top-level-item">
            Products
            <div class="mobile-menu-expand-button float-right text-center" id="products-btn">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
        <div class="mobile-menu-top-level-item">
            Before & After
        </div>
        <div class="mobile-menu-top-level-item">
            What to Clean
            <div class="mobile-menu-expand-button float-right text-center" id="what-to-clean-btn">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
        <div class="mobile-menu-top-level-item">
            Cleaning Tips
            <div class="mobile-menu-expand-button float-right text-center" id="cleaning-tips-btn">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
        <div class="mobile-menu-top-level-item">
            Where to Buy
        </div>
        <div class="mobile-menu-top-level-item">
            About Us
            <div class="mobile-menu-expand-button float-right text-center" id="about-us-btn">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
        <div class="mobile-menu-top-level-item">
            Contact Us
        </div>
    </div>
</div>

<div class="container-fluid d-md-none bkf-nav-mobile-sub-menu" id="products-menu">
    <div class="mobile-menu-top-level-item">
        <div class="mobile-menu-expand-button text-center" id="products-btn">
            <i class="fas fa-chevron-left"></i>
        </div>
        <span>Products</span>
    </div>
    <div class="mobile-menu-sub-level-item">
        Cleanser
    </div>
    <div class="mobile-menu-sub-level-item">
        Cookware Cleanser
    </div>
    <div class="mobile-menu-sub-level-item">
        Soft Cleanser
    </div>
    <div class="mobile-menu-sub-level-item">
        Cooktop Cleanser
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
    </div>
    <div class="mobile-menu-sub-level-item">
        Item
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

<style>
    /*
======================================================================================================================================================================
Header (Mobile Nav)
*/

    .bkf-nav-mobile-wrapper {
        position: fixed;
        z-index: 10;
    }

    .bkf-nav-mobile-tab {
        background-color: var(--blue);
        color: rgba(51%, 61%, 70%, 1);
        padding: 10px 0px;
        font-size: 12px;
    }

    .bkf-nav-mobile-tab .active {
        padding: 7px;
        border-bottom: 2px solid white;
        color: white;
    }

    .nav-mobile-logo-container-container {
        background-color: var(--blue);
    }

    .nav-mobile-logo-container {
        position: relative;
        width: 100%;
    }

    .nav-mobile-logo {
        position: absolute;
        z-index: 15;
        width: 80px;
        margin-left: -15px;
    }

    .nav-mobile-white-menu {
        background-color: white;
        padding: 10px;
        box-shadow: 0px 3px 4px gray;
    }

    .mobile-menu-button {
        cursor: pointer;
    }

    .nav-mobile-white-menu span,
    .nav-mobile-white-menu i {
        color: var(--blue);
    }

    .bkf-nav-mobile-main-menu {
        position: fixed;
        right: -100%;
        display: block;
        transition: right 0.2s ease-in-out;
        z-index: 9;
        width: 100%;
        height: 100%;
        padding-top: 90px;
        background-color: white;
        overflow: scroll;
    }

    .bkf-nav-mobile-main-menu.open {
        right: 0;
    }

    .bkf-nav-mobile-main-menu.left {
        right: 100%;
    }

    .mobile-search-box {
        margin-bottom: 15px;
    }

    .mobile-search-box form {
        width: 100%;
    }

    .mobile-search-box .form-wrapper {
        position: relative;
        height: 40px;
    }

    .mobile-search-box .input-wrapper {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 40px;
    }

    .mobile-search-box input.submit {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        width: 40px;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        background-color: var(--blue);
        color: white;
        border: 1px solid var(--blue);
    }

    .mobile-search-box input.field {
        width: 100%;
        height: 100%;
        border: 1px solid var(--blue);
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
        padding-left: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .mobile-menu-top-level-item {
        padding: 20px;
        color: var(--blue);
        border: 0.5px solid gray;
        border-left: 5px solid var(--blue);
        margin: 0px -15px;
        font-weight: 700;
        background-color: white;
    }

    .mobile-menu-top-level-item .mobile-menu-expand-button {
        height: 100%;
        /* background-color: var(--green); */
        width: 60px;
        display: inline-block;
    }

    .bkf-nav-mobile-sub-menu {
        position: fixed;
        right: -100%;
        display: block;
        transition: right 0.2s ease-in-out;
        z-index: 9;
        width: 100%;
        height: 100%;
        padding-top: 90px;
        background-color: white;
        overflow: scroll;
    }

    .bkf-nav-mobile-sub-menu.open {
        right: 0;
    }

    .mobile-menu-sub-level-item {
        padding: 20px;
        color: var(--blue);
        border: 0.5px solid gray;
        margin: 0px -15px;
    }
</style>