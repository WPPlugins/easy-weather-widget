<?php

namespace EWW\Iocable;

/**
 * There is no way to directly inject an ioc container into the widget because it's
 * newed up in `class-wp-widget-factory` so we have to use a singleton-ish (sigh) pattern
 * to set the registry into memory.
 *
 * Class Registry
 * @package EWW\Iocable
 */

class Registry {

	private static $ioc;

	public static function set_ioc( $ioc ) {
		self::$ioc = $ioc;
	}

	public static function get_ioc() {
		return self::$ioc;
	}

}