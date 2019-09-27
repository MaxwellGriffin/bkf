<?php
  
/*
 * WordPress custom post type for 
 * 
 * @license All rights reserved
 * @version 1.0
 *
 * @package 
 */

final class InstagramCustomPostType {

  const POST_TYPE = "instagram";
  const SINGULAR = "Before & After Photo";
  const PLURAL = "Before & After Photos";
  const SLUG = "before-and-after-photos";
  
  const TAGS_TAXONOMY = "instagram-tags";

  // Meta values that start with underscores will not show up
  // in the wordpress "Custom Fields" edit post screen 
  const META_INSTAGRAM_ID = "_instagram_id";
  const META_INSTAGRAM_TAGS = "_instagram_tags";
  const META_INSTAGRAM_URL = "_instagram_url";

  private static $is_registered = false;

  /**
   * Deny instantiation
   */
  private function __construct() {

  }

  /**
   * Deny cloning
   */
  private function __clone() {

  }

  /**
   * @returns WP_Query
   */
  public static function Query( $args = array() ) {

    $init_args = array(
        "post_type" => self::POST_TYPE,
        "posts_per_page" => 10
    );
    
    if ( is_array( $args ) )
      $init_args = $args + $init_args;
    
    return new WP_Query( $init_args );
  }
  
  public static function ByTag( $tag ) {
    
    $query = InstagramCustomPostType::Query( array(
      'posts_per_page' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => self::TAGS_TAXONOMY,
          'field' => 'slug',
          'terms' => $tag
        )
      )
    ) );
    
    return $query;
  }

  /**
   * Full registers the custom post type and its taxonomy with WordPress. The
   * custom post type is only registered on the first call. Subsequent calls
   * do nothing.
   */
  public static function Register() {

    // Check if the post type is built ahead of time
    // by some plugin like Pods
    if (post_type_exists( self::POST_TYPE )) {
      self::$is_registered = true;
    }
       
    if ( !self::$is_registered ) {

      self::InitPostType();
      self::InitTaxonomy();

      add_action( "manage_" . self::POST_TYPE . "_posts_columns", array( __CLASS__, "ActionManagePostsColumns" ) );
      add_action( "manage_" . self::POST_TYPE . "_posts_custom_column", array( __CLASS__, "ActionManagePostsCustomColumn" ), 10, 2 );
      
      self::$is_registered = true;
      
    }

  }
  
  /**
   * Initializes and registers the post type with WordPress
   */
  private static function InitPostType() {

    $labels = array(
      "name" => _x( self::PLURAL, "post type general name" ),
      "singular_name" => _x( self::SINGULAR, "post type singular name" ),
      "add_new" => _x( "Add New", "post item" ),
      "add_new_item" => __( "Add New " . self::SINGULAR ),
      "edit_item" => __( "Edit " . self::SINGULAR ),
      "new_item" => __( "New " . self::SINGULAR ),
      "view_item" => __( "View " . self::SINGULAR ),
      "search_items" => __( "Search " . self::PLURAL ),
      "not_found" =>  __( "No " . self::PLURAL . " found" ),
      "not_found_in_trash" => __( "No " . self::PLURAL . " found in Trash" ),
      "parent_item_colon" => ""
    );

    $args = array(
      "labels" => $labels,
      "public" => true,
      "publicly_queryable" => true,
      "exclude_from_search" => false,
      "has_archive" => true,
      "show_ui" => true,
      "query_var" => true,
      "menu_icon" => null,
      "menu_position" => null,
      "rewrite" => array(
        "slug" => self::SLUG, 
        "with_front" => false, 
        "feeds" => true, 
        "pages" => false
      ),
      "capabilities" => array(
        "publish_posts" => "administrator",
        "edit_posts" => "administrator",
        "edit_others_posts" => "administrator",
        "delete_posts" => "administrator",
        "delete_others_posts" => "administrator",
        "read_private_posts" => "administrator",
        "edit_post" => "administrator",
        "delete_post" => "administrator",
        "read_post" => "administrator",
      ),
      "hierarchical" => false,
      "supports" => array( "title", "editor", "excerpt", "thumbnail", "revisions" )
    );

    register_post_type( self::POST_TYPE, $args );

  }

  /**
   * Initializes a custom taxonomy for this custom post type.
   */
  private static function InitTaxonomy() {

    register_taxonomy(
      self::TAGS_TAXONOMY,
      array( self::POST_TYPE ),
      array(
        "hierarchical" => false,
        "label" => "Tags",
        "singular_label" => "Tag",
        "rewrite" => true
      )
    );

  }
  
  public static function ActionManagePostsColumns( $columns ) {
    
    $columns[ 'instagram-tags' ] = 'Tags';
    
    return $columns;
  }
  
  public static function ActionManagePostsCustomColumn( $column, $id ) {
    
    switch ( $column ) {
    
      case 'instagram-tags':
        $tags = get_the_term_list( $id, self::TAGS_TAXONOMY, '', ', ', '' );
        echo ( is_string( $tags ) ) ? $tags : '(None)';
        break;
          
    }
    
  }
  
}