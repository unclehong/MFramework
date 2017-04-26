<?php

namespace Ming\En\Models;

use M\Model;

class En extends Model
{
	/**
	 * en test lists
	 */
	public function en_lists($offset,$many)
	{
		//get the result of en test lists
		return self::find('en','ORDER BY id DESC LIMIT ?,?',[(int)($offset - 1)*$many,(int)$many]);
    }

    /**
     * get choices which belongs to en test
     */
    public function get_choice_lists()
	{
	}
}
