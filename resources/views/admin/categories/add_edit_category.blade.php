@extends('admin.master')
@section('title','Add/Edit Category')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('categories') }}" class="btn btn-success" style="float: right">View Category Info</a>
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
                        <form class="forms-sample" @if(empty($category->id)) action="{{ url('admin/add-edit-category') }}"
                              @else action="{{ route('add-edit-category',$category->id) }}" @endif  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="category_name" @if(!empty($category->id)) value="{{ $category->category_name }}"
                                       @else value="{{ old('category_name') }}" @endif class="form-control" id="category_name">
                            </div>
                            <div class="form-group">
                                <label for="section_id">Select Section</label>
                                <select name="section_id" id="section_id" class="form-control" style="color:#000;">
                                    <option value="" >---Select---</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}" @if(!empty($category) && $category->section_id==$section->id) selected @endif>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="appendCategoriesLevel">
                                @include('admin.categories.append_categories_level')
                            </div>

                            <div class="form-group">
                                <label for="category_image">Category Image</label>
                                <input type="file" name="category_image" class="form-control" id="category_image">
                                @if(!empty($category->category_image))
                                    <a target="_blank" href="{{ url('admin/images/categories/'.$category->category_image) }}">View Image</a>&nbsp;|&nbsp;
                                    <a href="javascript:void(0)" class="confirmDeleteImage" module="category-image" moduleid="{{ $category->id }}">Delete Image</a>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category_discount">Category Discount</label>
                                <input type="number" name="category_discount" @if(!empty($category->id)) value="{{ $category->category_discount }}"
                                       @else value="{{ old('category_discount') }}" @endif class="form-control" id="category_discount">
                            </div>
                            <div class="form-group">
                                <label for="description">Category Description</label>
                                <textarea name="description" id="description"  class="form-control">{{ $category->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">Category URL</label>
                                <input type="text" name="url" @if(!empty($category->id)) value="{{ $category->url }}"
                                       @else value="{{ old('url') }}" @endif class="form-control" id="url">
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Category Meta Title</label>
                                <input type="text" name="meta_title" @if(!empty($category->id)) value="{{ $category->meta_title }}"
                                       @else value="{{ old('meta_title') }}" @endif class="form-control" id="meta_title">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Category Meta Description</label>
                                <input type="text" name="meta_description" @if(!empty($category->id)) value="{{ $category->meta_description }}"
                                       @else value="{{ old('meta_description') }}" @endif class="form-control" id="meta_description">
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Category Meta Keywords</label>
                                <input type="text" name="meta_keywords" @if(!empty($category->id)) value="{{ $category->meta_keywords }}"
                                       @else value="{{ old('meta_keywords') }}" @endif class="form-control" id="meta_keywords">
                            </div>
                            <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


