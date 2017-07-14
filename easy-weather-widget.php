<?php
/*
    Copyright 2106 Matthew Gargano (email : mgargano@gmail.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA

Plugin Name: Easy Weather Widget
Description: Easy Weather Widget provides you with an easy to use widget which outputs weather information.
Version: 3.2.4
Text Domain: easy-weather-widget
Author: Mat Gargano, StatenWeb
Author URI: https://www.statenweb.com
*/

use EWW\Iocable\Registry;
use EWW\Widget;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/translate.php';

$ioc = new \Pimple\Container();


require __DIR__ . '/services.php';
require __DIR__ . '/settings.php';

$ioc = apply_filters( 'eww_ioc_container', $ioc );

// see notes in the Registry class' comments as to why this is needed
Registry::set_ioc( $ioc );

/** @var \EWW\Settings\Settings $settings */
$settings = $ioc['settings'];
$settings->init();
$widget = new Widget();
$widget->init();
$notice = $ioc['notice'];
$notice->set_container( $ioc )->init();

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'eww', plugins_url( '/css/style.min.css', ( __FILE__ ) ) );
} );
