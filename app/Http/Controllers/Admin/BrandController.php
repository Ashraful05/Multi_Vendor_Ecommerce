<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function brands()
    {
        Session::put('page','brands');
        $brands = Brand::all();
        return view('admin.brands.brand_info',compact('brands'));
    }
    public function updateBrandStatus(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die();
            if($data['status']=='Active')
            {
                $status=0;
            }else{
                $status=1;
            }
            Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
        }
    }

    public function addEditBrand(Request $request, $id=null)
    {
        if($id=='')
        {
            $title="Add Brand Page";
            $brand = new Brand();
            $getBrands = array();
            $notification = array(
                'message'=>'Brand Info Added!!',
                'alert-type'=>'success'
            );
        }else{
            $title="Edit Brand Page";
            $brand=Brand::find($id);
//            $getCategories=Brand::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category->section_id])->get();
            $notification = array(
                'message'=>'Category Info Updated!!',
                'alert-type'=>'info'
            );
        }

        if($request->isMethod('post')){
            $rules=[
                'name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessages=[
                'name.required'=>'Brand Name is required',
                'name.regex'=>'Valid Brand name is required',
            ];
            $this->validate($request,$rules,$customMessages);
//            if($request->file('category_image')){
//                $image_tmp = $request->file('category_image');
//                if($image_tmp->isValid()){
//                    $extension = $image_tmp->getClientOriginalExtension();
//                    $imageName = date('YmdHi').'.'.$extension;
//                    $imagePath = 'admin/images/categories/'.$imageName;
//                    Image::make($image_tmp)->resize(300,300)->save($imagePath);
//                    $category->category_image=$imageName;
//                }
//            }else{
//                $imageName="";
//                $category->category_image=$imageName;
//            }
            $brand->name = $request->name;
            $brand->status = 1;
            $brand->save();
            return redirect()->route('brands')->with($notification);

        }
//        $sections = Section::get();
        return view('admin.brands.add_edit_brand',compact('brand','title'))->with($notification);

    }
    public function appendBrandLevel(Request $request)
    {
        if($request->ajax()){
//            return $request->section_id;
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$request->section_id])->get();
            return view('admin.categories.append_categories_level',compact('getCategories'));
        }
    }
    public function deleteBrand($id)
    {
        $brand= Brand::find($id);
        $brand->delete();
        $notification = array(
            'message'=>'Brand Info Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteBrandImage($id)
    {
        $categoryImage = Category::select('category_image')->where('id',$id)->first();
        $categoryImagePath='/admin/images/categories/';
        if(file_exists($categoryImagePath.$categoryImage->category_image))
        {
            unlink($categoryImagePath.$categoryImage->category_image);
        }
        Category::where('id',$id)->update(['category_image'=>'']);
        $notification = array(
            'message'=>'Category Image Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}
