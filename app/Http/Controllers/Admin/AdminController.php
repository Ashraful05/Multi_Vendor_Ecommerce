<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Vendor;
use App\Models\VendorsBankDetails;
use App\Models\VendorsBusinessDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard()
    {
        Session::put('page','dashboard');
        return view('admin.home.home');
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
//            return $data;
            $rules = ['email'=>'required|email|max:255', 'password'=>'required'];
            $customMessages=[
              'email.required'=>'Email is required',
                'email.email'=>'Valid email is required',
                'password'=>'password is required'
            ];
            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt( ['email'=>$data['email'], 'password'=>$data['password'],
            'status'=> 1] ))
            {
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->back()->with('error_message','Invalid email or password');
            }
        }
        return view('admin.login.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function checkAdminPassword(Request $request)
    {
//        $data = $request->all();
//        return $data;
        if(Hash::check($request->current_password,Auth::guard('admin')->user()->password))
        {
            return "true";
        }
        return "false";
    }
    public function updateAdminPassword(Request $request)
    {
//        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        Session::put('page','update_password');
        if($request->isMethod('post'))
        {
//            $data = $request->all();
//            dd($data);
            if(Hash::check($request->current_password,Auth::guard('admin')->user()->password))
            {
                if($request->password_confirmation == $request->new_password)
                {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>Hash::make($request->new_password)]);
                    Auth::guard('admin')->logout();
                    $notification = array(
                        'message'=>'Admin Password Updated now login with your new password!!',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('admin.login')->with($notification);
                }else{
                    $notification = array(
                        'message'=>'New Password and Confirm password is not matched!!',
                        'alert-type'=>'error'
                    );
                    return redirect()->back()->with($notification);
                }

            }else{
                return redirect()->back()->with('error_message','Your current Password is wrong!!');
            }
        }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.settings.update_password',compact('adminDetails'));
    }

    public function updateAdminDetails(Request $request)
    {
        Session::put('page','update_admin_details');
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $this->validate($request,[
               'name'=>'required|regex:/^[\pL\s\-]+$/u',
               'mobile'=>'required|numeric',
            ]);
            if($request->file('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = date('YmdHi').'.'.$extension;
                    $imagePath = 'admin/images/photos/'.$imageName;
                    Image::make($image_tmp)->resize(300,300)->save($imagePath);

                }
            }else if(!empty($data['current_admin_image'])){
                $imageName=$data['current_admin_image'];
            }else{
                $imageName="";
            }
            Admin::where('id',Auth::guard('admin')->user()->id)
                ->update([
                    'name'=>$data['name'],
                    'mobile'=>$data['mobile'],
                    'image'=>$imageName,
                ]);
            $notification = array(
                'message'=>'Admin Details Updated!!',
                'alert-type'=>'info'
            );
            return redirect()->route('admin.dashboard')->with($notification);
        }
        return view('admin.settings.update_admin_details');
    }
    public function updateVendorDetails(Request $request,$slug)
    {

        if($slug=="personal")
        {
            Session::put('page','update_personal_details');
            if($request->isMethod('post'))
            {
                $data = $request->all();
                $this->validate($request,[
                    'name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'mobile'=>'required|numeric',
                    'country'=>'required|string',
                ]);
                if($request->file('image')){
                    $image_tmp = $request->file('image');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = date('YmdHi').'.'.$extension;
                        $imagePath = 'vendor/images/photos/'.$imageName;
                        Image::make($image_tmp)->resize(300,300)->save($imagePath);

                    }
                }else if(!empty($data['current_vendor_image'])){
                    $imageName=$data['current_vendor_image'];
                }else{
                    $imageName="";
                }
                //update in admins table...
                Admin::where('id',Auth::guard('admin')->user()->id)
                    ->update([
                        'name'=>$data['name'],
                        'mobile'=>$data['mobile'],
                        'image'=>$imageName,
                    ]);
                //update in vendor's table....
                Vendor::where('id',Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'name'=>$data['name'],
                        'mobile'=>$data['mobile'],
                        'image'=>$imageName,
                        'city'=>$data['city'],
                        'state'=>$data['state'],
                        'address'=>$data['address'],
                        'country'=>$data['country'],
                        'pincode'=>$data['pincode'],
                    ]);
                $notification = array(
                    'message'=>'Vendor Details Updated!!',
                    'alert-type'=>'info'
                );
                return redirect()->back()->with($notification);
            }

        }
        else if($slug=='business'){
//            $vendorsBusinessDetails = VendorsBusinessDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
//            dd($vendorsBusinessDetails);
            Session::put('page','update_business_details');
            if($request->isMethod('post'))
            {
                $data = $request->all();
                $this->validate($request,[
                    'shop_name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'shop_mobile'=>'required',
                    'shop_country'=>'required|string',
                    'address_proof'=>'required',
                    'address_proof_image'=>'required|image',
                ]);
                if($request->file('address_proof_image')){
                    $image_tmp = $request->file('address_proof_image');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = date('YmdHi').'.'.$extension;
                        $imagePath = 'admin/images/proofs/'.$imageName;
                        Image::make($image_tmp)->resize(300,300)->save($imagePath);

                    }
                }else if(!empty($data['current_address_proof_image'])){
                    $imageName=$data['current_address_proof_image'];
                }else{
                    $imageName="";
                }

                //update in vendor's Details table....
                VendorsBusinessDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'shop_name'=>$data['shop_name'],
                        'shop_email'=>$data['shop_email'],
                        'shop_website'=>$data['shop_website'],
                        'shop_mobile'=>$data['shop_mobile'],
                        'shop_pincode'=>$data['shop_pincode'],
                        'address_proof'=>$data['address_proof'],
                        'address_proof_image'=>$imageName,
                        'shop_city'=>$data['shop_city'],
                        'shop_state'=>$data['shop_state'],
                        'shop_address'=>$data['shop_address'],
                        'shop_country'=>$data['shop_country'],
                        'gst_number'=>$data['gst_number'],
                        'pan_number'=>$data['pan_number'],
                        'business_license_number'=>$data['business_license_number'],
                    ]);
                $notification = array(
                    'message'=>'Vendor Business Details Updated!!',
                    'alert-type'=>'info'
                );
                return redirect()->back()->with($notification);
            }

        }else if($slug=='bank'){
            Session::put('page','update_bank_details');
            if($request->isMethod('post'))
            {
                $data = $request->all();
                $this->validate($request,[
                    'account_holder_name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'bank_name'=>'required|string',
                    'account_number'=>'required|string',
                    'bank_ifsc_code'=>'required|string',
                ]);
                //update in vendor's Bank Details table....
                VendorsBankDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'account_holder_name'=>$data['account_holder_name'],
                        'bank_name'=>$data['bank_name'],
                        'account_number'=>$data['account_number'],
                        'bank_ifsc_code'=>$data['bank_ifsc_code'],
                    ]);
                $notification = array(
                    'message'=>'Vendor Bank Details Updated!!',
                    'alert-type'=>'info'
                );
                return redirect()->back()->with($notification);
            }
        }
        $vendorDetails = Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first();
        $vendorsBusinessDetails = VendorsBusinessDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
        $vendorsBankDetails = VendorsBankDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
        $countries = Country::where('status',1)->get();
        return view('admin.settings.update_vendor_details',compact('slug','vendorDetails','vendorsBusinessDetails','vendorsBankDetails','countries'));
    }
    public function admins($type=null)
    {
        $admins = Admin::query();
        if(!empty($type)){
            $admins = $admins->where('type',$type);
            $title = ucfirst($type)."s";
            Session::put('page','view_'.strtolower($title));
        }else{
            $title = "All Admins/Sub Admins/Vendors";
            Session::put('page','view_all');
        }
//        $admins = Admin::get()->toArray();
        $admins = $admins->get()->toArray();
        return view('admin.admins.admins',compact('admins','type','title'));
    }
    public function viewVendorDetails($id)
    {
        $vendorDetails=Admin::with('vendorPersonal','vendorBank','vendorBusiness')->where('id',$id)->first();
//        return $vendorDetails;
        $countries = Country::get();
        return view('admin.admins.view_vendor_details',compact('vendorDetails','countries'));
    }
    public function updateAdminStatus(Request $request)
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
            Admin::where('id',$data['admin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
        }
    }
}
