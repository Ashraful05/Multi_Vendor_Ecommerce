@extends('admin.master')
@section('title','Banner Info')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banner Info</h4>
                        <a href="{{ route('add_banner') }}" class="btn btn-outline-primary" style="float: right">Add New Banner</a>
                        <div class="table-responsive pt-3">
                            <table id="categories" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        ID#
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                       Link
                                    </th>
                                    <th>Title</th>
                                    <th>Alt</th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banners as $row => $banner)
                                    <tr>
                                        <td>
                                            {{ $banner->id}}
                                        </td>
                                        <td>
                                            <img src="{{ !(empty($banner->image))?asset($banner->image):url('admin/images/no_image.png') }}" alt="">
                                        </td>
                                        <td>{{ $banner->link }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->alt }}</td>
                                        <td>
                                            @if($banner->status == 1)
                                                <a href="javascript:void(0)" class="updateBannerStatus" id="banner-{{ $banner->id }}" banner_id="{{ $banner->id }}"><i style="font-size:30px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="updateBannerStatus" id="banner-{{ $banner->id }}" banner_id="{{ $banner->id }}"><i style="font-size: 30px;" class="mdi mdi-bookmark-outline" status="InActive"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit_banner',$banner->id) }}" ><i class="mdi mdi-pencil-box" style="font-size: 30px;"></i></a>
                                            <a id="confirmDelete" href="{{ route('delete_banner',$banner->id) }}"><i class="mdi mdi-file-excel-box" style="font-size: 30px;"></i></a>
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



