<div class="container-fluid bkf-nav-wrapper">
    <div class="row">
        <div class="col-6 col-md-4 col-xl-2 text-center bkf-nav-tab active" id="nav-tab-home">
            <span class="align-middle">Household Cleaning</span>
        </div>
        <div class="col-6 col-md-4 col-xl-2 text-center bkf-nav-tab" id="nav-tab-inst">
            <span class="align-middle">Institutional Cleaning</span>
        </div>
    </div>
    <div class="row">
        <div class="col bkf-nav-info text-center d-none d-lg-block">
            <span>Exceptional household cleaning products. Once Tried, Always Used.</span>
            <a href="https://www.twitter.com" target="_blank" class="social-media-link"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank" class="social-media-link"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com" target="_blank" class="social-media-link"><i class="fab fa-facebook"></i></a>
            <a href="https://www.linkedin.com" target="_blank" class="social-media-link"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.pinterest.com" target="_blank" class="social-media-link"><i class="fab fa-pinterest"></i></a>
            <a href="https://www.youtube.com" target="_blank" class="social-media-link"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col bkf-nav-items" id="nav-items-home">
            <a href="#" class="bkf-nav-item active" id="nav-item-products">Products</a>
            <a href="#" class="bkf-nav-item">Before & After</a>
            <a href="#" class="bkf-nav-item">What to Clean</a>
            <a href="#" class="bkf-nav-item">Cleaning Tips</a>
            <a href="#" class="bkf-nav-item">Where to Buy</a>
            <a href="#" class="bkf-nav-item">About Us</a>
            <a href="#" class="bkf-nav-item">Contact Us</a>
            <a href="#" class="bkf-nav-item">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </div>
        <div class="col bkf-nav-items" id="nav-items-inst" style="display:none">
            <a href="#" class="bkf-nav-item active">Institutional Products</a>
            <a href="#" class="bkf-nav-item">Before & After</a>
            <a href="#" class="bkf-nav-item">What to Clean</a>
            <a href="#" class="bkf-nav-item">Cleaning Tips</a>
            <a href="#" class="bkf-nav-item">About Us</a>
            <a href="#" class="bkf-nav-item">Institutional Sales</a>
            <a href="#" class="bkf-nav-item"><i class="fas fa-search"></i></a>
        </div>
    </div>
    <img src="<?php echo get_theme_file_uri(); ?>/images/BarKeepersFriend_Logo.png" alt="" class="bkf-logo d-none d-lg-block">

    <!--hover boxes, show/hide by row-->
    <div class="row nav-hoverbox" id="nav-hoverbox-products">
        <div class="col-md-2">
            <a href="#">Powders</a>
            <hr>
            <ul>
                <li><a href="">Cleaning Product</a></li>
                <li><a href="">Cleaning Product</a></li>
                <li><a href="">Cleaning Product</a></li>
                <li><a href="">Cleaning Product</a></li>
                <li><a href="">Cleaning Product</a></li>
            </ul>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function($) {
        //show/hide nav tabs
        $("#nav-tab-home").click(function() {
            //console.log("in");
            $("#nav-tab-home").addClass("active");
            $("#nav-items-home").show();
            $("#nav-tab-inst").removeClass("active");
            $("#nav-items-inst").hide();
        });
        $("#nav-tab-inst").click(function() {
            //console.log("in");
            $("#nav-tab-home").removeClass("active");
            $("#nav-items-home").hide();
            $("#nav-tab-inst").addClass("active");
            $("#nav-items-inst").show();
        });

        //auto generate this with PHP once all pages are in place
        $("#nav-item-products").mouseenter(function() {
            $("#nav-hoverbox-products").show();
            $("#nav-hoverbox-products").mouseleave(function() {
                $(this).hide();
            });
            $(".container").mouseleave(function() {
                $("#nav-hoverbox-products").hide();
            });
        });
    });
</script>