<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2017/4/19
 * Time: 下午11:16
 */

namespace Ming\App\Models;

use M\Model;

class User extends Model
{
    public function test()
    {
        $members = self::findAll('members');
        var_dump($members);
    }
}