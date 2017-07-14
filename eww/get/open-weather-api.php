<?php

namespace EWW\Get;

use EWW\Iocable\Iocable;
use EWW\Settings;

class Open_Weather_API extends Iocable implements Get_Weather {

	private $api_key;
	private $zip;
	private $units;
	private $zip_url_base = 'http://api.openweathermap.org/data/2.5/weather';
	private $defaults = array( 'api_key' => null, 'zip' => null, 'unit' => 'Imperial' );
	private $response;
	private $weather_response;


	public function set_settings( Array $args ) {

		$args = array_merge( $this->defaults, $args );

		$this->api_key = $args['api_key'];
		$this->zip     = $args['zip'];
		$this->units   = $args['temperature_scale'];

	}

	public function get() {

		$url      = add_query_arg( array(
			'zip'   => $this->zip,
			'APPID' => $this->api_key,
			'units' => $this->units

		), $this->zip_url_base );
		$response = wp_remote_get( $url );
		$body     = wp_remote_retrieve_body( $response );
		$status   = wp_remote_retrieve_response_code( $response );
		$this->begin_response();
		if ( $status === 200 ) {

			$this->response = json_decode( $body );
			if ( is_object( $this->response ) ) {

				if ( isset( $this->response->cod ) && '404' === $this->response->cod ) {
					return false;
				}

				$this->push_response( 'id', $this->response->weather[0]->id );
				$this->push_response( 'description', $this->response->weather[0]->description );
				$this->push_response( 'main', $this->response->weather[0]->main );
				$this->push_response( 'temp', $this->response->main->temp );
				$this->push_response( 'pressure', $this->response->main->pressure );
				$this->push_response( 'humidity', $this->response->main->humidity );
				$this->push_response( 'temp_min', $this->response->main->temp_min );
				$this->push_response( 'temp_max', $this->response->main->temp_max );


			}

			return $this->weather_response;

		} else {
			return false;
		}

	}


	protected function begin_response() {
		$this->weather_response = array();
	}

	protected function push_response( $key, $value ) {
		$this->weather_response[ $key ] = $value;
	}


}