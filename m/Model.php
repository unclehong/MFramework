<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2017/4/19
 * Time: 下午11:21
 */

namespace M;

use RedBeanPHP\R;

class Model extends R
{
    //链接数据库
    public function __construct()
    {
        self::setup('mysql:host=127.0.0.1;dbname=en','root','pass4mingming');
    }

    public function __destruct()
    {
        self::close();
    }
}
