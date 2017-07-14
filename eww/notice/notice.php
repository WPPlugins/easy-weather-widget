<?php

namespace EWW\Notice;

use EWW\Iocable\Iocable;

class Notice extends Iocable {


	public function init() {
		$this->attach_hooks();
	}

	public function attach_hooks() {
		add_action( 'admin_notices', array( $this, 'maybe_display_notice' ) );
	}

	public function maybe_display_notice() {

		if ( $this->ioc['settings']->get( 'api_key' ) ) {
			return;
		}

		$class   = 'notice notice-error';
		$message = __( sprintf( 'Please set your OpenWeatherMap API Key in <a href="%s">Settings > General</a>. If you do not have one you can obtain one at <a target="_BLANK" href="%s">openweathermap.org/api</a>. They have a free tier that should suffice most use cases.', admin_url( "options-general.php#owapi" ), 'http://openweathermap.org/api' ), $this->ioc['translate_domain'] );

		printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );

	}


}