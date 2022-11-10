@extends('admin.master')
@section('title','Add/Edit Product')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('products') }}" class="btn btn-success" style="float: right">View Product Info</a>
                        <h4 class="card-title">{{$title}}</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form class="forms-sample" @if(empty($product->id)) action="{{ url('admin/add-edit-product') }}"
                              @else action="{{ route('add-edit-product',$product->id) }}" @endif  method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <select name="category_id" id="category_id" class="form-control" style="color:#000;">
                                    <option value="" >---Select---</option>
                                    @foreach($categories as $categorySection)
                                        <optgroup label="{{ $categorySection->name }}"></optgroup>
                                        @foreach($categorySection['categories'] as $category)
                                            <option @if(!empty($product->category_id==$category->id)) selected @endif value="{{ $category->id }}">&nbsp;&nbsp;&nbsp;---&nbsp;{{ $category->category_name }}</option>
                                            @foreach($category['subcategories'] as $subcategory)
                                                <option @if(!empty($product->category_id==$subcategory->id)) selected @endif value="{{ $subcategory->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;{{ $subcategory->category_name }}</option>
                                            @endforeach
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="brand_id">Select Brand</label>
                                <select name="brand_id" id="brand_id" class="form-control" style="color:#000;">
                                    <option value="" >---Select---</option>
                                    @foreach($brands as $brand)
                                        <option @if($product->brand_id == $brand->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" @if(!empty($product->id)) value="{{ $product->product_name }}"
                                       @else value="{{ old('product_name') }}" @endif class="form-control" id="product_name">
                            </div>
                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                <input type="text" name="product_code" @if(!empty($product->id)) value="{{ $product->product_code }}"
                                       @else value="{{ old('product_code') }}" @endif class="form-control" id="product_code">
                            </div>
                            <div class="form-group">
                                <label for="product_color">Product Color</label>
                                <input type="text" name="product_color" @if(!empty($product->id)) value="{{ $product->product_color }}"
                                       @else value="{{ old('product_color') }}" @endif class="form-control" id="product_color">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Product Price</label>
                                <input type="text" name="product_price" @if(!empty($product->id)) value="{{ $product->product_price }}"
                                       @else value="{{ old('product_price') }}" @endif class="form-control" id="product_price">
                            </div>
                            <div class="form-group">
                                <label for="product_weight">Product Weight</label>
                                <input type="text" name="product_weight" @if(!empty($product->id)) value="{{ $product->product_weight }}"
                                       @else value="{{ old('product_weight') }}" @endif class="form-control" id="product_weight">
                            </div>

                            <div class="form-group">
                                <label for="product_discount">Product Discount (%)</label>
                                <input type="text" name="product_discount" @if(!empty($product->id)) value="{{ $product->product_discount }}"
                                       @else value="{{ old('product_discount') }}" @endif class="form-control" id="product_discount">
                            </div>

                            <div class="form-group" id="appendProductsLevel">
                                @include('admin.products.append_products_level')
                            </div>

                            <div class="form-group">
                                <label for="product_image">Product Image</label>
                                <input type="file" name="product_image" class="form-control" id="product_image">
                                @if(!empty($product->product_image))
                                    <a target="_blank" href="{{ url('admin/images/products/large/'.$product->product_image) }}">View Image</a>&nbsp;|&nbsp;
                                    <a href="javascript:void(0)" class="confirmDeleteImage" module="product-image" moduleid="{{ $product->id }}">Delete Image</a>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_video">Product video</label>
                                <input type="file" name="product_video" class="form-control" id="product_video">
                                @if(!empty($product->product_video))
                                    <a target="_blank" href="{{ url('admin/images/product_videos/'.$product->product_video) }}">View Video</a>&nbsp;|&nbsp;
                                    <a href="javascript:void(0)" class="confirmDelete" module="product-video" moduleid="{{ $product->id }}">Delete Video</a>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Product Description</label>
                                <textarea name="description" id="description"  class="form-control">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" @if(!empty($product->id)) value="{{ $product->meta_title }}"
                                       @else value="{{ old('meta_title') }}" @endif class="form-control" id="meta_title">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" name="meta_description" @if(!empty($product->id)) value="{{ $product->meta_description }}"
                                       @else value="{{ old('meta_description') }}" @endif class="form-control" id="meta_description">
                            </div>
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keywords</label>
                                <input type="text" name="meta_keyword" @if(!empty($product->id)) value="{{ $product->meta_keyword }}"
                                       @else value="{{ old('meta_keyword') }}" @endif class="form-control" id="meta_keyword">
                            </div>
                            <div class="form-group">
                                <label for="is_featured">Featured Item</label>
                                <input type="checkbox" name="is_featured" id="is_featured" class="" value="Yes" @if(!empty($product->is_featured) && $product->is_featured =='Yes') checked="" @endif>
                            </div>
                            <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



