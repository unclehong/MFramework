<?php

namespace Ming\En\Controllers;

use M\Controller;
use M\Request;

class En extends Controller
{
	protected $en_model;
	protected $request;
	
	public function __construct()
	{
		$this->en_model = new \Ming\En\Models\En();
		$this->request = new Request();
	}
	
	/**
	 * get the newset en test lists
	 * @apiGroup En
	 * @apiParam {int} offset the number of current page
	 * @apiParam {int} many the number of required
	 * 
	 * @apiSuccess {string} title title of the test
	 * @apiSuccess {string} pic picture of the test
	 * @apiSuccess {string} create_time time of the test was created
	 */
	public function get_newest_en_lists()
	{
		if($this->request->is_post())
		{
			$this->validator($this->request->post(), [
					'offset' => 'required',
					'many' => 'required',
			]);
			$data = $this->en_model->en_lists($this->request->post('offset'), $this->request->post('many'));		
			$this->success($data);
		}
	}
	
	
	
}