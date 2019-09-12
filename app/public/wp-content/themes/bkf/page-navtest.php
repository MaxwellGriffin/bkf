<?php get_header(); ?>

<?php
$args = array(
    'theme_location' => 'mobile_header_menu_location',
    'walker' => new BKF_Mobile_Nav_Walker()
);
echo "<nav class='nav-mobile'>";
wp_nav_menu($args);
echo "</nav>";
?>

<style>
    /* nav.nav-mobile {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 999;
        background-color: white;
    }

    nav.nav-mobile .menu {
        width: 100%;
        display: block;
        margin-bottom: 0;
        padding-left: 0;
    }

    nav.nav-mobile .menu li {
        display: block;
        padding: 15px 30px;
        border: 1px solid var(--blue);
    }

    nav.nav-mobile .menu li.menu-item-has-children {
        background-color: gray;
    }

    nav.nav-mobile .menu li.menu-item-has-children:after {
        content: ">";
        text-align: right;
        float: right;
    }

    nav.nav-mobile .sub-menu {
        position: absolute;
        background-color: white;
        display: block;
        width: 100%;
        height: 100%;
        right: -100%;
        top: 0;
        transition: right 0.2s ease-in-out;
        margin-bottom: 0;
        padding-left: 0;
    }

    nav.nav-mobile .sub-menu.active {
        right: 0;
    }

    nav.nav-mobile .sub-menu .sub-menu {
        position: relative;
        top: auto;
        background-color: auto;
        border: none;
        display: block;
        padding-left: 0px;
        margin-right: 20px;
    }

    nav.nav-mobile .sub-menu li {
        margin: auto;
    }

    nav.nav-mobile .sub-menu li:after {
        content: "";
    }

    nav.nav-mobile .sub-menu li.menu-item-has-children {
        background-color: white;
    }

    nav.nav-mobile .sub-menu li.menu-item-has-children:after {
        content: "";
    }

    nav.nav-mobile .sub-menu .sub-menu li {
        display: block;
    } */
</style>

<script type="text/javascript">
    jQuery(function($) {
        $("nav.nav-mobile .menu li.menu-item-has-children").click(function() {
            $(this).children("ul").addClass("active");
        });
    });
</script>

<?php get_footer(); ?>