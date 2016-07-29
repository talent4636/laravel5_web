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
        ),
        'frontsetting' => array(
            'name' => '前台相关设置',
            'default' => '',
            'icon' => 'frontsetting',
        ),
        'user' => array(
            'name' => '用户中心',
            'default' => '',
            'icon' => 'user',
        ),
        'questions' => array(
            'name' => '题库管理',
            'default' => '',
            'icon' => 'questions',
            'sub_menu' => array(
                'language' => array(
                    'name' => '语言管理',
                    'default' => '',
                ),
                'questions' => array(
                    'name' => '题目列表',
                    'default' => '',
                ),
            ),
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
        $sub_name = '';
        if(strpos($nav_name,'/')){
            $ori_nav = $nav_name;
            $nav_name = explode('/',$ori_nav)[0];
            $sub_name = explode('/',$ori_nav)[1];
        }
        foreach($this->nav as $key => $nav){
            $this->nav[$key]['active'] = $key==$nav_name?true:false;
            if($this->nav[$key]['active'] && isset($this->nav[$key]['sub_menu'])){
                foreach($this->nav[$key]['sub_menu'] as $k => $v){
                    if($sub_name){
                        $this->nav[$key]['sub_menu'][$k]['active'] = $k==$sub_name?true:false;
                    }else{
                        $this->nav[$key]['sub_menu'][$k]['active'] = false;
                    }
                }
                //如果没有选中的子菜单，设置第一个选中
                if(!$sub_name){
                    $this->nav[$key]['sub_menu'][key($this->nav[$key]['sub_menu'])]['active'] = true;
                }
            }else{
                if(isset($this->nav[$key]['sub_menu'])){
                    unset($this->nav[$key]['sub_menu']);
                }
            }
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
