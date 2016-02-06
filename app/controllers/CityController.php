<?php

include_once('core/Controller.php');


class CityController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public static function test()
	{
		self::loadView('city');
	}

	public static function me()
	{
		echo 'me';
	}
}


?>