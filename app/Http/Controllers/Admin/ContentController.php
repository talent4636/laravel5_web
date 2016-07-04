<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Content;

class ContentController extends AdminController
{
    public $workground = 'content';

    private $page_count = 5;//每页显示10项

    public function index($page=1){
        /*分页逻辑*/
        $contents = Content::paginate($this->page_count,null,null,$page);
        return parent::index()->with('contents',$contents);
    }

    public function create(){
//        return parent::index();
        return view('admin.content.create')
            ->with('base_nav',$this->nav)
            ->with('user_info',$this->user_info)
            ->with('copy_right',$this->copy_right);
    }

    public function edit($id){
        $content = Content::find($id);
        return view('admin.content.edit')
            ->with('base_nav',$this->nav)
            ->with('user_info',$this->user_info)
            ->with('copy_right',$this->copy_right)
            ->with('content',$content);
    }

    public function save(Request $request){
        $request->created_at = Carbon::now();
        $request->updated_at = Carbon::now();
        if($request->get('id')){
            Content::find($request->get('id'))->update($request->all());
        }else{
            Content::create($request->all());
        }
        return redirect('admin/content');
    }

    public function delete($id){
        $content = new Content();
        $content->where('id',$id)->delete();
        return redirect('admin/content');
    }
}
