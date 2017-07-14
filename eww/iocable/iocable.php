<?php

namespace EWW\Iocable;

use Pimple\Container;

abstract class Iocable {

	protected $ioc;

	public function set_container( Container $ioc ) {
		$this->ioc = $ioc;

		return $this;

	}

	public function get_container() {
		return $this->ioc;
	}

}