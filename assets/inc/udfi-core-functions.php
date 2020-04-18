<?php 
/*
*
*	***** User Directory for Inpsyde *****
*
*	Core Functions
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

//create your rewrite rule
add_action( 'init', 'udfi_init' );
function udfi_init() {
     add_rewrite_rule('udfi/(\d*)$', 'index.php?page=udfi&udfi=$matches[1]', 'top');
}

// add udfi to the whitelist of variables it wordpress knows and allows
add_action( 'query_vars', 'udfi_query_vars' );
function udfi_query_vars( $query_vars )
{
    $query_vars[] = 'udfi';
    return $query_vars;
}

// If this is done, we can access it later
// This example checks very early in the process:
// if the variable is set, we include our page and stop execution after it
add_action( 'parse_request', 'udfi_parse_request' );
function udfi_parse_request( &$wp ){
    
    if ( array_key_exists( 'udfi', $wp->query_vars ) || $wp->query_vars['name'] == 'udfi') {
        include( dirname( __FILE__ ) . '/udfi-template.php' );
        exit();
    }
}
function get_users_from_jpt(){
    $response = wp_remote_get('https://jsonplaceholder.typicode.com/users');
    if($response['response']['code'] == 200) return json_decode($response['body'], true);
    return 'server error';
}
function get_user_from_jpt($id){
    $response = wp_remote_get('https://jsonplaceholder.typicode.com/users/'.$id);
    if($response['response']['code'] == 200) return json_decode($response['body'], true);
    return 'server error';
}
function makeList($array) {

    //Base case: an empty array produces no list
    if (!is_array($array)) return ": ".$array;

    //Recursive Step: make a list with child lists
    $output = '<ul>';
    foreach ($array as $key => $subArray) {
        // var_dump($subArray);
        $output .= '<li>' . $key . makeList($subArray) . '</li>';
    }
    $output .= '</ul>';

    return $output;
}