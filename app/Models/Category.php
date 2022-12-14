<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id')->select('id','name');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent_id')->select('id','category_name');
    }
    public function subcategories()
    {
        return $this->hasMany(Category::class,'parent_id')->where('status',1);
    }
    public static function categoryDetails($url)
    {
        $categoryDetails = Category::select('id','category_name','url')
            ->with('subcategories')
            ->where('url',$url)
            ->first()
            ->toArray();
        $catIDs=[];
        $catIDs[] = $categoryDetails['id'];
        foreach ($categoryDetails['subcategories'] as $key => $subcategory)
        {
            $catIDs = $subcategory['id'];
        }
        $response = ['catIds'=>$catIDs,'categoryDetails'=>$categoryDetails];
        return $response;
    }

}
