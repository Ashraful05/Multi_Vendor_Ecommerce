<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $sliderBanners = Banner::where('type','slider')->where('status',1)->get();
        $fixBanners = Banner::where('type','fix')->where('status',1)->get();
        $newProducts = Product::orderBy('id','desc')->where('status',1)->limit(10)->get();
        $bestSellers = Product::where(['is_best_seller'=>'yes','status'=>1])->inRandomOrder()->get();
        $discountedProducts = Product::where('product_discount', '>', 0)->where('status',1)->inRandomOrder()->get();
        $featuredProducts = Product::where(['is_featured'=>'yes','status'=>1])->inRandomOrder()->get();
        return view('front.index',compact('sliderBanners','fixBanners',
            'newProducts','bestSellers','discountedProducts','featuredProducts'));
    }
}
