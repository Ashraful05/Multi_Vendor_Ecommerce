@extends('admin.master')
@section('title','Add/Edit Image')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('products') }}" class="btn btn-success" style="float: right">View Product Info</a>
                        <h4 class="card-title">Add Images</h4>
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
                        <form class="forms-sample" action="{{ route('add-images',$product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                &nbsp;{{ $product->product_name }}
                            </div>
                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                &nbsp;{{ $product->product_code }}
                            </div>
                            <div class="form-group">
                                <label for="product_color">Product Color</label>
                                &nbsp;{{ $product->product_color }}
                            </div>
                            <div class="form-group">
                                <label for="product_price">Product Price</label>
                                &nbsp;{{ $product->product_price }}
                            </div>
                            <div class="form-group">
                                <img src="{{ (!empty($product->product_image))?asset($product->product_image):url('front/no_image.png') }}" alt="">
                            </div>
                            <div class="form-group">
                                <div class="field_wrapper">
                                    <div>
                                        <input type="file" name="images[]" class="form-control" multiple id="images">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>
                        </form>
                        <br><h4 class="card-title">Product Images</h4>
                            <table id="categories" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product['images'] as $image)
                                    <tr>
                                        <td>{{ $image->id}}</td>
                                        <td>
                                            <img src="{{ (!empty($image->image))?asset($image->image):url('front/no_image.png') }}" alt="">
                                        </td>
                                        <td>
                                            @if($image->status==1)
                                                <a href="javascript:void(0)" class="updateImageStatus" id="image-{{ $image->id }}" image_id="{{ $image->id }}">
                                                    <i style="font-size: 30px;" class="mdi mdi-bookmark-check" status="Active"></i>
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" class="updateImageStatus" id="image-{{ $image->id }}" image_id="{{ $image->id }}">
                                                    <i style="font-size: 30px;" class="mdi mdi-bookmark-check" status="InActive"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td><a id="confirmDelete" href="{{ route('delete_product_multiple_image',$image['id']) }}"><i class="mdi mdi-file-excel-box" style="font-size: 30px;"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




