=== Fake Pay For WooCommerce ===

Contributors: agraddy, Edited by Elias Turner
Author URI: https://sailextech.me
Plugin URI: https://github.com/sonicer105/wp-woo-fake-pay
Original Author URI: https://www.dashboardq.com
Original Plugin URI: https://github.com/agraddy/wp-woo-fake-pay
Requires PHP:  5.6
Requires at least: 4.0
Tested up to: 5.4.2
Tags: woocommerce, payment gateway, payment gateways, test, fake
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple pass-through WooCommerce payment gateway that can be used for testing orders with any account. Intended for use with test instalations only. DO NOT INSTALL ON PRODUCTION!

== Description ==

The WooCommerce Fake Pay plugin is a payment gateway for WooCommerce that allows any user to checkout without having to enter any payment information. Simply choose the "Fake Pay" payment option on checkout and it will process the order as if you had paid with a real payment gateway.

This plugin is useful for testing a WooCommerce checkout flow on a development sites. DO NOT INSTALL ON PRODUCTION!

== Installation ==

1. Upload wp-woo-fake-pay to the `/wp-content/plugins` directory.
2. Make WooCommerce is installed.
3. Login to the Wordpress admin panel and go to the the plugins page. On the plugins page, activate the WooCommerce Fake Pay plugin.
4. Navigate to the WooCommerce > Settings > Checkout > Fake Pay page.
5. Enable the Fake Pay payment gateway and press the "Save changes" button.
6. The Fake Pay payment gateway is now active for all users.

== Changelog ==

= 1.0.0 =
* Initial release

= 1.1.0 =
* Removed admin requirement