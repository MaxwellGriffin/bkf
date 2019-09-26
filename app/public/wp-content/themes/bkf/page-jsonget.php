<?php get_header(); ?>

<?php insert_nav(false); ?>

<?php
//get query vars
$name = $_GET['myname'];
$shape = $_GET['shape'];
$width = $_GET['width'];
$color_r = $_GET['color_r'];
$color_g = $_GET['color_g'];
$color_b = $_GET['color_b'];
?>

<div class="container">
    <div class="info">
        <h1>Info:</h1>
        <p>Name: <?php echo $name; ?></p>
        <p>Shape: <?php echo $shape; ?></p>
        <p>Width: <?php echo $width; ?>px</p>
        <p>Color: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> rgb(<?php echo $color_r . ', ' . $color_g . ', ' . $color_b; ?>)</p>
    </div>
    <div class="display">
        <h1>Result:</h1>
        <div class="shape-container">
            <div class="shape"></div>
        </div>
    </div>
</div>

<style>
    .info,
    .display {
        margin: 30px;
        padding: 30px;
        border: 3px outset steelblue;
        background-color: skyblue;
    }

    .info p {
        padding: 15px;
        border: 1px inset steelblue;
    }

    .info p span {
        background-color: rgb(255, 0, 0);
    }

    .display .shape-container {
        padding: 15px;
        border: 1px inset steelblue;
        text-align: center;
        background-color:white;
    }

    .display .shape {
        display: inline-block;
    }
</style>

<script type="text/javascript">
    jQuery(function($) {
        $(document).ready(function() {
            //get vars
            var myshape = "<?php echo $shape; ?>";
            var width = <?php echo $width; ?>;
            var color_r = <?php echo $color_r; ?>;
            var color_g = <?php echo $color_g; ?>;
            var color_b = <?php echo $color_b; ?>;
            //show output color
            var str_color = "rgb(" + color_r + ", " + color_g + ", " + color_b + ")";
            $(".info p span").css("background-color", str_color);
            //create our shape
            var shape = $(".shape");
            shape.css({
                "background-color": str_color,
                "width": width + "px",
                "height": width + "px",
            });
            //make the shape a circle (if applicable)
            if (myshape == "circle") {
                shape.css("border-radius", width / 2);
            }
        });
    });
</script>

<?php get_footer(); ?>