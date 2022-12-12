<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function addBanner()
    {
        return view('admin.banner.add_banner');
    }
    public function saveBanner(Request $request)
    {
        $request->validate([
           'title'=>'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:50',
            'image'=>'mimes:jpeg,jpg,png,gif,svg|required|max:60000'
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = rand(1111,9999).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,720)->save('admin/images/banner_images/'.$imageName);
            $imageUrl = 'admin/images/banner_images/'.$imageName;
        }
        Banner::create([
           'image'=>$imageUrl,
           'title'=>$request->title,
            'alt'=>$request->alt,
            'link'=>$request->link,
            'status'=>1
        ]);
        $notification = array(
            'message'=>'Banner Info Saved!!',
            'alert-type'=>'success'
        );
        return redirect()->route('slider_banner')->with($notification);
    }
    public function sliderBanner()
    {
        Session::put('page','banners');
        $banners = Banner::all();
        return view('admin.banner.slider_banner',compact('banners'));
    }
    public function editBanner($id)
    {
        $editBanner = Banner::findOrFail($id);
        return view('admin.banner.edit_banner',compact('editBanner'));
    }
    public function updateBanner(Request $request,$id)
    {
        $oldImage = $request->old_image;
        if($request->file('image')){
            unlink($oldImage);
            $image = $request->file('image');
            $imageName = rand(1111,9999).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,720)->save('admin/images/banner_images/'.$imageName);
            $imageUrl = 'admin/images/banner_images/'.$imageName;
            Banner::findOrFail($id)->update([
                'image'=>$imageUrl,
                'title'=>$request->title,
                'alt'=>$request->alt,
                'link'=>$request->link,
                'status'=>1
            ]);
            $notification = array(
                'message'=>'Banner Info Updated with Image!!',
                'alert-type'=>'success'
            );
        }else{
            Banner::findOrFail($id)->update([
                'title'=>$request->title,
                'alt'=>$request->alt,
                'link'=>$request->link,
                'status'=>1
            ]);
            $notification = array(
                'message'=>'Banner Info Updated without image!!',
                'alert-type'=>'success'
            );
        }
        return redirect()->route('slider_banner')->with($notification);
    }
    public function updateBannerStatus(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            if($data['status']=='Active'){
                $status=0;
            }else{
                $status=1;
            }
            Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'banner_id'=>$data['banner_id']]);
        }
    }
    public function deleteBanner($id)
    {
        $bannerImage = Banner::findOrFail($id);
        $bannerImagePath='admin/images/banner_images/';
        if(file_exists($bannerImagePath.$bannerImage->image))
        {
            unlink($bannerImagePath.$bannerImage->image);
        }
        Banner::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Banner Image Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}
