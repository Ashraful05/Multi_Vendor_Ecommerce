@extends('admin.master')
@section('title','Add Edit Brand')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('brands') }}" class="btn btn-outline-primary" style="float:right;">View Brand Info</a>
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
                        <form class="forms-sample" @if(empty($brand->id)) action="{{ url('admin/add-edit-brand') }}"
                              @else action="{{ route('add-edit-brand',$brand->id) }}" @endif  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input type="text" name="name" @if(!empty($brand->id)) value="{{ $brand->name }}"
                                       @else value="{{ old('name') }}" @endif class="form-control" id="name">
                            </div>
                            <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

