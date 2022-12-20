<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function attributes()
    {
        return $this->hasMany(ProductsAttribute::class,);
    }
    public function images()
    {
        return $this->hasMany(ProductsImage::class);
    }

    public static function getDiscountPriceOfProduct($product_id)
    {
        $productDetails = Product::select('product_price','product_discount','category_id')->where('id',$product_id)->first();
        $productDetails = json_decode(json_encode($productDetails),true);
        $categoryDetails = Category::select('category_discount')->where('id',$productDetails['category_id'])->first();
        $categoryDetails = json_decode(json_encode($categoryDetails),true);
        if($productDetails['product_discount'] > 0 )
        {
            $discountedPrice = $productDetails['product_price'] - ($productDetails['product_price']  * $productDetails['product_discount']/100);
        }
        else if($categoryDetails['category_discount'] > 0 )
        {
            $discountedPrice = $productDetails['product_price'] - ($productDetails['product_price'] * $categoryDetails['category_discount']/100);
        }
        else{
            $discountedPrice = 0;
        }
        return $discountedPrice;
    }

}
