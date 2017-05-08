<?php

namespace Ming\App\Controllers;

use M\Controller;
use Ming\App\Models\User;

class Index extends Controller
{
    public function index()
    {
        $user = new User();
        $user_info = $user->test();

        return $this->success($user_info);

    }
}