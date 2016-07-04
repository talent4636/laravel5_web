<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends AdminController
{
    public $workground = 'user';
    public $page_count = 5;

    //todo 显示用户信息
    public function index($page=1){
//        $mdlUser = new User();
//        $userInfo = $mdlUser->all();
        $userInfo = User::paginate($this->page_count,null,null,$page);
//        $contents = Content::paginate($this->page_count,null,null,$page);
//        dd($mdlUser->all());
        return parent::index()
            ->with('users',$userInfo);
    }

}