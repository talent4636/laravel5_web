<?php

namespace App\Http\Controllers\Admin\Questions;

//use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\QuestionsController as _QuestionsController;//父类，尴尬
//use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Questions as mdlQuestions;
use App\Language_type as mdlLang;
use Illuminate\Http\Request;

class QuestionsController extends _QuestionsController
{
    public $workground = 'questions/questions';
    public $page_count = 10;

    public function index($page=1){
        return parent::index()
            ->with('questions',mdlQuestions::paginate($this->page_count,null,null,$page));
    }

    /**
     * @author: xiejun@shopex.cn
     * @desc:获取指定类型的题目分类
     */
    public function type_list($type_id=0){
        dd($type_id);
    }

    public function create(){
        return parent::_with_base_info('admin.questions.questions.edit')
            ->with('language',mdlLang::all());
    }

    public function edit($id){
        return parent::_with_base_info('admin.questions.questions.edit')
            ->with('language',mdlLang::all())
            ->with('questions',mdlQuestions::find($id));
    }

    public function save(Request $request){
        $request->updated_at = Carbon::now();
        if(!$request->get('id')){
            $request->created_at = Carbon::now();
            mdlQuestions::create($request->all());
        }else{
            mdlQuestions::find($request->get('id'))->update($request->all());
        }
        return redirect('admin/questions/questions');

    }

}
