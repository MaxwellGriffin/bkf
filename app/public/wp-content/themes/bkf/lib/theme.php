<?php

final class BarkeepersFriend {

  /**
   * Deny public instantiation
   */
  private function __construct() { }

  /**
   * Deny public cloning
   */
  private function __clone() { }

  public static function Init() {
  
    add_action( 'admin_enqueue_scripts', array( __CLASS__, 'ActionAdminEnqueueScripts' ) );
    add_action( 'admin_menu', array( __CLASS__, 'ActionAdminMenu' ), 105 );
    
  }
  
  public static function ActionAdminEnqueueScripts( $hook ) {
    
    if ( 'instagram_page_bkf-facebook-instagram' == $hook ) {
      wp_enqueue_script( CHILD_THEME . "-$hook", CHILD_THEME_URL . '/js/admin/facebook-instagram.js', array( 'jquery' ), CHILD_THEME_VERSION );
      wp_enqueue_style( CHILD_THEME . "-$hook", CHILD_THEME_URL . '/css/admin/facebook-instagram.css', null, CHILD_THEME_VERSION );
    }
    
  }
  
  public static function ActionAdminMenu() {
    
    add_submenu_page( '/edit.php?post_type=instagram', __( 'Import', CHILD_THEME ), __( 'Import', CHILD_THEME ), 'administrator', CHILD_THEME . '-facebook-instagram', array( __CLASS__, 'AdminMenuFacebookInstagram' ) );

  }

  public static function AdminMenuFacebookInstagram() {
    include CHILD_THEME_DIR . '/views/admin/facebook-instagram.php';
  }
  
}