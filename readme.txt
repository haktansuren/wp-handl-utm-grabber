=== HandL UTM Grabber ===
Contributors: haktansuren
Donate link: https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=k3AguYxzB-opjMCsH9X-Y9OJ9swGFb3epjYvKAaRlX8J5TfdycaYkRGVzOq&dispatch=5885d80a13c0db1f8e263663d3faee8d6625bf1e8bd269586d425cc639e26c6a
Tags: utm,grabber,shortcodes,gclid
Requires at least: 3.0.1
Tested up to: 4.4.2
Stable tag: 4.4.2
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

**Support For Gravity Forms**

Simply create your field and assign the UTM shortcodes name above as *Paramater Name*. See screenshot for more.

**SPECIAL THANKS:** This plugin has been tested on various operating systems and browsers thanks to <a href='https://www.browserstack.com'>BrowserStack!</a> 

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `handl-utm-grabber` folder to the `/wp-content/plugins/` directory via FTP
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

*No question so far :)*

== Screenshots ==

1. It should look like this after install.
1. Gravity Form Support.

== Changelog ==

= 1.0 =
* Hello World :)

= 1.1 =
* Shortcodes changed to support form input
* World's most effective written code :)

= 1.2 =
* BugFix for https://wordpress.org/support/topic/contact-form-7-form-submission-hangs-when-utm-grabber-plugin-is-enabled (Thanks wpkmi)

= 1.3 =
* BugFix for https://wordpress.org/support/topic/handl-not-working (Thanks eddygbarrett)

= 1.4 =
* Gravity Forms support added - https://wordpress.org/support/topic/gravity-forms-45 (Thanks hashimwarren)

== Upgrade Notice ==

= 1.0 =
HandL UTM Grabber's birthday :)
