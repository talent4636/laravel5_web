<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

    public $nav = array(
        'dashboard' => array(
            'name' => '概览',
            'default' => '',
            'icon' => 'dashboard',
            'sub_menu' => array(
                'dashboard_1' => array(
                    'name' => '概览-1',
                    'default' => '',
                ),
                'dashboard_2' => array(
                    'name' => '概览-2',
                    'default' => '',
                ),
            ),
        ),
        'user' => array(
            'name' => '用户中心',
            'default' => '',
            'icon' => 'user',
        ),
        'content' => array(
            'name' => '文章中心',
            'default' => '',
            'icon' => 'content',
        ),
        'setting' => array(
            'name' => '设置',
            'default' => '',
            'icon' => 'setting',
        ),
    );

    public $user_info;

    public $copy_right;

    public function __construct(){
        $this->setNav($this->workground);
        $this->user_info = [
            'name' => '管理员A',
            'is_super' => true,
        ];
        $this->copy_right = "copy right @JoneXie 2016";
        $this->with = [
            'base_nav',$this->nav,
            'user_info',$this->user_info,
            'copy_right',$this->copy_right
        ];
    }

    //设置当前nav选中
    public function setNav($nav_name='setting'){
        foreach($this->nav as $key => $nav){
            $this->nav[$key]['active'] = $key==$nav_name?true:false;
        }
    }

    public function index(){
        if($this->workground == 'passport'){
            return view('admin.passport.login')
                ->with('copy_right',$this->copy_right);
        }else{
            return view('admin.'.$this->workground.'.default')
                ->with('base_nav',$this->nav)
                ->with('user_info',$this->user_info)
                ->with('copy_right',$this->copy_right);
        }
    }
}
