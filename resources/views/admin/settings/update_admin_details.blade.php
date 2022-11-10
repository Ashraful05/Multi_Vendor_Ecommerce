@extends('admin.master')
@section('title','Update Admin Details')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Admin Details</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ route('update.admin.details') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                                <input type="text" name="name" value="{{ Auth::guard('admin')->user()->name }}" class="form-control" id="exampleInputUsername1" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Phone Number</label>
                                <input type="text" name="mobile" value="{{ Auth::guard('admin')->user()->mobile }}" class="form-control" id="mobile" min="10" max="11">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @if(!empty(Auth::guard('admin')->user()->image))
                                    <a target="_blank" href="{{ url('/admin/images/photos/'.Auth::guard('admin')->user()->image) }}">View Image</a>
                                    <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                                @else
                                    <a href="{{ url('admin/images/no_image.png') }}">View Image</a>
                                @endif
                            </div>
                            <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
