<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setting;
use App\Setting_img;

class SettingController extends AdminController
{
    public $workground = 'setting';

    public $image_dir = 'uploads/images/';

    public function index(){
        $Osetting = new Setting();
        $OSetting_img = new Setting_img();
        $setting = $Osetting->where('type','=','ad_img')->first();
        $setting_img = json_decode($setting->setting,true);
        foreach($setting_img as $k => $img){
            if(strpos($img,'.')){//兼容，当初这里存错了，mark里面有后缀名
                $img = substr($img,0,32);
            }
            $imgInfo = $OSetting_img->where('mark','=',$img)->first();
            $imgArr[$k]['path'] = $imgInfo->path;
            $imgArr[$k]['mark'] = $img;
        }
        return parent::index()
            ->with('setting_img',$imgArr);
    }

    public function image(Request $request){
        $images=$request->file(); //使用laravel 自带的request类来获取一下文件.
        $img = $images['image'];//目前只能传单张
//        foreach($images as $img){
            $filedir = $this->image_dir;
            $imgName = $img->getClientOriginalName();
            $ext = '.'.$img->getClientOriginalExtension();
            $imgKey = md5(date('YmdHis').$imgName);//图片ID
            $imgNameNew = $imgKey.$ext;//完整图片名
            $img->move($filedir,$imgNameNew);
            //保存图片信息到 setting_img
            $settingImg = new Setting_img();
            $settingImg->create(['mark'=>$imgKey, 'path'=>$filedir.$imgNameNew]);
            $fileArr = [];
            array_push($fileArr, $imgNameNew);
//        }
        return json_encode([
            'success'=>true,
            'image_url'=>$filedir.$imgNameNew,
            'image_id'=>$imgKey
        ]);
    }

    public function save(Request $request){
        $fileArr = $request->image_arr;
        $setting = new Setting();
        if(Setting::where('type','ad_img')->get()){
            $setting->where('type','ad_img')->update(['setting'=>json_encode($fileArr)]);
        }else{
            $setting->create(['type'=>'ad_img','setting'=>json_encode($fileArr)]);
        }
        return redirect(url('admin/setting'));
    }

}
