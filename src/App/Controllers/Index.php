<?php

namespace Ming\App\Controllers;

use M\Controller;
use Ming\App\Models\User;

class Index extends Controller
{
    public function index()
    {
    	echo 'ffffff';
    	$user = new User();
    	$user = $user->test();
    	echo $user->password;
        $this->render('ming/index');
    }
}