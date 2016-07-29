<?php

namespace App\Http\Controllers\Admin\Questions;

use App\Http\Controllers\AdminController;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Language_type as mdlLanguage;

class LanguageController extends QuestionsController
{
    public $workground = 'questions/language';
    public $page_count = 10;

    public function index($page=1){
        return parent::index()
            ->with('language',mdlLanguage::paginate($this->page_count,null,null,$page));
    }

    private function _get_top_lang(){
//        return mdlLanguage::where('parent','=','')->get();
        return mdlLanguage::all();
    }

    public function create(){
        return view('admin.questions.language.edit')
            ->with('base_nav',$this->nav)
            ->with('user_info',$this->user_info)
            ->with('copy_right',$this->copy_right)
            ->with('top_language',$this->_get_top_lang());
    }

    public function edit($id){
        return view('admin.questions.language.edit')
            ->with('base_nav',$this->nav)
            ->with('user_info',$this->user_info)
            ->with('copy_right',$this->copy_right)
            ->with('top_language',$this->_get_top_lang())
            ->with('language',mdlLanguage::find($id));
    }

    public function save(Request $request){
        mdlLanguage::create($request->all());
        return redirect('admin/questions/language');
    }

    public function delete($id){
//        $language = new mdlLanguage();
//        $language->where('id',$id)->delete();
        mdlLanguage::where('id',$id)->delete();
        return redirect('admin/questions/language');
    }

}
