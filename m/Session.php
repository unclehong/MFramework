<?php

namespace M;

class Session
{
	
	//存入session
	static public function put($key = '',$value = '')
	{
		$_SESSION[$key] = $value;
	}
	
	//获取session元素
	static public function get($key)
	{
		return $_SESSION[$key];
	}
	
	//删除某个session
	static public function pop($key)
	{
		unset($_SESSION[$key]);
	}
	
	//清除session
	static public function destroy()
	{
		session_destroy();
	}
}