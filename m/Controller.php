<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 2017/4/20
 * Time: 下午1:10
 */

namespace M;

class Controller
{
    private $var = [];

    /**
     * 分配数据
     */
    public function assign($name='',$value='')
    {
        if(is_array($name))
        {
            $this->var = array_merge($this->var,$name);
        }else
        {
            $this->var[$name] = $value;
        }

        return $this->var;
    }

    /**
     * 渲染模板
     */
    public function render($viewpath = '')
    {
        extract($this->assign());

        $m = '';
        if($_SERVER['PATH_INFO'])
        {
            $arr = explode('/',$_SERVER['PATH_INFO']);
            $m = $arr[1];
        }else
        {
            $m = 'app';
        }

        include BASEPATH . '/src/'.ucfirst($m).'/Views/'.$viewpath.'.php';
    }

    /**
     * set魔术方法
     */
    public function __set($name, $value)
    {
        $this->assign($name,$value);
    }

    /**
     * 验证的方法
     */
    public function validator($arr,$brr)
    {
        //将$_POST/$_GET中的键取出来
        $newarr = array_keys($arr);
        foreach ($brr as $key => $val)
        {
            //先判断所验证的信息是否在第一个数组中
            if(!in_array($key,$newarr))
            {
            	$this->fails(10001,'参数丢失，不符合文档要求');
                return false;
            }

            //分解验证条件为数组
            $a = explode('|',$val);
            foreach ($a as $v)
            {
                switch ($v)
                {
                    case 'required':

                        if(!$arr[$key])
                        {
                        	$this->fails(10002,"参数缺少值");
                            return false;
                        }

                        break;
                    default:
                        return false;
                }
            }
        }
        return true;
    }
    
    /**
     * success response
     */
    public function success($arr = [],$page = 0,$offset = 0,$code = 10000,$msg = '本次操作成功')
    {
    	$data = [
    			'data'=>$arr,
                'page' => ['page' => $page,'offset' => $offset],
    			'code' => $code,
    			'msg' => $msg,
    	];
    	$response = new Response();
    	$response->json($data);
    }
    
    /**
     * fails response
     */
    public function fails($code = 10001,$msg,$arr = [])
    {
    	$data = [
    			'data' => $arr,
    			'code' => $code,
    			'msg' => $msg,
    	];
    	$response = new Response();
    	$response->json($data);
    }
}
