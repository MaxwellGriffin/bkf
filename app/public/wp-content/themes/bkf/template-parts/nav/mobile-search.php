<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="form-wrapper">
        <div class="input-wrapper">
            <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'twentyeleven'); ?>" />
        </div>
        <input type="submit" class="submit" name="submit" id="searchsubmit" value="Go" />
    </div>
</form>