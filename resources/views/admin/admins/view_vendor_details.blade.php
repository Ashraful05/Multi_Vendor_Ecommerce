@extends('admin.master')
@section('title','View Vendor Details')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h4><a href="{{ url('admin/admins/vendor') }}" style="float: right">Back to Vendors</a></h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Personal Details</h4>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $vendorDetails['vendorPersonal']['name'] }}" class="form-control" id="name" placeholder="Username" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $vendorDetails['vendorPersonal']['email'] }}" class="form-control" id="email" placeholder="Email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Phone Number</label>
                            <input type="text" name="mobile" value="{{ $vendorDetails['vendorPersonal']['mobile'] }}" class="form-control" id="mobile" min="10" max="11" disabled>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="{{ $vendorDetails['vendorPersonal']['address'] }}" class="form-control" id="address" disabled>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" value="{{ $vendorDetails['vendorPersonal']['city'] }}" class="form-control" id="city" disabled>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" value="{{ $vendorDetails['vendorPersonal']['state'] }}" class="form-control" id="state" disabled>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" value="{{ $vendorDetails['vendorPersonal']['country'] }}" class="form-control" id="country" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pincode">PinCode</label>
                            <input type="text" name="pincode" value="{{ $vendorDetails['vendorPersonal']['pincode'] }}" class="form-control" id="pincode" disabled>
                        </div>

                        @if(!empty($vendorDetails['vendorPersonal']['image']))
                            <div class="form-group">
                                <label for="image">Image</label><br>
                                <img src="{{ url('/vendor/images/photos/'.$vendorDetails['vendorPersonal']['image']) }}" style="width: 130px;height: 130px;" >
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Business Details</h4>
                        <div class="form-group">
                            <label for="shop_name">Shop Name</label>
                            <input type="text" name="shop_name" value="{{ $vendorDetails['vendorBusiness']['shop_name'] }}" class="form-control" id="name" placeholder="Username" disabled>
                        </div>
                        <div class="form-group">
                            <label for="shop_email">Email</label>
                            <input type="email" name="shop_email" value="{{ $vendorDetails['vendorBusiness']['shop_email'] }}" class="form-control" id="email" placeholder="Email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="shop_mobile">Phone Number</label>
                            <input type="text" name="shop_mobile" value="{{ $vendorDetails['vendorBusiness']['shop_mobile'] }}" class="form-control" id="mobile" min="10" max="11" disabled>
                        </div>
                        <div class="form-group">
                            <label for="shop_address">Address</label>
                            <input type="text" name="shop_address" value="{{ $vendorDetails['vendorBusiness']['shop_address']}}" class="form-control" id="address" disabled>
                        </div>
                        <div class="form-group">
                            <label for="shop_city">Shop City</label>
                            <input type="text" name="shop_city" value="{{ $vendorDetails['vendorBusiness']['shop_city'] }}" class="form-control" id="city" disabled>
                        </div>
                        <div class="form-group">
                            <label for="shop_state">Shop State</label>
                            <input type="text" name="shop_state" value="{{ $vendorDetails['vendorBusiness']['shop_state'] }}" class="form-control" id="state" disabled>
                        </div>
                        <div class="form-group">
                            <label for="shop_country">Shop Country</label>
                            <input type="text" name="shop_country" value="{{ $vendorDetails['vendorBusiness']['shop_country'] }}" class="form-control" id="country" disabled>
                        </div>
                        <div class="form-group">
                            <label for="shop_pincode">PinCode</label>
                            <input type="text" name="shop_pincode" value="{{ $vendorDetails['vendorBusiness']['shop_pincode'] }}" class="form-control" id="pincode" disabled>
                        </div>
                        <div class="form-group">
                            <label for="address_proof">Address Proof</label>
                            <input type="text" name="address_proof" value="{{ $vendorDetails['vendorBusiness']['address_proof'] }}" class="form-control" id="address_proof" disabled>
                        </div>
                        @if(!empty($vendorDetails['vendorBusiness']['address_proof_image']))
                            <div class="form-group">
                                <label for="address_proof_image">Address Proof Image</label><br>
                                <img src="{{ url('/admin/images/proofs/'.$vendorDetails['vendorBusiness']['address_proof_image']) }}" style="width: 130px;height: 130px;" >
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="business_license_number">Business License Number</label>
                            <input type="text" name="business_license_number" value="{{ $vendorDetails['vendorBusiness']['business_license_number'] }}" class="form-control" id="business_license_number" disabled>
                        </div>
                        <div class="form-group">
                            <label for="gst_number">GST Number</label>
                            <input type="text" name="gst_number" value="{{ $vendorDetails['vendorBusiness']['gst_number'] }}" class="form-control" id="business_license_number" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pan_number">PAN Number</label>
                            <input type="text" name="pan_number" value="{{ $vendorDetails['vendorBusiness']['pan_number'] }}" class="form-control" id="pan_number" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bank Details</h4>

                        <div class="form-group">
                            <label for="name">Account Holder Name</label>
                            <input type="text" name="name" value="{{ $vendorDetails['vendorBank']['account_holder_name'] }}" class="form-control" id="name" placeholder="Username" disabled>
                        </div>
                        <div class="form-group">
                            <label for="name">Bank Name</label>
                            <input type="text" name="name" value="{{ $vendorDetails['vendorBank']['bank_name'] }}" class="form-control" id="name" placeholder="Username" disabled>
                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" name="account_number" value="{{ $vendorDetails['vendorBank']['account_number'] }}" class="form-control" id="mobile" min="10" max="11" disabled>
                        </div>
                        <div class="form-group">
                            <label for="bank_ifsc_code">Bank IFIC Code</label>
                            <input type="text" name="bank_ifsc_code" value="{{ $vendorDetails['vendorBank']['bank_ifsc_code'] }}" class="form-control" id="city" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
