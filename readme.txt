=== Easy Weather Widget ===


Contributors:      matstars, statenweb
Plugin Name:       Easy Weather Widget
Tags:              widget, weather
Author URI:        http://statenweb.com
Author:            Mat Gargano
Requires at least: 2.8
Tested up to:      4.6.1
Stable tag:        3.2.4
License: 	   GPLv2

== Description ==

Easy Weather Widget provides you with an easy to use widget which outputs weather information. When creating the widget just enter in your U.S. zip code and save, it will display the current weather on your site.

I completely rewrote the widget and made it filterable. You need to obtain and enter an API key, which has a free tier that should cover many use cases to obtain at Settings > General in your WP backend. See http://openweathermap.org/api for more information.

The following filters are available:

__eww_template__ to override the output template for the widget, see below for more information.

__note__, if you are overriding the template, please heed the notice to comply with the OpneWeatherMap license which states ` the OpenWeatherMap name must be mentioned as a weather source in a visible part of the application.` (obtained 8/2016 from http://openweathermap.org/price)

__eww_ioc_container__ to override the IoC container if you want to use different classes in the application (including the API to grab weather data)

#### Usage of eww_template filter

Add a "views" directory and file named "custom-eww.php" to your template directory. The "custom-eww.php" file will be your custom template for this example.


#### Example of using a custom template from within your theme PHP 5.3+ which allows closures

    `<?php

    add_filter( 'eww_template', function ( $template ){
        $template_dir = get_template_directory();
        return $template_dir . '/views/custom-eww.php';
    } );
    ?>`

#### Grunt

This plugin takes advantage of Grunt for validating JavaScript, SASS compilation and minification. To take advantage of Grunt you have to have both [npm](https://npmjs.org/) and [Grunt](http://gruntjs.com/) installed. Visit the respective sites for the applications and make sure they are installed. Once installed, if you want to edit/fork this plugin, it will be helpful to be familiar with these two tools.



== Installation ==

1. If installing manually, unzip and copy the resulting directory to your plugin directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Add the "Easy Weather Widget" widget to any widgetized area/sidebar and configure as desired.

== Screenshots ==

1. Widget admin screenshot
2. Widget screenshot

== Frequently Asked Questions ==

= Does this work outside of the United States? =

Current version uses OpenWeathermap.org's API and it works in the US and Canada

== Changelog ==

= 3.2.4 =
* Fix for missing `wi-day-partly-cloudy` class (changed to `wi-day-cloudy`)

= 3.2.3 =
* Add translation domain

= 3.2.0 =
* Fix translation issue
* Clean up the widget’s markup
* Adapt the SCSS to be more BEM like
* Fix some issues where we were not implementing interfaces properly

= 3.1.0 =
* Adding more information to help show users how to obtain an API
* Refactor IoC container for cache
* Add filter to hook into IoC container

= 3.0.1 =
* Internal efficiency updates
* Fix bugs for unset widgets throwing warnings

= 3.0 =
* Breaking changes, rewrote from the ground up!

= 2.2 = 
* Added ability to have multiple instances of the widget on a single page

= 2.1.0.1 = 
* Fix for malformed markup in the admin

= 2.1 =
* Made plugin translatable

= 2.0.5 =
* CSS bugfix

= 2.0.4 =
* Bugfix causing classes not to be loaded properly

= 2.0.1 =
* Fix to enable caching

= 2.0 =
* Rewrote widget
* Ability to change the title of the widget
* Ability to set the temperature scale (Fahrenheit, Celsius or Kelvin)

= 1.0 =
* Initial Release

== Upgrade Notice ==

= 3.0 =
* I totally rewrote the plugin. This is going to be a brand new widget and will need to be reconfigured. Contact me if you run into any issues and I’ll help you out.
