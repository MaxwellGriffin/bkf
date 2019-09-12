<div class="mobile-search-box">
    <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="form-wrapper">
            <div class="input-wrapper">
                <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'twentyeleven'); ?>" />
            </div>
            <!-- <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'twentyeleven'); ?>" /> -->
            <button class="submit" type="submit" name="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>

<style>
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
    }

    .mobile-search-box input.field {
        width: 100%;
        height: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
</style>