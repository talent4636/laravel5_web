<?php

namespace App\Http\Controllers\Front;

//use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Setting;
use App\Setting_img;

class HomeController extends FrontController
{
    public $workground = 'home';

    public function index(){
        $info = Setting::where('type','ad_img')->first();
        $setting = $info->setting;
        $setting = json_decode($setting,1);
        $infoImage = [];
        foreach($setting as $img_id){
            $img = Setting_img::where('mark',$img_id)->first();
            $infoImage[] = $img->path;
        }
        return parent::index()
            ->with('image_ads',$infoImage);
    }

}
