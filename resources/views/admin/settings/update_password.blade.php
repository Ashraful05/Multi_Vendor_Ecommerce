@extends('admin.master')
@section('title','Update Admin Password')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Admin Password</h4>
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error: </strong>{{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ route('update.admin.password') }}" method="post" name="updateAdminPassword" id="updateAdminPassword">
                            @csrf
                            <div class="form-group">
                                <label for="name">Admin Username</label>
                                <input type="text" value="{{ $adminDetails->name }}" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" value="{{ $adminDetails->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="type">Admin Type</label>
                                <input type="text" class="form-control" value="{{ $adminDetails->type }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="current_password" name="current_password" class="form-control" id="current_password" placeholder="Current Password" required>
                                <span id="check_password"></span>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="new_password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="confirm_password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
