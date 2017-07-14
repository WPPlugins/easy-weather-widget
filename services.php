<?php


$ioc['settings'] = function ( \Pimple\Container $container ) {
	return new \EWW\Settings\Open_Weather_API();
};


$ioc['weather'] = $ioc->factory( function ( \Pimple\Container $container ) {
	return new \EWW\Get\Open_Weather_API();
} );

$ioc['icons'] = function ( \Pimple\Container $container ) {
	return new EWW\Icons\Weather_Icons();
};

$ioc['notice'] = function () {
	return new EWW\Notice\Notice();
};

$ioc['cache'] = $ioc->factory( function ( \Pimple\Container $container ) {
	return new EWW\Weather_Cache();
} );