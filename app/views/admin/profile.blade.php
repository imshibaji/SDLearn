@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label>First Name</label>
                                    <input type="text" name="fname" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Date Of Birth</label>
                            <input type="date" name="dob" placeholder="Input your Date of Birth" class="form-control"/>
                        </div>
                        <div class="col">
                            <label>Profession</label>
                            <input type="text" name="profession" placeholder="Input your profession" class="form-control"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Organization Name</label>
                            <input type="text" name="orgname" placeholder="Input your Organization Name" class="form-control" />
                        </div>
                        <div class="col">
                            <label>WhatsApp</label>
                            <input type="text" name="whatsapp" placeholder="Input your WhatsApp" class="form-control" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Address</label>
                            <input name="address" placeholder="Input your address" class="form-control" />
                        </div>
                        <div class="col">
                            <label>City</label>
                            <input type="text" name="city" placeholder="Input your city" class="form-control"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Pincode</label>
                            <input type="text" name="pincode" placeholder="Input your pincode" class="form-control"/>
                        </div>
                        <div class="col">
                            <label>State</label>
                            <input type="text" name="state" placeholder="Input your State" class="form-control"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Country</label>
                            <input type="text" name="country" placeholder="Input your Country" class="form-control"/>
                        </div>
                        <div class="col">
                            <label>User Type</label>
                            <input name="user_type" class="form-control" placeholder="User Type" readonly />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Account Manager</label>
                            <input type="text" name="manager_name" placeholder="Input your manager name" class="form-control" readonly/>
                        </div>
                        <div class="col">
                            <label>Manager Number</label>
                            <input type="text" name="manager_number" placeholder="Input your manager number" class="form-control" readonly/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Account Refferal</label>
                            <input type="text" name="refferal_name" placeholder="Input your refferal name" class="form-control" readonly/>
                        </div>
                        <div class="col">
                            <label>Manager Number</label>
                            <input type="text" name="refferal_number" placeholder="Input your refferal number" class="form-control" readonly/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col pt-3">
                            <input type="submit" class="btn btn-success btn-block" value="Save">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Right Part --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Login Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Current Password</label>
                            <input type="text" name="current-password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>New Password</label>
                            <input type="text" name="new-password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Confirm Password</label>
                            <input type="text" name="confirm-password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pt-3">
                            <input type="submit" class="btn btn-success btn-block" value="Change Password">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('headers')
<style>
.card-body{
    text-align: left !important;
}
</style>
@endsection

