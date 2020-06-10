<?php

namespace Optidash\OptidashLaravel\Facades;
use Illuminate\Support\Facades\Facade;

class Optidash extends Facade {
	protected static function getFacadeAccessor() {
		return 'Optidash';
	}
}