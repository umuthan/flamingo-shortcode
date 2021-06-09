=== Flamingo Shortcode ===
Contributors: umuthan
Donate link: http://umuthan.com/
Tags: flamingo, contact form 7, shortcode
Requires at least: 4.0
Tested up to: 5.7.2
Stable tag: 1.1.2
Requires PHP: 5.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Wordpress plugin for list messages from Flamingo (Contact Form 7) on pages or posts via shortcode

== Description ==

Flamingo Shortcode

Wordpress plugin for list messages from Flamingo (Contact Form 7) on pages or posts via shortcode

## Shortcode:

[flamingo-inbound-messages number='-1' form='all' head='no' fields='all' condition='no' order='desc' orderby='date']

### Shortcode Attributes:

**number**: number of messages to show (default: -1)
**form**: which formid to display (default: all)
**head**: table header (default: no) Sample: 'Name,Surname'
**fields**: which fields to display (default: all) Sample: 'your-name,your-surname'
**condition**: do you have any condition about fields (default: no) Sample:'your-name:=:A;your-surname:=:B'
**order**: messages order (default: desc)
**orderby**: messages order by (default: date)

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/flamingo-shortcode` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the shortcode described in this README

== Frequently Asked Questions ==

= What are the dependencies of this plugin? =

You must install Contact Form 7 and Flamingo to use this plugin.

== Screenshots ==

1. Shortcode on page editing
2. Shortcode on page

== Changelog ==

= 1.1.2 =
* fixed the error about showing the values that are coming from selectbox

= 1.1.1 =
* plugin tests on Wordpress 5.7.2

= 1.1.0 =
* condition attribute can be more than one condition

= 1.0.0 =
* shortcode defined

== Upgrade Notice ==

= 1.1.2 =
* fixed the error about showing the values that are coming from selectbox

= 1.1.1 =
* Done some plugin tests on Wordpress 5.7.2

= 1.1.0 =
* Condition attribute can be more than one condition

= 1.0.0 =
* Shortcode defined
