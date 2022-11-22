@extends('admin.master')
@section('title','View Product Info')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Info</h4>
                        <a href="{{ url('admin/add-edit-product') }}" class="btn btn-outline-primary" style="float: right">Add New Product</a>
                        <div class="table-responsive pt-3">
                            <table id="categories" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        ID#
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Product Code
                                    </th>
                                    <th>Product Color</th>
                                    <th>Section Name</th>
                                    <th>Category Name</th>
                                    <th>Product Image</th>
                                    <th>Added By</th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $row => $product)
                                    @if(isset($category['parentCategory']['category_name']) && !empty($category['parentCategory']['category_name']))
                                        @php($parent_category = $category['parentCategory']['category_name'])
                                    @else
                                        @php($parent_category="Root")
                                    @endif
                                    <tr>
                                        <td>
                                            {{ $product->id}}
                                        </td>
                                        <td>
                                            {{ $product->product_name }}
                                        </td>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->product_color }}</td>
                                        <td>{{ $product['section']['name'] }}</td>
                                        <td>{{ $product['category']['category_name'] }}</td>
                                        <td>
{{--                                            @if(!empty($product->product_image))--}}
{{--                                                <img src="{{ asset('admin/images/products/large/'.$product->product_image) }}" style="width: 70px;height: 70px;" alt="">--}}
{{--                                                <img src="{{ (!empty($product->product_image))?asset('admin/images/products/large/'.$product->product_image):url('admin/images/products/small/no_image.png') }}" alt="">--}}
                                                <img src="{{ (!empty($product->product_image))?asset($product->product_image):url('front/no_image.png') }}" alt="">
{{--                                            @else--}}
{{--                                                <img src="{{ asset('admin/images/products/small/no_image.png') }}" style="width: 70px;height:70px;" alt="">--}}
{{--                                            @endif--}}
                                        </td>
                                        <td>
                                            @if($product->admin_type=='vendor')
                                                <a target="_blank" href="{{ route('view.vendor.details',$product->admin_id) }}">{{ ucfirst($product->admin_type) }}</a>
                                            @else
                                                <a href="#">{{ ucfirst($product->admin_type )}}</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product['status']==1)
                                                <a href="javascript:void(0)" class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}"><i style="font-size:30px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="updateProductStatus" id="product-{{ $roduct['id'] }}" product_id="{{ $product['id'] }}"><i style="font-size: 30px;" class="mdi mdi-bookmark-outline" status="InActive"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('add-edit-product',$product['id']) }}" title="Edit Product"><i class="mdi mdi-pencil-box" style="font-size: 30px;"></i></a>
                                            <a href="{{ route('add-edit-attribute',$product['id']) }}" title="Add Attribute"><i class="mdi mdi-plus-box" style="font-size: 30px;"></i></a>
                                            <a href="{{ route('add-images',$product->id) }}" title="Add Multiple Image"><i class="mdi mdi-library-plus" style="font-size: 30px;"></i></a>
                                            <a id="confirmDelete" href="{{ route('delete-product',$product['id']) }}" title="Delete Image"><i class="mdi mdi-file-excel-box" style="font-size: 30px;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


