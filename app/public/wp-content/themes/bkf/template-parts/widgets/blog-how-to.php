<?php
// setup
$mypod = pods('blog_how_to_control_panel');
$myitems = $mypod->field('my_items');
?>
<div class="mycarousel-wrapper bg-papyrus">
    <div class="container">
        <h3>Spring Cleaning is Faster With Friends</h3>
        <div class="mycarousel-button-container">
            <div class="mycarousel-container">
                <div class="mycarousel-window">
                    <?php
                    for ($i = 0; $i < count($myitems); $i++) {
                        include(locate_template('template-parts/widgets/blog-how-to-item.php', false, false));
                    }
                    ?>
                </div>
            </div>
            <div class="mycarousel-button left"><i class="fas fa-chevron-left"></i></div>
            <div class="mycarousel-button right"><i class="fas fa-chevron-right"></i></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(function($) {
        // set up vars
        var numSlides = $(".mycarousel-item").length;
        var half = Math.floor(numSlides / 2);
        var upperLimit = numSlides - half;
        var lowerLimit = upperLimit - numSlides;
        // if (numSlides % 2 == 0) {
        upperLimit--;
        // }
        console.log("Lower Limit = " + lowerLimit);
        console.log("Upper Limit = " + upperLimit);
        // clone id
        var cloneID = 0;
        var multiplier = 320;

        $(document).ready(function() {
            // set up carousel items
            var tempItems = new Array();
            for (var i = 0; i < numSlides; i++) {
                // add items to array
                tempItems.push(new CarouselItem(i, i));
            }
            // create carousel
            var myCarousel = new Carousel(tempItems);
            myCarousel.sort();
            // next button functionality
            $(".mycarousel-button").click(function() {
                console.log("next button click");
                myCarousel.next();
            });
        });

        class CarouselItem {
            constructor(id, pos) {
                this.id = id;
                this.pos = pos;
                this.element = $("#citem-" + id);
                this.willRestart = false;
            }
            increment() {
                this.setPos();
                if (this.willRestart) {
                    this.restart();
                } else {
                    this.changePos();
                }
            }
            setPos() {
                // set pos for next update
                if (this.pos == upperLimit) {
                    this.willRestart = true;
                    this.pos = lowerLimit;
                } else {
                    this.pos++;
                }
            }
            changePos() {
                this.element.removeClass("active");
                // set new offset
                var offset = multiplier * this.pos;
                // this.element.css("right", offset + "px");
                this.element.css({
                    'right': offset + 'px',
                    'opacity': 1,
                    'background-color': 'white',
                    'z-index': 1,
                })

                if (this.pos == 0) {
                    this.element.addClass("active");
                }
                // update text
                // this.element.find("p").text("ID = " + this.id);
                // this.element.find("span").text("POS = " + this.pos);
            }
            restart() {
                //create clone element and fade it out (& assign unique clone id)
                this.element.clone().attr("id", "clone" + cloneID).appendTo(".mycarousel-window");
                var clone = $("#clone" + cloneID);
                cloneID++;
                var currentPos = parseInt(clone.css("right"));
                var newPos = currentPos + multiplier;
                console.log("current pos = " + currentPos);
                console.log("new pos = " + newPos);
                clone.css({
                    'right': newPos + 'px',
                    'opacity': 0,
                    // 'background-color':'green',
                });
                setTimeout(function() {
                    clone.remove();
                }, 500);

                //change position of this element and fade it in
                this.element.addClass("notransition");
                setTimeout(() => {
                    newPos = (lowerLimit - 1) * multiplier;
                    newPos += "px";
                    this.element.css({
                        'right': newPos,
                        // 'background-color': 'red',
                        'opacity': 0,
                        'z-index': -1,
                    });
                    setTimeout(() => {
                        //add transition back
                        this.element.offsetHeight;
                        this.element.removeClass('notransition');
                        setTimeout(() => {
                            this.changePos();
                            this.willRestart = false;
                            console.log("hi");
                        }, 1);
                    }, 50); //timeout on this function must be at least 50ms or animation breaks
                }, 1);
            }
        }

        class Carousel {
            constructor(myItems) {
                this.myItems = myItems;
                this.amt = myItems.length;
            }
            sort() {
                //adjust position vars
                for (var i = 0; i < this.amt; i++) {
                    this.myItems[i].pos = i - half;
                }
                //apply positions
                for (var i = 0; i < this.amt; i++) {
                    this.myItems[i].changePos();
                }
            }
            next() {
                //change positions
                for (var i = 0; i < this.amt; i++) {
                    this.myItems[i].increment();
                }
            }
            init() {

            }
        }
    });
</script>

<style>
    /*
======================================================================================================================================================================
Blog How To Widget
*/

    @media(max-width:768px) {}

    .mycarousel-wrapper {
        box-shadow: var(--bs-inset-top-bottom);
        /* padding: 0px; */
        padding: 50px 0;
        margin: 50px 0;
    }

    .mycarousel-wrapper h3 {
        margin-bottom: 50px;
    }

    .mycarousel-container {
        /* border: 3px solid red; */
        position: relative;
        text-align: center;
        overflow: hidden;
        padding:15px 0;
    }

    .mycarousel-container .mycarousel-window {
        /* border: 3px solid green; */
        display: inline-block;
        /* padding-bottom: 100%; */
        position: relative;
        width: 300px;
        height: 300px;
    }

    .mycarousel-container .mycarousel-window .mycarousel-item {
        background-color: white;
        border: 1px solid #E7E7E7;
        /* border: 1px solid gray; */
        border-radius: 4px;
        padding: 30px;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        transition: all 500ms ease;
        opacity: 1;
        z-index: 1;
        cursor: pointer;
    }

    .mycarousel-container .mycarousel-window .mycarousel-item.active {
        box-shadow: var(--bs-general-shadow);
    }

    .mycarousel-container .mycarousel-window .mycarousel-item img {
        /* width: 50%;
        height: auto; */
        height: 150px;
        width: auto;
    }

    .mycarousel-container .mycarousel-window .mycarousel-item p {
        margin-top: 10px;
        color: var(--blue);
    }

    .mycarousel-container .mycarousel-window .mycarousel-item span {
        color: var(--green);
        position: absolute;
        bottom: 30px;
        display: block;
        text-align: center;
        width: 240px;
    }

    .mycarousel-container .mycarousel-window .mycarousel-item:hover span {
        text-decoration: underline;
    }

    .mycarousel-container .mycarousel-window .mycarousel-item a:hover {
        text-decoration: none;
    }

    @media(min-width:769px) {
        .mycarousel-wrapper {
            padding: 50px;
        }
    }

    .notransition {
        -o-transition: none !important;
        -ms-transition: none !important;
        -moz-transition: none !important;
        -webkit-transition: none !important;
        transition: none !important;
    }

    .mycarousel-button {
        height: 55px;
        width: 55px;
        border-radius: 27.5px;
        display: inline-block;
        background-color: var(--blue);
        cursor: pointer;
        font-size: 36px;
        color: white;
        text-align: center;
        position: absolute;
        z-index: 2;
        top: 50%;
        transform: translateY(-50%);
        box-shadow:var(--bs-general-shadow);
        transition:all 0.1s ease;
    }

    .mycarousel-button:active{
        box-shadow:none;
    }

    .mycarousel-button.left {
        left: -25px;
    }

    .mycarousel-button.right {
        right: -25px;
    }

    .mycarousel-button-container {
        position: relative;
    }
</style>