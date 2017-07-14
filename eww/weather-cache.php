<?php
namespace EWW;

use EWW\Iocable\Iocable;

class Weather_Cache extends Iocable {

	private $data;
	private $cache_limit = '600';
	private $args;
	private $hash;

	public function init( Array $args ) {

		$this->cache_limit = $this->ioc['cache_limit'];
		$this->args = $args;
		$this->hash = md5( serialize( $this->args ) );
		$this->data = $this->setup_cache();


		return $this;


	}

	public function get() {
		return $this->data;
	}

	public function set_cache_limit( $limit ) {
		$limit             = (int) $limit;
		$limit             = max( $limit, 600 );  // you don't need it more than every 5 minutes...
		$this->cache_limit = $limit;
	}

	private function setup_cache() {
		$this->data = $this->get_transient( $this->hash );
		if ( ! $this->data ) {
			/** @var \EWW\Get\Get_Weather $weather */
			$weather = $this->ioc['weather'];
			$weather->set_settings( $this->args );
			$this->data = $weather->get();
			if ( $this->data ) {
				$this->data = array_merge( (array) $this->data, array( 'retrieved' => time() ) );
			}

			$this->set_transient( $this->hash, $this->data, $this->cache_limit );

		}

		return $this->data;
	}

	/**
	 * Wrapper for get_transient in case we want to debug or abstract
	 *
	 * @param $transient
	 *
	 * @return mixed
	 */
	public function get_transient( $transient ) {
		return get_transient( $transient );
	}

	/**
	 * Wrapper for set_transient in case we want to debug or abstract
	 *
	 * @param $transient
	 * @param $value
	 * @param int $expiration
	 *
	 * @return bool
	 */
	public function set_transient( $transient, $value, $expiration = 0 ) {
		return set_transient( $transient, $value, $expiration );
	}

}