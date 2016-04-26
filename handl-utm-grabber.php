<?php
/*
Plugin Name: HandL UTM Grabber
Plugin URI: http://www.haktansuren.com/handl-utm-grabber
Description: The easiest way to capture UTMs on your (optin) forms.
Author: Haktan Suren
Version: 2.4
Author URI: http://www.haktansuren.com/
*/

add_filter('widget_text', 'do_shortcode');

add_action('init', 'CaptureUTMs');
function CaptureUTMs(){
       
	if (!isset($_COOKIE['handl_original_ref'])) 
		$_COOKIE['handl_original_ref'] = $_SERVER['HTTP_REFERER']; 

	if (!isset($_COOKIE['handl_landing_page'])) 
		$_COOKIE['handl_landing_page'] = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	
	if($_SERVER["HTTP_X_FORWARDED_FOR"] != "")
		$_COOKIE['handl_ip'] = $_SERVER["HTTP_X_FORWARDED_FOR"];
	else
		$_COOKIE['handl_ip'] = $_SERVER["REMOTE_ADDR"];
	
	$_COOKIE['handl_ref'] =  $_SERVER['HTTP_REFERER'];
	$_COOKIE['handl_url'] =  isset($_SERVER["HTTPS"]) ? 'https://' : 'http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];;
	
	$fields = array('utm_source','utm_medium','utm_term', 'utm_content', 'utm_campaign', 'gclid', 'handl_original_ref', 'handl_landing_page', 'handl_ip', 'handl_ref', 'handl_url');
       
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
		add_shortcode($field."_i", create_function('$atts,$content,$field','return sprintf($content,$_COOKIE[preg_replace("/_i$/","",$field)]);'));
		
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

function handl_admin_notice__success() {
    $field = 'check_v24_doc';
    if (!get_option($field)) :
    ?>
    <style>
    .handl-notice-dismiss{
	border-color: #ED494D;
	display: block;
	background-color: #FFF8D7;
    }
    
    .handl-notice-title{
	font-size: 24px;
    }
    
    .handl-notice-list li{
	float: left;
	margin-right: 20px;
    }
    
    .handl-notice-list li a{
	color: #ED494D;
    }
    
    .handl-notice-list:after{
	clear: both;
	content: "";
	display: block;
    }
    </style>
    <div class="notice notice-warning handl-notice-dismiss is-dismissible">
        <p class='handl-notice-title'>HandL UTM Grabber has some new features...</p>
	<ul class='handl-notice-list'>
		<li><span class="dashicons dashicons-clipboard"></span> <a href="http://www.haktansuren.com/handl-utm-grabber/?utm_medium=referral&utm_source=<?=$_SERVER["SERVER_NAME"]?>&utm_campaign=HandL+UTM+Grabber&utm_content=New+Features" target="_blank">Check out documentations</a></li>
		<li><span class="dashicons dashicons-sos"></span> <a href="https://wordpress.org/support/plugin/handl-utm-grabber" target="_blank">Get Some Help</a></li>
		<li><span class="dashicons dashicons-heart"></span> <a href="https://wordpress.org/support/view/plugin-reviews/handl-utm-grabber" target="_blank">Like Us!</a></li>
		<li><span class="dashicons dashicons-smiley"></span> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SS93TW4NEHHNG" target="_blank">Donate</a></li>
	</ul>
    </div>
    <script>
    jQuery(document).on( 'click', '.handl-notice-dismiss>.notice-dismiss', function() {
	
	jQuery.post(
		ajaxurl, 
		{
		    'action': 'handl_notice_dismiss',
		    'field':   '<?=$field;?>'
		}
	);
    
    })
    </script>
    <?php
    endif;
}
add_action( 'admin_notices', 'handl_admin_notice__success' );

function handl_notice_dismiss(){
	add_option( $_POST['field'], '1', '', 'yes' ) or update_option($_POST['field'], '1'); 
	die();
}
add_action( 'wp_ajax_handl_notice_dismiss', 'handl_notice_dismiss' );