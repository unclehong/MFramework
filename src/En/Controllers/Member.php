<?php

namespace Ming\En\Controllers;

use M\Request;
use M\Controller;

class Member extends Controller
{
	protected $request;
	protected $member_model;
	/**
	 * __construct
	 */
	public function __construct()
	{
		$this->request = new Request();
		$this->member_model = new \Ming\En\Models\Member();
	}
    /**
     * user_login
     */
    public function user_login()
    {
    	if($this->request->is_post())
    	{
    		$this->validator($this->request->post(), [
    				'username' => 'required',
    				'password' => 'required',
    		]);
    		
    		if($member = $this->member_model->user_login($this->request->post('username'), $this->request->post('password')))
    		{
    			//generate the user token
    			$token = password_hash($member->id, PASSWORD_BCRYPT);
    			//to write user info into session
    			$this->request->session->put($token,[
    					'member_id' => $member->id,
    					'username'  => $member->username,
    			]);
    			$member->member_id = $member->id;
    			$member->token = $token;
    			$this->success($member);
    		}else 
    		{
    			$this->fails(10005,'login fails');
    		}
    	}
    }

    /**
     * user register
     */
    public function user_register()
    {
        if($this->request->is_post())
        {
        	$this->validator($this->request->post(),[
        			'username' => 'required',
        			'password' => 'required',
        	]);
        	
        	if($member_id = $this->member_model->user_register($this->request->post('username'), $this->request->post('password')))
        	{
        		//generate the user token
        		$token = password_hash($member_id, PASSWORD_BCRYPT);
        		//to write use info into session
        		$this->request->session->put($token,[
        				'member_id' => $member_id,
        				'username'  => $this->request->post('username'),
        		]);
        		$data->member_id = $member_id;
        		$data->username = $this->request->post('username');
        		$data->token = $token;
        		$this->success($data);
        	}else 
        	{
        		$this->fails(10005,'register fails');
        	}
        }
    }
    
    /**
     * user logout
     * @apiGroup Member
     * @api {post} member/user_logout member logut
     * 
     * @apiParam {int} member_id member id
     * @apiParam {string} token token
     */
    public function user_logout()
    {
    	if($this->request->is_post())
    	{
    		$this->validator($this->request->post(), [
    				'member_id' => 'required',
    				'token' => 'required',
    		]);
    		
    		//validate the member_id and token
    		if(password_verify($this->request->post('member_id'),$this->request->post('token')))
    		{
    			//delete the session
    			$this->request->session->pop($this->request->post('token'));
    			return $this->success([]);
    		}else
    		{
    			return $this->fails(10005,'logout fails');
    		}
    	}
    }
    
    
}
