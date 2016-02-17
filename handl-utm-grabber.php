<?php
/*
Plugin Name: HandL UTM Grabber
Plugin URI: http://www.haktansuren.com/wp-plugins/handl-utm-grabber
Description: This is for getting the google UTM parameters (including gclid) and store it in cookies and then you can access within anywhere your WP installs with shortcodes.
Author: Haktan Suren
Version: 1.2
Author URI: http://www.haktansuren.com/
*/

add_action('init', 'CaptureUTMs');
function CaptureUTMs(){
       
	$fields = array('utm_source','utm_medium','utm_term', 'utm_content', 'utm_campaign', 'gclid');
       
        $cookie_field = '';
	foreach ($fields as $id=>$field){
		if (isset($_GET[$field]) && $_GET[$field] != '')
			$cookie_field = $_GET[$field];
		elseif(isset($_COOKIE[$field]) && $_COOKIE[$field] != ''){ 
			$cookie_field = $_COOKIE[$field];
		}else{
			$cookie_field = '';
		}
		setcookie($field, $cookie_field , time()+60*60*24*30, '/' );
		$_COOKIE[$field] = $cookie_field;

		add_shortcode($field, create_function('',"return '$_COOKIE[$field]';"));
		add_shortcode($field."_i", create_function('$atts,$content,$field','return sprintf($content,$_COOKIE[str_replace("_i","",$field)]);'));
	}
}

?>
