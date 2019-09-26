<?php get_header(); ?>

<?php insert_nav(false); ?>

<div class="container">
    <form action="/jsonget">
        <div class="json-input-wrapper">
            <span>Name:</span>
            <input type="text" name="myname" placeholder="Name...">
        </div>
        <div class="json-input-wrapper">
            <span>Shape:</span>
            <select name="shape">
                <option value="square">Square</option>
                <option value="circle">Circle</option>
            </select>
        </div>
        <div class="json-input-wrapper">
            <span>Width (px):</span>
            <input type="number" name="width" placeholder="Width (px)...">
        </div>
        <div class="json-input-wrapper">
            <span>R:</span>
            <input type="number" name="color_r" placeholder="Red">
        </div>
        <div class="json-input-wrapper">
            <span>G:</span>
            <input type="number" name="color_g" placeholder="Green">
        </div>
        <div class="json-input-wrapper">
            <span>B:</span>
            <input type="number" name="color_b" placeholder="Blue">
        </div>
        <div class="button-container">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

<style>
form{
    margin:30px;
    padding:30px;
    border: 3px outset goldenrod;
    background-color:antiquewhite;
}

.json-input-wrapper{
    border: 1px inset goldenrod;
    padding: 15px;
    margin-bottom:30px;
}

.json-input-wrapper span{
    display:inline-block;
}

.json-input-wrapper input, .json-input-wrapper select{
    display:inline-block;
    float:right;
    width:50%;
}

.button-container{
    text-align:center;
    border: 1px inset goldenrod;
    padding:15px;
    margin-left:30%;
    margin-right:30%;
}
</style>

<?php get_footer(); ?>