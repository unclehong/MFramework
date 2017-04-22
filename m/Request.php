<?php

namespace M;

class Request
{
	public $session;
	
	public function __construct()
	{
		$this->session = Factory::make(\M\Session::class);	
	}
	
	public function is_post()
	{
		if($_POST)
		{
			return true;
		}
		
		return false;
	}
	
	public function is_get()
	{
		if($_GET)
		{
			return true;
		}
		
		return false;		
	}
	
    public function all()
    {
        return $_REQUEST;
    }

    public function post($param = '')
    {
        if($param)
        {
           return $_POST[$param];
        }

        return $_POST;
    }

    public function get($param = '')
    {
        if($param)
        {
            return $_GET[$param];
        }

        return $_GET;
    }
    
    public function get_session()
    {
    	
    }
}