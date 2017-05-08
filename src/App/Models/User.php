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
    protected $table = 'members';
    public $timestamps = false;

    public function test()
    {
        return $this->find(21);
    }
}