@extends('admin.master')
@section('title','Add/Edit Product Attribute')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('products') }}" class="btn btn-success" style="float: right">View Product Info</a>
                        <h4 class="card-title">Add Attribute</h4>
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
                        <form class="forms-sample" action="{{ route('add-edit-attribute',$product->id) }}" method="post" enctype="multipart/form-data">
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
                                @if(!empty($product->product_image))
                                    <img src="{{ url('admin/images/products/large/'.$product->product_image) }}" style="width: 120px;height: 120px;">
                                @else
                                    <img src="{{ url('admin/images/products/large/no_image.png') }}" style="width: 120px;height: 120px;" alt="">
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="field_wrapper">
                                    <div>
                                        <input type="text" name="size[]" placeholder="Size" style="width: 120px;" required/>
                                        <input type="text" name="sku[]" placeholder="SKU" style="width: 120px;" required/>
                                        <input type="text" name="price[]" placeholder="Price" style="width: 120px;" required/>
                                        <input type="text" name="stock[]" placeholder="Stock" style="width: 120px;" required/>
                                        <a href="javascript:void(0);" class="add_button" title="Add field">Add Attributes</a>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>
                        </form><hr>
                        <br><h4 class="card-title">Product Attributes</h4>

{{--                        <form action="{{ route('edit-product-attribute',$product->id) }}" method="post">--}}
{{--                            @csrf--}}
                            <table id="categories" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Size</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                <input type="text" name="product_id" value="{{ $product->id }}">--}}
                                @foreach($product['attributes'] as $attribute)
                                    {{--                                    <input type="hidden" name="attributeId[]" value="{{ $attribute['id'] }}">--}}
                                    <form action="{{ route('abcd',$attribute->id) }}" method="post">
                                        @csrf
                                        <tr>
                                            <td>
                                                <input type="text" name="ids" value="{{$attribute->id}}">
                                                {{ $attribute->id}}</td>
                                            <td>
                                                <input type="text" name="sizes" value="{{$attribute->size}}">
                                                {{ $attribute->size }} </td>
                                            <td>
                                                <input type="text" name="skus" value="{{$attribute->sku}}">
                                                {{ $attribute->sku }}</td>
                                            <td>
                                                <input type="number" name="price" value="{{ $attribute->price }}" style="width: 70px;" required>
                                            </td>
                                            <td>
                                                <input type="number" name="stock[]" value="{{ $attribute->stock }}" style="width: 70px;" required>
                                            </td>
                                            <td>

                                                @if($attribute['status']==1)
                                                    <a href="javascript:void(0)" class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}"><i style="font-size:30px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                                @else
                                                    <a href="javascript:void(0)" class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}"><i style="font-size: 30px;" class="mdi mdi-bookmark-outline" status="InActive"></i></a>
                                                @endif

                                            </td>
                                            <td><a id="confirmDelete" href="{{ route('delete-product-attribute',$attribute['id']) }}"><i class="mdi mdi-file-excel-box" style="font-size: 30px;"></i></a></td>
                                            <button type="submit" class="btn btn-info">Updatesdfs</button>
                                        </tr>

                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                            <button class="btn btn-outline-primary" type="submit">Update Attribute</button>
{{--                        </form>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




