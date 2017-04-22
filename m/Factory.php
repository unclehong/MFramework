<?php

namespace M;

class Factory
{
    //生产对象
    static public function make($class)
    {
        return new $class;
    }
}