<?php

namespace App\Http\Controllers\Admin\Questions;

//use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\QuestionsController;
//use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\Http\Controllers\Controller;

use APP\Questions;

class LanguageController extends QuestionsController
{
    public $workground = 'questions/language';

    public function index(){
        return parent::index();
//            ->with('setting_img',$imgArr);
    }

}
