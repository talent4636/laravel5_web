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
        return parent::_with_base_info('admin.questions.language.edit')
            ->with('top_language',$this->_get_top_lang());
    }

    public function edit($id){
        return parent::_with_base_info('admin.questions.language.edit')
            ->with('top_language',$this->_get_top_lang())
            ->with('language',mdlLanguage::find($id));
    }

    public function save(Request $request){
        if($request->get('id')){
            mdlLanguage::find($request->get('id'))->update($request->all());
        }else{
            mdlLanguage::create($request->all());
        }
        return redirect('admin/questions/language');
    }

    public function delete($id){
        mdlLanguage::where('id',$id)->delete();
        return redirect('admin/questions/language');
    }

}
