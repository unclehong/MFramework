<?php

define('BASEPATH',__DIR__);
require BASEPATH . '/vendor/autoload.php';

//注册变量到全局
\M\Register::bind('app',\M\Factory::make(\M\App::class));

//注册变量到全局
\M\Register::bind('request',\M\Factory::make(\M\Request::class));

$app = \M\Register::get('app');
$app->run();