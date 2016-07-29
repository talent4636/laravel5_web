<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use APP\Language_type;

/////////////
use Carbon\Carbon;
///////////

class QuestionsController extends AdminController
{
    public $workground = 'questions/language';

    public function index(){
        return parent::index();
    }

    public function _with_base_info($view){
        return view($view)
            ->with('base_nav',$this->nav)
            ->with('user_info',$this->user_info)
            ->with('copy_right',$this->copy_right);
    }

}