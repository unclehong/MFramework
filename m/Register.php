<?php

namespace M;

class Register
{
	static protected $objarr;
	
	static public function bind($alias , $object)
	{
		self::$objarr[$alias] = $object;
	}
	
	static public function get($alias)
	{
		return self::$objarr[$alias];
	}
	
	static public function unbind($alias)
	{
		unset(self::$objarr[$alias]);
	}
}