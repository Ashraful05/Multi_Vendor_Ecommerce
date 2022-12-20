<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function products()
    {
        Session::put('page','products');
        $products = Product::with(['section'=>function($query){
            $query->select('id','name');
        },'category'=>function($query){
            $query->select('id','category_name');
        }])->get();
        return view('admin.products.product_info',compact('products'));
    }
    public function updateProductStatus(Request $request)
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
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }
    public function addEditProduct(Request $request,$id=null)
    {
        if($id=="")
        {
            $title = "Add Product";
            $product = new Product();
            $notification = array(
                'message'=>'Product Info Saved!!',
                'alert-type'=>'success'
            );
        }else{
            $product = Product::find($id);
            $title="Edit Product";
            $notification = array(
                'message'=>'Product Info Updated!!',
                'alert-type'=>'info'
            );
        }
        if($request->isMethod('post'))
        {
            $data = $request->all();
//            return $data;
            $rules=[
                'product_name'=>'required',
                'product_code'=>'required',
                'product_color'=>'required',
                'product_price'=>'required|numeric',
                'category_id'=>'required',
//                'product_image'=>'required|mimes:jpeg,pdf,png,jpg,zip|max:2048'
            ];
            $customMessages=[
                'category_id.required'=>'Category Name is required',
                'product_name.regex'=>'Valid Product name is required',
                'product_code.required'=>'Product Code is required',
                'product_color.required'=>'Product Color is required',
                'product_price.required'=>'Product Price is required',
//                'product_image.required'=>'Product Image is required',
            ];
            $this->validate($request,$rules,$customMessages);


           if(empty($product->product_image)){
               if($request->file('product_image'))
               {
                   $image = $request->file('product_image');
                   $imageName = rand(1111,9999).'.'.$image->getClientOriginalExtension();
                   //upload product image after resize small:250x250, medium:500x500, large:1000x1000;
                   $smallImagePath = 'admin/images/products/small/'.$imageName;
                   $mediumImagePath = 'admin/images/products/medium/'.$imageName;
                   $largeImagePath = 'admin/images/products/large/'.$imageName;
                   Image::make($image)->resize(250,250)->save($smallImagePath);
                   Image::make($image)->resize(500,500)->save($mediumImagePath);
                   Image::make($image)->resize(1000,1000)->save($largeImagePath);
                   $save_url = $smallImagePath;
                   $product->product_image = $save_url;
               }
           }
            //upload product video.....
            if($request->hasFile('product_video'))
            {
                $video_tmp = $request->file('product_video');
                if($video_tmp->isValid())
                {
                    //upload video in video folder......
                    $extension=$video_tmp->getClientOriginalExtension();
                    $videoName = date('Y_m_d_Hi').'.'.$extension;
                    $videoPath = 'admin/images/product_videos/';
                    $video_tmp->move($videoPath,$videoName);

                    //Insert video in products table........
                    $product->product_video = $videoName;
                }
            }
            $categoryDetails = Category::find($data['category_id']);
            $product->section_id = $categoryDetails['section_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];

            $adminType = Auth::guard('admin')->user()->type;
            $vendorId = Auth::guard('admin')->user()->vendor_id;
            $adminId = Auth::guard('admin')->user()->id;

            $product->admin_type = $adminType;
            $product->admin_id = $adminId;
            if($adminType=='vendor')
            {
                $product->vendor_id = $vendorId;
            }else{
                $product->vendor_id=0;
            }
            if(empty($data['product_discount'])){
                $data['product_discount']=0;
            }
            if(empty($data['product_weight'])){
                $data['product_weight']=0;
            }
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_weight = $data['product_weight'];
            $product->product_discount = $data['product_discount'];
            $product->description = $data['description'];
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keyword = $data['meta_keyword'];
            if(!empty($data['is_featured']))
            {
                $product->is_featured=$data['is_featured'];
            }else{
                $product->is_featured="no";
            }
            if(!empty($data['is_best_seller']))
            {
                $product->is_best_seller=$data['is_best_seller'];
            }else{
                $product->is_best_seller="no";
            }
            $product->status = 1;
            $product->save();
            return redirect()->route('products')->with($notification);

        }

        $categories = Section::with('categories')->get();
        //        return $categories;
        $brands = Brand::where('status',1)->get();

        return view('admin.products.add_edit_product',compact('categories','brands','title','product'));
    }
    public function deleteProductImage($id)
    {
        $productImage = Product::select('product_image')->where('id',$id)->first();
        $small_image_path = 'admin/images/products/small/';
        $medium_image_path = 'admin/images/products/medium/';
        $large_image_path = 'admin/images/products/large/';
        if(file_exists($small_image_path.$productImage->product_image))
        {
            unlink($small_image_path.$productImage->product_image);
        }
        if(file_exists($medium_image_path.$productImage->product_image))
        {
            unlink($medium_image_path.$productImage->product_image);
        }
        if(file_exists($large_image_path.$productImage->product_image))
        {
            unlink($large_image_path.$productImage->product_image);
        }
        Product::where('id',$id)->update(['product_image'=>'']);
        $notification = array(
            'message'=>'Product Image Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteProductVideo($id)
    {
        $productVideo = Product::select('product_video')->where('id',$id)->first();
        $product_video_path = 'admin/images/product_videos/';
        if(file_exists(($product_video_path.$productVideo->product_video)))
        {
            unlink($product_video_path.$productVideo->product_video);
        }
        Product::where('id',$id)->update(['product_video'=>'']);
        $notification = array(
            'message'=>'Product Video Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        $notification = array(
            'message'=>'Product Info Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    public function addEditAttribute(Request $request,$id)
    {
        $product = Product::select('id','product_name','product_code','product_color','product_price','product_image')
            ->with('attributes')
            ->find($id);
//        return json_decode(json_encode($product),true);
//        dd($product);
        if($request->isMethod('post'))
        {
            $data = $request->all();
//            return $data;
            foreach ($data['sku'] as $key => $value)
            {
                if(!empty($value))
                {
                    //sku duplicate check....
                    $skuCount = ProductsAttribute::where('sku',$value)->count();
                    if($skuCount > 0)
                    {
                        $notification=array(
                            'message'=>'Product Attribute SKU already exist! Please add another sku!!',
                            'alert-type'=>'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                    //size duplicate check...
                    $sizeCount = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
//                    $sizeCount = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($sizeCount > 0)
                    {
                        $notification=array(
                            'message'=>'Product Attribute Size already exist! Please add another size!!',
                            'alert-type'=>'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                    $attribute = new ProductsAttribute();
                    $attribute->product_id = $id;
                    $attribute->sku=$value;
                    $attribute->size=$data['size'][$key];
                    $attribute->price=$data['price'][$key];
                    $attribute->stock=$data['stock'][$key];
                    $attribute->status=1;
                    $attribute->save();
                }
            }
            $notification = array(
                'message'=>'Product Attribute added successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
        return view('admin.attributes.add_edit_attribute',compact('product'));
    }
    public function updateProductAttributeStatus(Request $request)
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
            ProductsAttribute::where('id',$data['attribute_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'attribute_id'=>$data['attribute_id']]);
        }
    }
    public function editProductAttribute(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

//            return $data;
//            echo "<pre>"; print_r($data); die;

            foreach ($data['attributeId'] as $key => $attribute) {
                if(!empty($attribute)){
                    ProductsAttribute::where(['id'=>$data['attributeId'][$key]])
                        ->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
                }
            }
            $notification = array(
                'message'=>'Product Attribute Updated Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function deleteProductAttribute($id)
    {
        $productAttribute = ProductsAttribute::find($id);
        $productAttribute->delete();
        $notification = array(
            'message'=>'Product Attribute Info Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    public function addImages(Request $request,$id)
    {
        Session::put('page','products');
        $product = Product::select('id','product_name','product_code','product_color',
            'product_price','product_image')->with('images')->find($id);

        if($request->isMethod('post'))
        {
            $data = $request->all();
//            return $data;
            if($request->hasFile('images')){
                $images = $request->file('images');
                foreach($images as $image)
                {
                    $imageName = rand(1111,9999).'.'.$image->getClientOriginalExtension();
                    $smallImagePath = 'front/images/product_images/small/'.$imageName;
                    $mediumImagePath = 'front/images/product_images/medium/'.$imageName;
                    $largeImagePath = 'front/images/product_images/large/'.$imageName;
                    Image::make($image)->resize(200,200)->save($smallImagePath);
                    Image::make($image)->resize(500,500)->save($mediumImagePath);
                    Image::make($image)->resize(1000,1000)->save($largeImagePath);
                    $uploadPath = 'front/images/product_images/small/'.$imageName;
                    ProductsImage::create([
                        'product_id'=>$id,
                        'image'=>$uploadPath,
                        'status'=>1
                    ]);
                }
                $notification = array(
                    'message'=>'Product Info Added Successfully!!',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }
        }
        return view('admin.images.add_edit_images',compact('product'));

    }
    public function updateProductImageStatus(Request $request)
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
            ProductsImage::where('id',$data['image_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'image_id'=>$data['image_id']]);
        }
    }
    public function deleteProductMultipleImage($id)
    {
        $productMultiImage = ProductsImage::select('image')->where('id',$id)->first();

        $smallImagePath = 'front/images/product_images/small/';
        $mediumImagePath = 'front/images/product_images/medium/';
        $largeImagePath = 'front/images/product_images/large/';
        if(file_exists($smallImagePath.$productMultiImage->image))
        {
            unlink($smallImagePath.$productMultiImage->image);
        }
        if(file_exists($mediumImagePath.$productMultiImage->image))
        {
            unlink($mediumImagePath.$productMultiImage->image);
        }
        if(file_exists($largeImagePath.$productMultiImage->image))
        {
            unlink($largeImagePath.$productMultiImage->image);
        }
        ProductsImage::where(['id'=>$id])->delete();
        $notification = array(
            'message'=>'Product Multiple Image Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}
