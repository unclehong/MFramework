<?php

namespace Ming\En\Models;

use M\Model;

class Member extends Model
{
	/**
	 * user register
	 */
	public function user_register($username,$password)
	{
		//check the member exists
		if(self::findOne('members','username = :username',[':username' => $username]))
		{
			return false;
		}
		$member = self::dispense('members');
		$member->username = $username;
		$member->password = password_hash($username.$password, PASSWORD_BCRYPT);
		$member->create_time = time();
		$member_id = self::store($member);
		return $member_id;
	}
	
	/**
	 * use login
	 */
	public function user_login($username,$password)
	{
		//find the member info
		$member = self::findOne('members','username = :username',[':username' => $username]);
		if($member)
		{
			//campare the password
			if(password_verify($username.$password, $member->password))
			{
				return $member;
			}else 
			{
				return false;
			}
		}else 
		{
			return false;
		}
	}
}