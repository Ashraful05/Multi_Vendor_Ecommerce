@extends('admin.master')
@section('title','Update Vendor Details')
@section('body')
    <div class="content-wrapper">
        @if($slug=='personal')
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Vendor's Personal Details</h4>
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
                            <form class="forms-sample" action="{{ route('update.vendor.details','personal') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="name" value="{{ $vendorDetails->name }}" class="form-control" id="exampleInputUsername1" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $vendorDetails->email }}" class="form-control" id="email" placeholder="Email" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Phone Number</label>
                                    <input type="text" name="mobile" value="{{ $vendorDetails->mobile }}" class="form-control" id="mobile" min="10" max="11">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{ $vendorDetails->address }}" class="form-control" id="address">
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" value="{{ $vendorDetails->city }}" class="form-control" id="city">
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" name="state" value="{{ $vendorDetails->state }}" class="form-control" id="state">
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
{{--                                    <input type="text" name="country" value="{{ $vendorDetails->country }}" class="form-control" id="country">--}}
                                    <select name="country" class="form-control" id="country">
                                        <option value="">---Select Country---</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->country_name }}" @if($country->country_name==$vendorDetails->country) selected @endif>{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pincode">PinCode</label>
                                    <input type="text" name="pincode" value="{{ $vendorDetails->pincode }}" class="form-control" id="pincode">
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    @if(!empty($vendorDetails->image))
                                        <a target="_blank" href="{{ url('/vendor/images/photos/'.$vendorDetails->image) }}">View Image</a>
                                        <input type="hidden" name="current_vendor_image" value="{{ $vendorDetails->image }}">
                                    @else
                                        <a href="{{ url('vendor/images/no_image.png') }}">View Image</a>
                                    @endif
                                </div>
                                <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @elseif($slug=='business')
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Vendor Business Details</h4>
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
                            <form class="forms-sample row g-3" action="{{ route('update.vendor.details','business') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-md-4">
                                    <label for="email">Vendor UserName/Email</label>
                                    <input type="email" name="email" value="{{ $vendorDetails->email}}" class="form-control" id="email" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shop_name">Shop Name</label>
                                    <input type="text" name="shop_name" value="{{ $vendorsBusinessDetails->shop_name }}" class="form-control" id="shop_name" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shop_address">Shop Address</label>
                                    <input type="text" name="shop_address" value="{{ $vendorsBusinessDetails->shop_address }}" class="form-control" id="shop_address">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shop_city">Shop City</label>
                                    <input type="text" name="shop_city" value="{{ $vendorsBusinessDetails->shop_city }}" class="form-control" id="shop_city">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shop_state">Shop State</label>
                                    <input type="text" name="shop_state" value="{{ $vendorsBusinessDetails->shop_state }}" class="form-control" id="shop_state" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shop_country">Shop Country</label>
{{--                                    <input type="text" name="shop_country" value="{{ $vendorsBusinessDetails->shop_country }}" class="form-control" id="shop_country" >--}}
                                    <select name="shop_country" class="form-control" id="shop_country" style="color:#000;">
                                        <option value="">---Select Country---</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->country_name }}" @if($country->country_name==$vendorsBusinessDetails->shop_country) selected @endif>{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shop_pincode">Shop PinCode</label>
                                    <input type="text" name="shop_pincode" value="{{ $vendorsBusinessDetails->shop_pincode }}" class="form-control" id="shop_pincode">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shop_mobile">Shop Phone No</label>
                                    <input type="text" name="shop_mobile" value="{{ $vendorsBusinessDetails->shop_mobile }}" class="form-control" id="shop_mobile" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shop_website">Shop WebSite</label>
                                    <input type="text" name="shop_website" value="{{ $vendorsBusinessDetails->shop_website }}" class="form-control" id="shop_website" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="shop_email">Shop Email</label>
                                    <input type="text" name="shop_email" value="{{ $vendorsBusinessDetails->shop_email }}" class="form-control" id="shop_email" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address_proof">Address Proof</label>
                                    <select name="address_proof" id="address_proof" class="form-control" style="color:#000;">
                                        <option value="Passport" @if($vendorsBusinessDetails->address_proof == "Passport") selected @endif>Passport</option>
                                        <option value="Voting Card" @if($vendorsBusinessDetails->address_proof == "Voting Card") selected @endif>Voting Card</option>
                                        <option value="PAN" @if($vendorsBusinessDetails->address_proof == "PAN") selected @endif>PAN</option>
                                        <option value="Driving License" @if($vendorsBusinessDetails->address_proof == "Driving License") selected @endif>Driving License</option>
                                        <option value="Adahar Card" @if($vendorsBusinessDetails->address_proof == "Adahar Card") selected @endif>Adahar Card</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address_proof_image">Address Proof Image</label>
                                    <input type="file" name="address_proof_image" class="form-control" id="address_proof_image">
                                    @if(!empty($vendorsBusinessDetails->address_proof_image))
                                        <a target="_blank" href="{{ url('/admin/images/proofs/'.$vendorsBusinessDetails->address_proof_image) }}">View Image</a>
                                        <input type="hidden" name="current_address_proof_image" value="{{ $vendorsBusinessDetails->address_proof_image }}">
                                    @else
                                        <a target="_blank" href="{{ url('/admin/images/no_image.png') }}">View Image</a>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="business_license_number">License Number</label>
                                    <input type="text" name="business_license_number" value="{{ $vendorsBusinessDetails->business_license_number }}" class="form-control" id="business_license_number" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gst_number">GST Number</label>
                                    <input type="text" name="gst_number" value="{{ $vendorsBusinessDetails->gst_number }}" class="form-control" id="gst_number" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pan_number">Pan Number</label>
                                    <input type="text" name="pan_number" value="{{ $vendorsBusinessDetails->pan_number }}" class="form-control" id="pan_number" >
                                </div>
                                <button type="submit" class="form-control btn btn-primary mr-2">Update Business Details</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @elseif($slug=='bank')
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Vendor's Bank Details</h4>
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
                            <form class="forms-sample row g-3" action="{{ route('update.vendor.details','bank') }}" method="post">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="email">Vendor UserName/Email</label>
                                    <input type="email" name="email" value="{{ $vendorDetails->email}}" class="form-control" id="email" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="account_holder_name">Account Holder Name</label>
                                    <input type="text" name="account_holder_name" value="{{ $vendorsBankDetails->account_holder_name }}" class="form-control" id="account_holder_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ $vendorsBankDetails->bank_name }}" class="form-control" id="bank_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" name="account_number" value="{{ $vendorsBankDetails->account_number }}" class="form-control" id="account_number">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bank_ifsc_code">Bank IFIC Code</label>
                                    <input type="text" name="bank_ifsc_code" value="{{ $vendorsBankDetails->bank_ifsc_code }}" class="form-control" id="bank_ifsc_code">
                                </div>
                                <button type="submit" class="form-control btn btn-primary mr-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

