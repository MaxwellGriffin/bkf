
var FB;
var BKFInstagram = {
    
  CheckLoginStatus : function() {
    
    FB.getLoginStatus( function( response ) {
      
      if ( 'connected' === response.status ) {
      
        BKFInstagram.UpdateFBToken( response );
          
        jQuery( '#logout' ).show();
        jQuery( '#login' ).hide();
        jQuery( '#test' ).show();
        jQuery( '#run' ).show();
        
      } else {
        jQuery( '#login' ).show();
        jQuery( '#logout' ).hide();
        jQuery( '#test' ).hide();
        jQuery( '#run' ).hide();
      }
      
      console.log( response );
      
    } );
    
  },
  
  UpdateFBToken : function( response ) {
    
    jQuery.ajax( {
      url : ajaxurl + '?action=set_fb_token',
      method : 'POST',
      data : {
        auth : response.authResponse,
        token : response.authResponse.accessToken
      },
      dataType : 'json',
      success : function( response ) {
        console.log( response );
      },
      error : function( response ) {
        alert( 'There was an error connecting the site to Facebook.' );
      }
    } );
    
  },
  
  AddTestImage : function( item ) {
    
    if ( "VIDEO" !== item.media_type ) {
      var $img = jQuery( '<img />' ).attr( 'src', item.media_url );
      jQuery( '#output' ).append( $img );
    }
    
  },
  
  AddResultImage : function( item ) {
    
    if ( "VIDEO" !== item.type ) {
      var $img = jQuery( '<img />' ).attr( 'src', item.image );
      jQuery( '#output' ).append( $img );
    }
    
  }
  
};
  
(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

window.fbAsyncInit = function() {
  
  FB.init({
    appId      : '261998961180365',
    cookie     : true,
    xfbml      : true,
    version    : 'v3.2'
  });
    
  FB.AppEvents.logPageView();

  BKFInstagram.CheckLoginStatus();
};

jQuery( document ).ready( function( $ ) {
  
  $( '#logout' ).on( 'click', function() {
    FB.logout( function( response ) { location.reload(); } );
  } );
  
  $( '#update' ).on( 'click', BKFInstagram.UpdateFBToken );
  
  $( '#test' ).on( 'click', function() {
    
    $( '#status' ).html( 'Loading...' );
    $( '#output' ).html( '' );
          
    FB.api(
      '/17841401025686951/media',
      'GET',
      {"fields":"media_url,caption,media_type,timestamp,id,children{media_type,media_url}","limit":"100"},
      function( response ) {
          console.log(response);
          if ( response.error ) {
            $( '#status' ).html( 'Error : ' + response.error.message );
            return;
          }
          
          if (!response.data.length) {
            $( '#status').html( 'No data.' );
          }
          
          $.each( response.data, function( index, item ) {
            
            BKFInstagram.AddTestImage( item );
            
            if ( item.children ) {
              
              $.each( item.children.data, function( i, child ) {
                BKFInstagram.AddTestImage( child );
              } );
              
            }
            
            $( '#status' ).html( 'Success!' );
          } );
          
      }
    );

  } );
  
  $( '#run' ).on( 'click', function() {
    
    $( '#status' ).html( 'Running...' );
    $( '#output' ).html( '' );
    
    $.ajax( {
      url : ajaxurl + '?action=instagram_import',
      method : 'GET',
      success : function( response ) {
        $( '#status' ).html( 'Import complete. Processed ' + response.total + ' Instagram posts. Imported ' + response.inserts + '. ' + response.duplicates + ' were duplicates. ' + response.failures + ' failed importing.' );
        $.each( response.posts, function( index, item ) {
          BKFInstagram.AddResultImage( item );
        } );
      },
      error : function( response ) {
        $( '#status' ).html( 'Import did not complete fully. Likely this is do to the process taking too long. Trying running the importer again to complete the process.' );
        $( '#output' ).html( response );
      }
    } );
    
  } );

} );

// FB apparently wants this defined
var checkLoginState = BKFInstagram.CheckLoginStatus;