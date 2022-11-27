<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function sliderBanner()
    {
        $banners = Banner::all();
        return view('admin.banner.slider_banner',compact('banners'));
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
