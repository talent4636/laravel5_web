<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Setting;
use App\Setting_img;

class FrontController extends Controller
{

    public $workground;//定义当前的blade模板名称，front/xxxx  如果是下级可以写成 aaaa.bbbb
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("front.{$this->workground}")
            ->with('_system_info',$this->get_system_info());
    }

    /**
     * @author: xiejun@shopex.cn
     * @desc:获取基础的系统信息
     */
    public function get_system_info(){
        //TODO setting and save， get
        return [
            'site_title'=>'Site Title',
            'site_name'=>'测试站点',
            'front_nav'=>[
                [
                    'name'=>'首页',
                    'url'=>'/home',
                    'active'=>true
                ],
                [
                    'name'=>'第二个',
                    'url'=>'/second',
                    'active'=>false
                ],
                [
                    'name'=>'第三个',
                    'url'=>'/third',
                    'active'=>false
                ],
            ],
            'copy_right'=>'Copy right ©2016 JoneXie'
        ];
    }
}
