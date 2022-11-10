@extends('admin.master')
@section('title','View Product Info')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Info</h4>
                        <a href="{{ url('admin/add-edit-category') }}" class="btn btn-outline-primary" style="float: right">Add New Category</a>
                        <div class="table-responsive pt-3">
                            <table id="categories" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                        ID#
                                    </th>
                                    <th>
                                        Category Name
                                    </th>
                                    <th>
                                        Parent Category Name
                                    </th>
                                    <th>Section</th>
                                    <th>URL</th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $row => $category)
                                    @if(isset($category['parentCategory']['category_name']) && !empty($category['parentCategory']['category_name']))
                                        @php($parent_category = $category['parentCategory']['category_name'])
                                    @else
                                       @php($parent_category="Root")
                                    @endif
                                    <tr>
                                        <td>
                                            {{ $category->id}}
                                        </td>
                                        <td>
                                            {{ $category['category_name'] }}
                                        </td>
                                        <td>{{ $parent_category }}</td>
                                        <td>{{ $category['section']['name'] }}</td>
                                        <td>{{ $category->url }}</td>
                                        <td>
                                            @if($category['status']==1)
                                                <a href="javascript:void(0)" class="updateCategoryStatus" id="category-{{ $category['id'] }}" category_id="{{ $category['id'] }}"><i style="font-size:30px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="updateCategoryStatus" id="category-{{ $category['id'] }}" category_id="{{ $category['id'] }}"><i style="font-size: 30px;" class="mdi mdi-bookmark-outline" status="InActive"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('add-edit-category',$category['id']) }}" ><i class="mdi mdi-pencil-box" style="font-size: 30px;"></i></a>
                                            <a id="confirmDelete" href="{{ route('delete-category',$category['id']) }}"><i class="mdi mdi-file-excel-box" style="font-size: 30px;"></i></a>
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


