=== Caddy - Smart Side Cart for WooCommerce ===
Author: Tribe Interactive
Author URI: https://www.usecaddy.com
Contributors: tribeinteractive, kakshak, mvalera
Tags: caddy, woocommerce, woo, cart, side cart, sticky cart, cart notices, popup cart, woocommerce cart, shopping cart, mini-cart, floating cart
Requires at least: 5.0
Tested up to: 6.0.2
Requires PHP: 7.0
Stable tag: v1.9.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A high performance, conversion-boosting side cart for your WooCommerce store that improves your store’s shopping experience & helps grow your sales.

== Description ==

**[Caddy](https://www.usecaddy.com/)** is a **high performance, conversion-boosting side cart for your WooCommerce store** that improves your store’s shopping experience & helps grow your sales. 

**Increase average order sizes** with Caddy's built-in product recommendations, **reduce cart abandonment** with a free shipping meter, and **encourage repeat shoppers** with a saved product list.

⚡️ **Optimized for performance**
📱 **Mobile friendly - Works beautifully across all devices**
🌏 **Translation ready**
⚔️ **Cross-browser and cross-OS battle tested**

**[Try the Demo](https://demo.usecaddy.com/)** | **[Visit usecaddy.com](https://www.usecaddy.com/)** | **[Upgrade to Premium](https://www.usecaddy.com/)**

= Features included free: =

* Add an (ajax powered) sticky side cart across your whole site
* Let customers add products & manage their cart items without reloading the page
* Let customers manage cart quantities in the side cart
* Let customers remove items from the side cart
* Show a sticky floating cart button with a cart quantity indicator
* Let customers add coupons in the side cart
* Show a free shipping meter in the side cart that lets customers know when they qualify for free shipping
* Show product up-sell recommendations when customers add products to their cart
* Let customers save products for later
* Add cart and saved list links to your navigation menu (short codes + widgets)
* Add save for later buttons on product pages
* Add custom CSS to set your own styles and match your brand

== Upgrade to Premium ==

Upgrade to premium and unlock more powerful add-ons, customization and styling features.

= Premium features: =

* Ability to change the cart icon
* Ability to change the cart bubble position on the screen
* Display notices when adding to cart or adding/removing saved products
* Promote custom coupon offers in the cart
* Customize all Caddy colors
* Set free shipping meter exclusions
* Set product recommendation exclusions
* Show save for later buttons on shop archives
* Manage placement of save for later buttons on shop archives
* Customize the welcome message to new users
* Hide Caddy on some pages
* Hide out of stock products from product recommendations
* Get priority email support
* Get early access to new features

**Get premium:** [https://www.usecaddy.com/](https://www.usecaddy.com/)

= Premium Add-ons: =
[Announcements Bar Add-On](https://usecaddy.com/products/announcements-bar-add-on) - Display an announcement text bar at the top of the cart.
[Google Analytics Add-On](https://usecaddy.com/products/google-analytics-add-on) - Track how users interact within Caddy using enhanced e-commerce event tracking for Google Analytics.

== Installation ==

Important: You must download and activate the WooCommerce plugin, before using Caddy.

= Install Caddy from within WordPress =
1. Visit the plugins page within your dashboard and click the 'Add New' button.
2. Search for 'Caddy for WooCommerce'.
3. Click the install button.
4. Click the activate button.
5. Find the 'Caddy' menu within your dashboard and change your plugin settings.

== Frequently Asked Questions ==

= How do I add the Caddy cart icon & link to my menu or header? =

Search for the "Caddy Cart" widget and add it to your header. 

Or, you can use our included shortcodes using the [Shortcodes in Menus](https://wordpress.org/plugins/shortcode-in-menus/) plugin and then adding the following Caddy shortcodes:
\[cc_saved_items text='Saves' icon='yes'\]
\[cc_cart_items text='Cart' icon='yes'\]

The "text" value is the text that you want to appear in your menu.
The "icon" value (yes or no) will display a heart icon for the "Saves" link and a cart icon for the "Cart" link

= Does Caddy work with multisite? =

Yes.

= Can I translate Caddy? =

Absolutely! You can find instructions [here](https://support.usecaddy.com/knowledge-base/how-to-translate-caddy-into-different-languages/).

= Will Caddy slow down my site? =

No. We’ve built Caddy with performance in mind and have fine tuned it for speed.

== Screenshots ==

1. The Caddy side cart opened.
2. The up-sell recommendations screen after a product has been added to the side cart.
3. The settings screen.
4. The custom CSS styling screen.

== Changelog ==

= 1.9.4 =
* Improvement: window.load event changes
* Improvement: Tested upto latest WooCommerce 6.8.2 and WordPress 6.0.2 versions
* Improvement: Updating the sidebar boxes and links in admin-area

= 1.9.3 =
* Fix: Call to a member function is_empty() on null
* Fix: Cart object condition check on the cart screen
* Improvement: Free shipping total calculation is round-up
* Improvement: Convert all the integer value to float for better calculations

= 1.9.2 =
* Fix: Call to a member function get_cart_contents_count() on null
* Fix: Minor fix for undefined variable that may have impacted subscription products
* Improvement: Replace cc_update_window_data AJAX action with get_refreshed_fragments
* Improvement: Tag added for free shipping country

= 1.9.1 =
* Fix: Added dynamic version number to public JS
* Improvement: WC 6.5.1 and WP 6.0 compatibility added

= 1.9 =
* Fix: Removed "Save for later" tab when "save for later" options (in premium version) is disabled
* Fix: Removed unused cc-fontawesome CSS
* Fix: Removed premium plugin save for later ajax action
* Improvement: Optimized add-to-cart process using WC Rest API
* Improvement: Performance improvement by minifying JS and CSS
* Improvement: Get refreshed fragments on-page load using JS
* Improvement: Using get_option instead of get_transient to check if premium license is active or not
* Improvement: Temporarily disable cart contents for any action within Caddy cart to show its loading
* Feature: Added affiliate ID field & affiliate link to Caddy branding
* Feature: Add affiliate ID field & affiliate link to Caddy branding

= 1.8.2 =
* Improvement: Performance improvement for all the major actions within plugin

= 1.8.1 =
* Improvement: Update save for later product listing code

= 1.8 =
* Improvement: caddy-public-fonts.css added as a separate file
* Fix: Redirect external product to the URL
* Improvement: Update Caddy cart screen qty field based on the product "Sold individually" settings
* Fix: cc_cart_icon & cart_text undefined error for the widgets
* Improvement: Premium version license activation check function added
* Improvement: Add support for "Display on the Checkout page" premium version option
* Fix: Excluding draft products to appear on the product recommendation
* Improvement: UK country code added in the free shipping meter
* Improvement: Hooks added before and after caddy cart items

= 1.7.9 =
* Improvement: Cart sub-total calculations (support decimal value)
* Improvement: Caddy global admin and public object created to override hooks
* Fix: Wrapper css changes for some themes

= 1.7.8 =
* Fix: Mobile cart open issue (sometime) when product added

= 1.7.7 =
* Fix: DIVI theme builder compatibility issue
* Improvement: Display Caddy cart item meta info below product name
* Improvement: Free shipping meter price changes
* Improvement: Translation file updated

= 1.7.6 =
* Fix: WP Rocket caching issue
* Improvement: Hide catalog visibility hidden products from recommendations
* Improvement: Adding transition to compass count
* Improvement: Remove subtotal section
* Improvement: Change "Estimated total" to "Subtotal" and calculations (exclude shipping and taxes)

= 1.7.5 =
* Fix: YITH gift card plugin compatibility
* Improvement: Remove added class after deleting item from the cart
* Improvement: Free shipping meter calculations updated
* Improvement: Subtotal and estimated total changes
* Fix: WordPress jQuery (default) load issue
* Improvement: Changing Caddy logo
* Improvement: Fixing colors to match new Caddy brand
* Improvement: Caddy widget condition changes
* Improvement: Display subtotal under the coupon code box

= 1.7.4 =
* Improvement: New hook added for Caddy nav menu
* Improvement: POT file updated

= 1.7.3 =
* Improvement: Product price in cart screen updated
* Improvement: Caddy premium license condition updated

= 1.7.2 =
* Fix: Save for later button condition changes

= 1.7.1 =
* Fix: Fixing bubble close button
* POT file updated for translation
* Fix: Free shipping meter bug

= 1.7 =
* Improvement: General performance optimizations
* Improvement: Shipping meter CSS animation added
* Improvement: Caddy admin settings layout changes
* Improvement: Display product recommendations directly inside the cart screen
* Improvement: Front-end UI improvements
* Fix: Display an error message while trying to add an out-of-stock product
* Fix: product links
* Fix: CSS changes to support larger screens
* Fix: Product recommendations layout when adding product to saved list
* Fix: Mobile styles
* Fix: Free shipping meter condition updated
* Compatibility: Caddy support added for Elementor editor
* Compatibility: Twenty Twenty-One theme compatibility added
* Compatibility: Premium latest version support added with different notices
* Compatibility: Flatsome theme support added
* Compatibility: Multi-site support updated

= 1.6 =
* General bug fixes
* Add-on page changes
* Before and after cart screen hooks added
* Caddy Announcement add-on section added to the add-ons page
* Prevent out of stock products from being added to cart
* Free shipping meter condition updated when a coupon code is removed
* Added support for the “WooCommerce Blocks” plugin

= 1.5 =
* Bug fixes
* Crate cart and saved items widgets
* Updated add-on page layout
* Cart confirmation screen refresh rate updated

= 1.4 =
* Bug fixes
* Updated plugin using hooks

= 1.3 =
* Calculations were fixed for the discount amount

= 1.2 =
* Bug fixes
* Code clean-up and optimization
* Adding support for the latest versions of WordPress and WooCommerce

= 1.1 =
* Fixed issue with pot language file
* Added missing language strings
* Code cleanup

= 1.0 =
* Initial release
