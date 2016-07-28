<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class FrontsettingController extends AdminController
{
    public $workground = 'frontsetting';

    public function index(){
        return parent::index();
//            ->with('setting_img',$imgArr);
    }

}
