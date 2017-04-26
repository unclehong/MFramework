<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 17-4-26
 * Time: 下午4:00
 */

namespace Schema;

use RedBeanPHP\R;

class User extends R
{
    public function __construct()
    {
        var_dump(self::setup('mysql:host=127.0.0.1;dbname=en','root','pass4mingming'));
    }

    /**
     * custum the functions
     */
    function up()
    {
        $table = 'user';
        echo 'this is the up';
    }

    function down()
    {
        echo 'this is the down';
    }

}

