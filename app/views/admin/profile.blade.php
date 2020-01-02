@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Stuff Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <label>Title</label>
                            <input type="text" name="title" placeholder="Input your Company name" class="form-control"/>
                        </div>
                        <div class="col">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Input your Company Address" class="form-control"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Details</label>
                            <textarea name="details" placeholder="Input your Company details" class="form-control"></textarea>
                        </div>
                        <div class="col">
                            <label>Values</label>
                            <textarea name="values" placeholder="Input your Company Values" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Values</label>
                            <textarea name="values" placeholder="Input your Company Values" class="form-control"></textarea>
                        </div>
                        <div class="col">
                            <label>Details</label>
                            <input type="text" name="details" placeholder="Input your Company Details" class="form-control"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Company Title</label>
                            <input type="text" name="title" placeholder="Input your Company name" class="form-control"/>
                        </div>
                        <div class="col">
                            <label>Details</label>
                            <input type="text" name="details" placeholder="Input your Company Details" class="form-control"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Company Title</label>
                            <input type="text" name="title" placeholder="Input your Company name" class="form-control"/>
                        </div>
                        <div class="col">
                            <label>Details</label>
                            <input type="text" name="details" placeholder="Input your Company Details" class="form-control"/>
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
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control">
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
                            <input type="submit" class="btn btn-success btn-block" value="Submit">
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

