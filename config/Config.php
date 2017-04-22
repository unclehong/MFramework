<?php

namespace Config;

class Config
{
	//配置中间件
	static public function middlewares()
	{
		return [
				new \Ming\Middlewares\Sign(),
		];
	}
	
	//配置默认的执行对象和方法
	static public function defaultAction()
	{
		return [
				//模块
				'm' => 'app',
				//控制器
				'c' => 'index',
				//执行方法
				'a' => 'index',
		];
	}
}