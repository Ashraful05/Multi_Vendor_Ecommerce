<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function listing()
    {
//        echo "test";die();
        $url = Route::getFacadeRoot()->current()->uri();
        $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();

        if($categoryCount > 0){
            $categoryDetails = Category::categoryDetails($url);
//            return $categoryDetails;
//            echo "category exists";die();
            $categoryProducts = Product::whereIn('category_id',[$categoryDetails['catIds']])
                ->where('status',1)
                ->get()
                ->toArray();
//           dd($categoryProducts);
            return view('front.products.listing',compact('categoryDetails','categoryProducts'));
        }else{
            abort(404);
        }
    }
}
