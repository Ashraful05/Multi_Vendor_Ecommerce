@extends('admin.master')
@section('title','Edit Banner')
@section('body')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('slider_banner') }}" class="btn btn-success" style="float: right">View Banner Info</a>
                        <h4 class="card-title text-center">Update Banner</h4>
                    </div>
                    <div class="card-body">

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
                        <form class="forms-sample"  action="{{ route('update_banner',$editBanner->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $editBanner->image }}">
                            <div class="form-group">
                                <label for="category_name">Banner Title</label>
                                <input type="text" name="title" value="{{ old('title',$editBanner->title) }}" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Banner Alt</label>
                                <input type="text" name="alt" value="{{ old('alt',$editBanner->alt) }}" class="form-control" id="alt">
                            </div>
                            <div class="form-group">
                                <label for="category_name">Banner Link</label>
                                <input type="text" name="link" value="{{ old('link',$editBanner->link) }}" class="form-control" id="link">
                            </div>
                            <div class="form-group">
                                <label for="type">Banner Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    <option value="fix" @if(!empty($editBanner) && $editBanner->type=='fix') selected @endif>Fix</option>
                                    <option value="slider" @if(!empty($editBanner) && $editBanner->type=='slider') selected @endif>Slider</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category_image">Banner Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <div class="form-group">
                                <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($editBanner->image))?asset($editBanner->image):url('admin/images/no_image.png') }}" style="height: 70px;width: 70px;" alt="Card image cap">
                            </div>
                            <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection


