<?php

namespace EWW\Settings;

interface Settings {

	public function init();

	public function get($key);

}