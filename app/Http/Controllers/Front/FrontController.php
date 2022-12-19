<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $sliderBanners = Banner::where('type','slider')->where('status',1)->get();
        $fixBanners = Banner::where('type','fix')->where('status',1)->get();
        return view('front.index',compact('sliderBanners','fixBanners'));
    }
}
