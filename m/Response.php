<?php

namespace M;
class Response
{
	/**
	 * 返回json
	 */
	static public function json(Array $arr)
	{
		header('Content-type: application/json');
		exit(json_encode($arr));
	}
}