<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function categories()
    {
        Session::put('page','categories');
        $categories = Category::with(['section','parentCategory'])->get();
//        return $categories;
        return view('admin.categories.category_info',compact('categories'));
    }
    public function updateCategoryStatus(Request $request)
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
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }
    public function addEditCategory(Request $request, $id=null)
    {
        if($id=='')
        {
            $title="Add Category Page";
            $category = new Category();
            $getCategories = array();
            $notification = array(
                'message'=>'Category Info Added!!',
                'alert-type'=>'success'
            );
        }else{
            $title="Edit Category Page";
            $category=Category::find($id);
            $getCategories=Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category->section_id])->get();
            $notification = array(
                'message'=>'Category Info Updated!!',
                'alert-type'=>'info'
            );
        }

        if($request->isMethod('post')){
            $rules=[
                'category_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'section_id'=>'required',
                'url'=>'required',
                'meta_keywords'=>'required'
            ];
            $customMessages=[
                'category_name.required'=>'Category Name is required',
                'category_name.regex'=>'Valid Category name is required',
                'section_id.required'=>'Section Name is required',
                'url.required'=>'URL is required',
                'meta_keywords'=>'Meta Keyword is required',
            ];
            $this->validate($request,$rules,$customMessages);
            if($request->file('category_image')){
                $image_tmp = $request->file('category_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = date('YmdHi').'.'.$extension;
                    $imagePath = 'admin/images/categories/'.$imageName;
                    Image::make($image_tmp)->resize(300,300)->save($imagePath);
                    $category->category_image=$imageName;
                }
            }else{
                $imageName="";
                $category->category_image=$imageName;
            }
            $category->category_name = $request->category_name;
            $category->section_id = $request->section_id;
            $category->parent_id = $request->parent_id;
            $category->category_discount = $request->category_discount;
            $category->description = $request->description;
            $category->url = $request->url;
            $category->meta_title = $request->meta_title;
            $category->meta_description = $request->meta_description;
            $category->meta_keywords = $request->meta_keywords;
            $category->status = 1;
            $category->save();
            return redirect()->route('categories')->with($notification);

        }
        $sections = Section::get();
        return view('admin.categories.add_edit_category',compact('sections','title','category','getCategories'))->with($notification);

    }
    public function appendCategoryLevel(Request $request)
    {
        if($request->ajax()){
//            return $request->section_id;
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$request->section_id])->get();
            return view('admin.categories.append_categories_level',compact('getCategories'));
        }
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        $notification = array(
            'message'=>'Category Info Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteCategoryImage($id)
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
