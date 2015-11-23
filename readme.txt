=== HandL UTM Grabber ===
Contributors: haktansuren
Donate link: http://www.haktansuren.com/
Tags: utm,grabber,shortcodes,gclid
Requires at least: 3.0.1
Tested up to: 4.3.1
Stable tag: 4.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

HandL UTM Grabber is for getting the google UTM parameters (including gclid) and store it in cookies and then you can access within anywhere in WP

== Description ==

With this very simple yet useful plugin, you can capture UTM variables from URL and save it in browser's COOKIE and you can access the recorded UTM anywhere in the website with following shortcodes.

* [utm_campaign]
* [utm_source]
* [utm_term]
* [utm_content]
* [gclid]

This plugin is also very useful if you would like to pass UTM variables across different WP installs. You can do the following.

`<a href="www.destinationURL.com?utm_campaign=[utm_campaign]&utm_source=[utm_source]&utm_term=[utm_term]&utm_content=[utm_content]&gclid=[gclid]">Click Here To Go >>> </a>`

Or you can pass UTM variables to your form as hidden input. Make sure to switch HTML in editor before using the shortcodes. You will need to use different shortcodes for passing UTM and GCLID variables into the form as follows;

` [utm_campaign_i]<input type="hidden" name="utm_campaign" value="%s" />[/utm_campaign_i]`
` [utm_source_i]<input type="hidden" name="utm_source" value="%s" />[/utm_source_i]`
` [utm_term_i]<input type="hidden" name="utm_term" value="%s" />[/utm_term_i]`
` [utm_content_i]<input type="hidden" name="utm_content" value="%s" />[/utm_content_i] `
` [gclid_i]<input type="hidden" name="gclid" value="%s" />[/gclid_i] `

This is very useful for populating customer fields in emarketing tools via optin forms such as ActiveCampaign, Vero, Aweber etc.

Let me know if you have any question. Feel free to contact me if you have cool ideas and want me to implement :)


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `handl-utm-grabber` folder to the `/wp-content/plugins/` directory via FTP
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

*No question so far :)*

== Screenshots ==

1. It should look like this after install.

== Changelog ==

= 1.0 =
* Hello World :)

= 1.1 =
* Shortcodes changed to support form input
* World's most effective written code :)

== Upgrade Notice ==

= 1.0 =
HandL UTM Grabber's birthday :)
