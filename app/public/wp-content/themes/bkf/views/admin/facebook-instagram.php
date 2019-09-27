
<div class="wrap">
  <h1><?= __( 'Facebook/Instagram Integration', CHILD_THEME ); ?></h1>

  <div class="description">
    <img src="<?= CHILD_THEME_URL ?>/images/instagram-integration.jpg" />
    <p>
      For the Barkeepers Friend website to sort, tag, and display Instagram photos for end users to see, a Barkeepers Friend page manager must 
      connect their Instagram account to the website, via this Wordpress plugin.
    </p>
    <p>
      The importer is scheduled to run once an hour and sort any Instagram photo tagged with #bkbeforeandafter into the Before & After Photos
      in the Wordpress admin area. Those photos can then be added to the site in numerous ways.
    </p>
  </div>
  
  <fb:login-button id="login"
    scope="public_profile,email,ads_management,business_management,instagram_basic"
    onlogin="checkLoginState();">
  </fb:login-button>
  
  <button class="button-secondary" id="test" style="display: none;">Test</button>
  
  &nbsp;
  
  <button class="button-secondary" id="run" style="display: none;">Run Importer Now</button>
  
  &nbsp;
  
  <button class="button-primary" id="logout" style="display: none;">Logout</button>
  
  &nbsp;
  
  <span id="status"></span>
    
  <div id="output"></div>

  <!--
  <div id="spinner"
    style="
        background: #4267b2;
        border-radius: 5px;
        color: white;
        height: 40px;
        text-align: center;
        width: 250px;">
    Loading
    <div class="fb-login-button"
      data-max-rows="1"
      data-size="large"
      data-button-type="continue_with"
      data-use-continue-as="true"
      data-scope="public_profile,email,ads_management,business_management,instagram_basic"></div>
  </div>
  -->
  
</div>
