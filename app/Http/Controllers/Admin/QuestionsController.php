<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use APP\Language_type;

class QuestionsController extends AdminController
{
    public $workground = 'questions/language';

    public function index(){
        return parent::index();
    }

}