<?php
/*
Plugin Name: HandL UTM Grabber
Plugin URI: http://www.haktansuren.com/wp-plugins/handl-utm-grabber
Description: The easiest way to capture UTMs on your (optin) forms.
Author: Haktan Suren
Version: 2.1
Author URI: http://www.haktansuren.com/
*/

add_filter('widget_text', 'do_shortcode');

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
		
		//This is for Gravity Forms
		add_filter( 'gform_field_value_'.$field, create_function('',"return '$_COOKIE[$field]';") );
	}
}

function HandLAddJSinFooter(){
	wp_enqueue_script( 'js.cookie', plugins_url( '/js/js.cookie.js' , __FILE__ ), array( 'jquery' ) );
	$js = "
	<!-- HandL UTM Grabber Footer Script Start -->
	<script>
	jQuery(function($) {
		$.each([ 'utm_source','utm_medium','utm_term', 'utm_content', 'utm_campaign', 'gclid' ], function( i,v ) {
			$('input[name=\"'+v+'\"]').val(Cookies.get(v))
			$('input#'+v).val(Cookies.get(v))
			$('input.'+v).val(Cookies.get(v))
		});
	});
	</script>
	<!-- HandL UTM Grabber Footer Script End -->
	";
	print $js;
}
add_action( 'wp_footer', 'HandLAddJSinFooter' );

function handl_utm_grabber_enable_shortcode($val){
	return do_shortcode($val);
}
add_filter('salesforce_w2l_field_value', 'handl_utm_grabber_enable_shortcode');
add_filter( 'wpcf7_form_elements', 'handl_utm_grabber_enable_shortcode' );
?>
