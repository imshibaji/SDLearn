@extends('layouts.front')

@section('content')
<div class="bg-dark">
<div class="contents container page-height">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center d-none d-md-block">
            <h5 class="text-warning">Do you finding a good opportunity?</h5>
            <h2 class="text-light">Quick Join Now.</h2>
            <h6>Never Loose the opportunities.</h6>
        </div>
        <div class="col-md-4 bg-light block">
        <form method="POST" action="{{route('signup')}}">
            @csrf
            <div class="row p-2">
                <div class="col text-center">
                    <h2>Signup Now</h2>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-3">
                    <label>Email<span class="text-danger">*</span></label>
                </div>
                <div class="col-9">
                    <input type="email" class="form-control" name="email" required>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-3">
                    <label>Password<span class="text-danger">*</span></label>
                </div>
                <div class="col-9">
                    <input type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="row">
                <div class="col pt-2">
                    <h5 class="text-center m-0">User Details</h5>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <label>First Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="fname" required>
                </div>
                <div class="col">
                    <label>Last Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="lname" required>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <label>Mobile Number<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="mobile" required>
                </div>
                <div class="col">
                    <label>Skype</label>
                    <input type="text" class="form-control" name="skype">
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address">
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <label>City<span class="text-danger">*</span></label>
                    <select class="form-control" name="state">
                        @foreach ($cities as $city)
                            <option>{{ $city }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label>Pincode<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="pincode" required>
                </div>
            </div>
            <div class="row p-2">
                <div class="col">
                    <label>State<span class="text-danger">*</span></label>
                    <select class="form-control" name="state">
                        @foreach ($states as $state)
                            <option>{{ $state }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label>Country<span class="text-danger">*</span></label>
                    <select class="form-control" name="country">
                        @foreach ($countries as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row p-2">
                <div class="col text-center">
                    <button type="submit" class="btn btn-success btn-block">
                        <i class="fa fa-sign-in"></i>
                        Sign Up
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
@endsection
