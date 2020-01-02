@extends('admin.users.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/user/list') }}" class="btn btn-primary">User List</a>
    </div>
@endsection

@section('usercontent')   
<div class="container">
  <form action="{{route('adminusercreate')}}" method="POST">
    @csrf
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
          <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
          <label for="fname">First Name</label>
          <input type="text" name="fname" class="form-control" id="fname">
        </div>
        <div class="form-group">
          <label for="lname">Last Name</label>
          <input type="text" name="lname" class="form-control" id="lname">
        </div>
        <div class="form-group">
          <label for="mobile">Mobile</label>
          <input type="text" name="mobile" class="form-control" id="mobile">
        </div>
        <div class="form-group">
          <label for="skype">Skype</label>
          <input type="text" name="skype" class="form-control" id="skype">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control" id="address">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" name="city" class="form-control" id="city">
        </div>
        <div class="form-group">
          <label for="pincode">Pincode</label>
          <input type="text" name="pincode" class="form-control" id="pincode">
        </div>
        <div class="form-group">
          <label for="state">State</label>
          <input type="text" name="state" class="form-control" id="state">
        </div>
        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" name="country" class="form-control" id="country">
        </div>
        <div class="form-group">
          <label for="utype">User Type</label>
          <select name="user_type" class="form-control" id="utype">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select name="active" class="form-control" id="active">
            <option value="1">Active</option>
            <option value="0">InActive</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
