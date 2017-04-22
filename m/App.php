<?php

namespace M;

use Config\Config;

class App
{
    public function run()
    {
    	session_start();
    	//获取中间件
    	$middlewares = Config::middlewares();
    	//获取默认配置
    	$mca = Config::defaultAction();
    	foreach($middlewares as $middleware)
    	{
    		if(! $middleware->handle())
    		{
    			return false;
    		}
    	}
        if($_SERVER['PATH_INFO'])
        {
            $arr = explode('/',$_SERVER['PATH_INFO']);
            $m = $arr[1];
            $c = $arr[2];
            $a = $arr[3];

        }else
        {
        	$m = $mca['m'];
            $c = $mca['c'];
            $a = $mca['a'];
        }

        $class = 'Ming\\'.ucfirst($m).'\Controllers\\'.ucfirst($c);
        $obj = new $class();
        $obj->$a();
    }
}
