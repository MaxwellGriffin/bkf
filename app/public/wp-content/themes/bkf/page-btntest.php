<?php get_header(); ?>

<?php insert_nav(false); ?>

<div class="container">
    <div class="big-fucking-box">
        <div class="floating-card-wrapper">
            <div class="floating-card-down fun">
                <h4>Down start</h4>
                <p>A short description paragraph.</p>
                <a href="#">Link</a>
            </div>
        </div>
        <div class="floating-card-wrapper">
            <div class="floating-card-mid fun">
                <h4>Mid start</h4>
                <p>A short description paragraph.</p>
                <a href="#">Link</a>
            </div>
        </div>
        <div class="floating-card-wrapper">
            <div class="floating-card-up fun">
                <h4>Up start</h4>
                <p>A short description paragraph.</p>
                <a href="#">Link</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="big-fucking-box">
        <div class="inset-wrapper">
            <div class="inset">
                <h4>Inset</h4>
                <p>A short description paragraph.</p>
                <a href="#">Link</a>
            </div>
        </div>
        <div class="inset-wrapper-2">
            <div class="inset">
                <h4>Inset 2</h4>
                <p>A short description paragraph.</p>
                <a href="#">Link</a>
            </div>
        </div>
        <div class="inset-wrapper-3">
            <div class="inset">
                <h4>Inset 3</h4>
                <p>A short description paragraph.</p>
                <a href="#">Link</a>
            </div>
        </div>
    </div>
</div>

<style>
    .inset-wrapper-3 {
        display: inline-block;
        margin: 0 auto;
    }

    .inset-wrapper-3 .inset {
        border: 1px outset gray;
        border-radius: 4px;
        padding: 20px;
        cursor: pointer;
        /* transition: all 0.1s ease-in-out; */
    }

    .inset-wrapper-3 .inset:hover {
        border: 3px outset gray;
        padding: 18px;
    }

    .inset-wrapper-3 .inset:active {
        border: 5px inset gray;
        /* background-color: lightgray; */
        padding: 16px;
    }

    .inset-wrapper-2 {
        display: inline-block;
        margin: 0 auto;
    }

    .inset-wrapper-2 .inset {
        border: 1px solid gray;
        border-radius: 4px;
        padding: 20px;
        cursor: pointer;
        transition: all 0.1s ease-in-out;
    }

    .inset-wrapper-2 .inset:hover {
        box-shadow: inset 0px 0px 5px 1px black;
    }

    .inset-wrapper-2 .inset:active {
        box-shadow: inset 0px 0px 10px 1px black;
        background-color: lightgray;
    }

    .inset-wrapper {
        display: inline-block;
        margin: 0 auto;
        height: 150px;
        width: 300px;
        border: 0.5px solid gray;
        overflow: hidden;
        position: relative;
        border-radius: 4px;
        /* background-color: #404040; */
        background-color: gray;
        /* background-color: white; */
        /* background-image: linear-gradient(to bottom right, gray, black); */
    }

    .inset-wrapper:hover {
        border-width: 1px;
    }

    .inset-wrapper .inset {
        position: absolute;
        display: inline-block;
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        padding: 20px;
        transition: all 50ms ease-in-out;
        background-color: white;
        cursor: pointer;
        border: 0.5px solid gray;
        border-radius: 4px;
    }

    .inset-wrapper .inset:hover {
        border-width: 1px;
        top: 2.5px;
        left: 2.5px;
        box-shadow: inset 0px -10px 10px -10px black, inset -10px 0px 10px -10px black;
    }

    .inset-wrapper .inset:active {
        border-width: 1px;
        top: 5px;
        left: 5px;
        box-shadow: inset 0px -10px 15px -10px black, inset -10px 0px 15px -10px black;
    }

    .big-fucking-box {
        margin: 200px 0;
        text-align: center;
        display: flex;
    }

    .floating-card-wrapper {
        display: inline-block;
        /* background-color: lightblue; */
        /* border: 5px outset blue; */
        margin-left: auto;
        margin-right: auto;
    }

    .fun {
        border: 1px solid gray;
        display: inline-block;
        padding: 20px;
        border-radius: 4px;
    }

    /* important stuff */
    .floating-card-down {
        display: inline-block;
        /* fully down */
        margin-top: 5px;
        margin-bottom: 1px;
        margin-left: 5px;
        margin-right: 1px;
        /* box-shadow: 1px 1px 5px 1px black; */
    }

    .floating-card-down:hover {
        /* fully up */
        margin-top: 1px;
        margin-bottom: 5px;
        margin-left: 1px;
        margin-right: 5px;
        box-shadow: 5px 5px 5px 0px black;
    }

    .floating-card-down:active {
        /* midpoint */
        margin-top: 3px;
        margin-bottom: 3px;
        margin-left: 3px;
        margin-right: 3px;
        box-shadow: 3px 3px 5px 0px black;
    }

    /* alternate */
    .floating-card-mid {
        margin-top: 3px;
        margin-bottom: 3px;
        margin-left: 3px;
        margin-right: 3px;
        box-shadow: 3px 3px 5px 0px black;
    }

    .floating-card-mid:hover {
        margin-top: 1px;
        margin-bottom: 5px;
        margin-left: 1px;
        margin-right: 5px;
        box-shadow: 5px 5px 5px 0px black;
    }

    .floating-card-mid:active {
        margin-top: 5px;
        margin-bottom: 1px;
        margin-left: 5px;
        margin-right: 1px;
        /* box-shadow: 1px 1px 5px 0px black; */
        box-shadow: none;
    }

    .floating-card-up {
        margin-top: 1px;
        margin-bottom: 5px;
        margin-left: 1px;
        margin-right: 5px;
        box-shadow: 5px 5px 5px 0px black;
    }

    .floating-card-up:hover {
        margin-top: 3px;
        margin-bottom: 3px;
        margin-left: 3px;
        margin-right: 3px;
        box-shadow: 3px 3px 5px 0px black;
    }

    .floating-card-up:active {
        margin-top: 5px;
        margin-bottom: 1px;
        margin-left: 5px;
        margin-right: 1px;
        /* box-shadow: 1px 1px 5px 0px black; */
        box-shadow: none;
    }
</style>

<?php get_footer(); ?>