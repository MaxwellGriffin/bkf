<?php

require_once( 'post-type.php' );

final class BarkeepersFriendInstagram {
  
  const SCHEDULE_HOOK = 'bkf_instagram_fetch';
  
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


  public static function Init() {
    
    if ( ! wp_next_scheduled( BarkeepersFriendInstagram::SCHEDULE_HOOK ) ) {
      wp_schedule_event( time(), 'hourly', BarkeepersFriendInstagram::SCHEDULE_HOOK );
    }
    
    add_action( 'init', array( __CLASS__, 'ActionInit' ), 9999 );
    add_action( BarkeepersFriendInstagram::SCHEDULE_HOOK, array( __CLASS__, 'GetLatestInstagramPhotos' ) );
    
  }
  
  public static function ActionInit() {
    
    InstagramCustomPostType::Register();
    
  }
  
  private static function CreateResultObject( $photo ) {
    
    $result = new stdClass();
    $result->image = $photo[ 'media_url' ];
    $result->caption = $photo[ 'caption' ];
    $result->id = $photo[ 'id' ];
    $result->url = $photo[ 'permalink' ];
    $result->tags = array();
    $result->type = $photo[ 'media_type' ];
    $result->created = $photo[ 'timestamp' ];
    $result->created_datetime = new DateTime();
    $result->created_datetime->setTimestamp( strtotime( $result->created ) );
    
    // parse out all the tags from the caption
    preg_match_all( '/#(\w+)/', $result->caption, $matches );
    
    foreach ( $matches[ 1 ] as $match ) { $result->tags[] = strtolower( $match ); }
    
    // result info
    $result->message = '';
    $result->post_id = 0;
    
    return $result;
  }
  
  public static function GetLatestInstagramPhotos() {
  
    $token = get_option( 'facebook_access_token' );
    $endpoint = 'https://graph.facebook.com/17841401025686951/media?fields=media_url%2Ccaption%2Cmedia_type%2Ctimestamp%2Cid%2Cchildren%7Bmedia_type%2Cmedia_url%2Cpermalink%2Ctimestamp%7D%2Cpermalink&limit=1000&access_token=';
    
    $url = $endpoint . $token;
    
    $response = wp_remote_get( $url );
    
    if ( is_wp_error( $response ) ) {
      $results = new stdClass();
      $results->message = 'An error occurred getting Instagram feed.';
      return $results;
    }
    
    $body = json_decode( $response[ 'body' ], true );
    
    if ( isset( $body[ 'error' ] ) ) {
      $results = new stdClass();
      $results->message = $body[ 'error' ][ 'message' ];
      return $results;
    }
    
    $results = new stdClass();
    $results->total = 0;
    $results->inserts = 0;
    $results->failures = 0;
    $results->duplicates = 0;
    $results->posts = array();
    
    $results->body = $body;
    
    foreach ( $body[ 'data' ] as $photo ) {
      
      $result = BarkeepersFriendInstagram::CreateResultObject( $photo );
      
      BarkeepersFriendInstagram::AddInstagramPost( $results, $result );
      
      if ( isset( $photo[ 'children' ] ) ) {
        
        foreach ( $photo[ 'children' ][ 'data' ] as $child ) {
        
          // children don't have a caption set, so use the parent caption
          $child[ 'caption' ] = $photo[ 'caption' ];
          $result = BarkeepersFriendInstagram::CreateResultObject( $child );
          
          BarkeepersFriendInstagram::AddInstagramPost( $results, $result );
            
        }
        
      }
      
    }
    
    $results->total = count( $results->posts );

    return $results;
    
  }
  
  private static function AddInstagramPost( &$results, &$result ) {
    error_log(print_r($result,true));
    $new_post_title = 'Instagram Before & After ';
 
    if ( ( 'VIDEO' !== $result->type ) && ( in_array( 'bkffeatured', $result->tags )	 ) ) {
      
      $post_id = BarkeepersFriendInstagram::InstagramImageExists( $result->id );
      
      if ( ! $post_id ) {
        
        $title = $new_post_title . $result->created_datetime->format( 'm-d-Y' );
        
        $post = BarkeepersFriendInstagram::CreateNewInstagramPost( 
          $title, 
          $result->caption, 
          $result->image, 
          $result->id, 
          $result->url, 
          $result->tags, 
          $result->created_datetime->format( 'Y-m-d H:i:s' ) 
        );
        
        if ( $post->success ) {
          
          $result->message = 'Post created.';
          $result->post_id = $post_id;
          $results->inserts++;
          
        } else {
          
          $result->message = $post->message;
          $results->failures++;
          
        }
    
      } else {
        
        $result->message = 'Post already exists.';
        $result->post_id = $post_id;
        $results->duplicates++;
        
      }
      
      $results->posts[] = $result;
      
    }
    
  }
  
  private static function InstagramImageExists( $instagram_id ) {
    
    
    $query = InstagramCustomPostType::Query(
      array(
        'meta_key' => InstagramCustomPostType::META_INSTAGRAM_ID,
        'meta_value' => $instagram_id,
        'post_status' => 'any'
      )
    );
    
    return ( $query->found_posts > 0 ) ? $query->posts[ 0 ]->ID : false;
    
  }
  
  private static function CreateNewInstagramPost( $title, $caption, $image_url, $instagram_id, $instagram_url, $instagram_tags, $creation_date = null ) {
    
    $result = new stdClass();
    $result->success = false;
    $result->message = "";
    $result->post_id = 0;
    
    $attachment = BarkeepersFriendInstagram::InsertAttachmentFromURL( $image_url );
    
    if ( false === $attachment->success ) {
      $result->message = $attachment->message;
      return $result;
    }
    
    $post = array(
      'post_type' => InstagramCustomPostType::POST_TYPE,
      'post_title' => $title,
      'post_content' =>$caption,
      'post_date' => ( ! empty( $creation_date ) ) ? $creation_date : null
    );
    	
    $id = wp_insert_post( $post );
    
    if ( 0 === $id || is_wp_error( $id ) ) {
      $result->message = "Could not create WP post object.";
      return $result;
    }
    
    $result->success = true;
    $result->id = $id;
    
    wp_set_object_terms( $id, $instagram_tags, InstagramCustomPostType::TAGS_TAXONOMY, true );
    set_post_thumbnail( $id, $attachment->attachment_id );
    
    update_post_meta( $id, InstagramCustomPostType::META_INSTAGRAM_ID, $instagram_id );
    update_post_meta( $id, InstagramCustomPostType::META_INSTAGRAM_TAGS, $instagram_tags );
    update_post_meta( $id, InstagramCustomPostType::META_INSTAGRAM_URL, $instagram_url );
    
    return $result;
  }
  
  private static function InsertAttachmentFromURL( $url, $post_id = null, $title = null ) {

    $result = new stdClass();
    $result->success = false;
    $result->message = "";
    $result->attachment_id = 0;
    
    // heavily based on https://gist.github.com/m1r0/f22d5237ee93bcccb0d9
    
  	if( !class_exists( 'WP_Http' ) )
  		include_once( ABSPATH . WPINC . '/class-http.php' );
  
  	$http = new WP_Http();
  	$response = $http->request( $url );
  
  	if (  200 != $response[ 'response' ][ 'code' ] ) {
    	$result->message = $response[ 'response' ][ 'code' ] . ' : ' . $response[ 'response' ][ 'message' ];
  		return $result;
  	}
  	
  	$filename = basename( $url );
  	if ( strpos( $filename, '?' ) )
    	$filename = substr( $filename, 0, strpos( $filename, '?' ) );
  
  	$upload = wp_upload_bits( $filename, null, $response[ 'body' ] );
  	
  	if ( $upload[ 'error' ] ) {
    	$result->message = $upload[ 'error' ] . " ($filename)";
  		return $result;
  	}
  
  	$file_path = $upload[ 'file' ];
  	$file_name = basename( $file_path );
  	$file_type = wp_check_filetype( $file_name, null );
  	$attachment_title = ( ! empty( $title ) ) ? $title : sanitize_file_name( pathinfo( $file_name, PATHINFO_FILENAME ) );
  	$wp_upload_dir = wp_upload_dir();
  
  	$post_info = array(
  		'guid'				=> $wp_upload_dir[ 'url' ] . '/' . $file_name, 
  		'post_mime_type'	=> $file_type[ 'type' ],
  		'post_title'		=> $attachment_title,
  		'post_content'		=> '',
  		'post_status'		=> 'inherit',
  	);
  
  	// Create the attachment
  	$attach_id = wp_insert_attachment( $post_info, $file_path, $post_id );
  
  	// Include image.php
  	require_once( ABSPATH . 'wp-admin/includes/image.php' );
  
  	// Define attachment metadata
  	$attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );
  
  	// Assign metadata to attachment
  	wp_update_attachment_metadata( $attach_id,  $attach_data );
  
    $result->success = true;
    $result->attachment_id = $attach_id;
    
  	return $result;
  
  }
  
}
