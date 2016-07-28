<?php

namespace App\Http\Controllers\Admin\Questions;

//use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\QuestionsController as _QuestionsController;//父类，尴尬
//use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\Http\Controllers\Controller;

use APP\Questions;

class QuestionsController extends _QuestionsController
{
    public $workground = 'questions/questions';

    public function index(){
        return parent::index();
//            ->with('setting_img',$imgArr);
    }

}
