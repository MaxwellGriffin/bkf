<?php
  
final class BarkeepersFriendAJAX {
  
  /**
   * Deny public instantiation
   */
  private function __construct() { }

  /**
   * Deny public cloning
   */
  private function __clone() { }


  public static function Init() {
    
    add_action( 'wp_ajax_set_fb_token', array( __CLASS__, 'SetFacebookToken' ) );
    
    add_action( 'wp_ajax_get_stores', array( __CLASS__, 'GetStores' ) );
    add_action( 'wp_ajax_nopriv_get_stores', array( __CLASS__, 'GetStores' ) );
    
    add_action( 'wp_ajax_instagram_import', array( __CLASS__, 'ImportInstagramPhotos' ) );
    add_action( 'wp_ajax_nopriv_instagram_import', array( __CLASS__, 'ImportInstagramPhotos' ) );
    
    add_action( 'wp_enqueue_scripts', array( __CLASS__, 'ActionWPEnqueueScripts' ) );
    
  }
  
  public static function SetFacebookToken() {
    
    $token = sanitize_text_field( $_POST[ 'token' ] );
    
    update_option( 'facebook_access_token', $token );
    
    $result = new stdClass();
    $result->token = $_POST[ 'token' ];
    $result->token_sanitized = $token;
    $result->tokens_validate = ( $token === $_POST[ 'token' ] );
    
    header('Content-Type: application/json');
    echo json_encode( $result );
    wp_die();
    exit();
  }
  
  public static function ActionWPEnqueueScripts() {
    
    wp_localize_script( CHILD_THEME, 'BKFSettings', self::GetJSONSettingsObject() );
    
  }
  
  private static function GetJSONSettingsObject() {
    
    $result = array(
      'AJAXURL' => admin_url( 'admin-ajax.php' )
    );
    
    return $result;
  }
  
  public static function GetStores() {
    
    $args = array(
      'orderby' => 'title',
      'order' => 'ASC',
      'posts_per_page' => -1,
      'meta_query' => array()
    );
    
    $result = new stdClass();
    
    $result->success = false;
    $result->host = $_SERVER['HTTP_HOST'];
    $result->state = sanitize_text_field( $_GET[ 'state' ] );
    $result->state_abbreviation = array_search( $result->state, StoreCustomPostType::STATES );
    $result->product = sanitize_text_field( $_GET[ 'product' ] );
    $result->list = array();
    
    if ( ( 'us' !== strtolower( $result->state ) ) && ( 'canada' !== strtolower( $result->state ) ) ) {
      
      $args[ 'meta_query' ][] = array(
          'key' => StoreCustomPostType::META_STATES,
          'value' => '"' . $result->state_abbreviation . '"',
          'compare' => 'like'
        );
      
    } else if ( 'canada' === strtolower( $result->state ) ) {
      
      $args[ 'meta_query' ][] = array(
          'key' => StoreCustomPostType::META_CANADA,
          'value' => 'on'
        );
      
    }
    
    if ( ( 'retailers' !==  strtolower( $result->product ) ) && ( 'distributors' !== strtolower( $result->product ) ) ) {
      
      $args[ 'meta_query' ][] = array(
          'key' => StoreCustomPostType::META_PRODUCTS,
          'value' => '"' . $result->product . '"',
          'compare' => 'like'
        );

    } else if ( 'distributors' === strtolower( $result->product ) ) {
      
      $args[ 'meta_query' ][] = array(
          'key' => StoreCustomPostType::META_DISTRIBUTOR,
          'value' => 'on'
        );
      
    } else {
      
      $args[ 'meta_query' ][] = array(
          'key' => StoreCustomPostType::META_DISTRIBUTOR,
          'value' => 'off'
        );
      
    }
    
    $stores = StoreCustomPostType::Query( $args );
    
    if ( $stores->have_posts() ) : while ( $stores->have_posts() ) : $stores->the_post();
    
      $title = get_the_title();
      $url = get_post_meta( get_the_id(), StoreCustomPostType::META_URL, true );
      $phone = get_post_meta( get_the_id(), StoreCustomPostType::META_PHONE, true );
      
      $result->list[] = '<li><a href="' . $url . '" title="' . esc_attr( $title ) . '" target="_blank">' . $title . '</a></li>';
      
    endwhile; $result->success = true; endif;
    
    header('Content-Type: application/json');
    echo json_encode( $result );
    wp_die();
    exit();
    
  }
  
  public static function ImportInstagramPhotos() {
    
    $result = BarkeepersFriendInstagram::GetLatestInstagramPhotos();
    
    header('Content-Type: application/json');
    echo json_encode( $result );
    wp_die();
    exit();
    
  }
  
}