@extends('admin.master')
@section('title','View Brand Info')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Brand Info</h4>
                        <a href="{{ url('admin/add-edit-brand') }}" class="btn btn-outline-primary" style="float: right">Add New Brand</a>
                        <div class="table-responsive pt-3">
                            <table id="brands" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        ID#
                                    </th>
                                    <th>
                                        Brand Name
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $row => $brand)
                                    <tr>
                                        <td>
                                            {{ $brand->id}}
                                        </td>
                                        <td>
                                            {{ $brand['name'] }}
                                        </td>
                                        <td>
                                            @if($brand['status']==1)
                                                <a href="javascript:void(0)" class="updateBrandStatus" id="brand-{{ $brand['id'] }}" brand_id="{{ $brand['id'] }}"><i style="font-size:30px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="updateBrandStatus" id="brand-{{ $brand['id'] }}" brand_id="{{ $brand['id'] }}"><i style="font-size: 30px;" class="mdi mdi-bookmark-outline" status="InActive"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('add-edit-brand',$brand['id']) }}" ><i class="mdi mdi-pencil-box" style="font-size: 30px;"></i></a>
                                            <a id="confirmDelete" href="{{ route('delete-brand',$brand['id']) }}"><i class="mdi mdi-file-excel-box" style="font-size: 30px;"></i></a>
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


