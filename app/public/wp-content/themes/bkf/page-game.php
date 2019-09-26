<?php get_header(); ?>

<?php insert_nav(false); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <p>Name:</p>
            <input type="text" name="myname" placeholder="Name...">
            <p>Shape:</p>
            <select name="shape">
                <option value="square">Square</option>
                <option value="circle">Circle</option>
            </select>
            <p>Width (px):</p>
            <input type="number" name="width" placeholder="Width (px)...">
            <p>R:</p>
            <input type="number" name="color_r" placeholder="Red">
            <p>G:</p>
            <input type="number" name="color_g" placeholder="Green">
            <p>B:</p>
            <input type="number" name="color_b" placeholder="Blue">
            <div class="button-container">
                <button type="submit" id="play-button">Play</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="game-field">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const playerHP = 100;

    class Player {
        constructor(name, shape, width, cr, cg, cb, hp) {
            this.name = name;
            this.shape = shape;
            this.width = width;
            this.cr = cr;
            this.cg = cg;
            this.cb = cb;
            this.hp = hp;
        }

        spawn() {
            console.log("Spawning...");
            var myHtml = "<div id='player'></div>";

            jQuery(function($) {
                var game_field = $(".game-field");
                game_field.append(myHtml);
            });

            applyStyles();
        }

        applyStyles() {
            jQuery(function($) {
                var player = $("#player");
                player.height(this.width);
                player.width(this.width);
                if (this.shape == "circle") {
                    player.css("border-radius", this.width / 2 + "px");
                }
            })
        }
    }

    class Enemy {
        constructor(name, shape, width, cr, cg, cb, hp) {
            this.name = name;
            this.shape = shape;
            this.width = width;
            this.cr = cr;
            this.cg = cg;
            this.cb = cb;
            this.hp = hp;
        }
    }


    jQuery(function($) {
        $("#play-button").click(function() {
            console.log("Play button click...");
            var myPlayer = new Player("fun", "circle", "25", "255", "255", "255", "100");
            myPlayer.spawn();
        });

        $(document).click(function() {
            console.log("document click...");
        })
    });
</script>

<style>
    .game-field {
        height: 500px;
        width: 800px;
        border: 1px solid black;
        background-color: white;
    }

    #player {
        background-color: white;
        border: 0.5px solid black;
        display: inline-block;
        width: 25px;
        height: 25px;
        border-radius: 12.5px;
    }
</style>

<?php get_footer(); ?>