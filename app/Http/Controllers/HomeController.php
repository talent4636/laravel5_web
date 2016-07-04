<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Setting;
use App\Setting_img;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = Setting::where('type','ad_img')->first();
        $setting = $info->setting;
        $setting = json_decode($setting,1);
        $infoImage = [];
        foreach($setting as $img_id){
            $img = Setting_img::where('mark',$img_id)->first();
            $infoImage[] = $img->path;
        }
//        dd($infoImage);
        return view('front.home')
            ->with('image_ads',$infoImage);
    }
}
