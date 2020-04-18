<?php 
/*
*
*	***** User Directory for Inpsyde *****
*
*	Ajax Request
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
/*
Ajax Requests
*/
add_action( 'wp_ajax_udfi_get_user_details', 'udfi_get_user_details' );
add_action( 'wp_ajax_nopriv_udfi_get_user_details', 'udfi_get_user_details' );
function udfi_get_user_details(){	
    
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $user = get_user_from_jpt($id);
      wp_send_json(array('name'=> $user['name'], 'html'=> makeList($user)));
    } else {
      wp_send_json(array('name'=> 'Error', 'html'=> 'you should choose the correct one.'));
    } 

	wp_die();
}