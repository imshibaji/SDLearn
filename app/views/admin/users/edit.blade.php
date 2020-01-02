@extends('admin.users.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/user/list') }}" class="btn btn-primary">User List</a>
    </div>
@endsection

@section('usercontent')   
<div class="container">
  <form action="{{route('adminuserupdate')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <input type="hidden" name="name" id="name" value="{{$user->name}}">
        <div class="form-group">
          <label for="fname">First Name</label>
          <input type="text" name="fname" class="form-control" id="fname" value="{{$user->fname}}">
        </div>
        <div class="form-group">
          <label for="lname">Last Name</label>
          <input type="text" name="lname" class="form-control" id="lname" value="{{$user->lname}}">
        </div>
        <div class="form-group">
          <label for="mobile">Mobile</label>
          <input type="text" name="mobile" class="form-control" id="mobile" value="{{$user->mobile}}">
        </div>
        <div class="form-group">
          <label for="skype">Skype</label>
          <input type="text" name="skype" class="form-control" id="skype" value="{{$user->skype}}">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control" id="address" value="{{$user->address}}">
        </div>
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" name="city" class="form-control" id="city" value="{{$user->city}}">
        </div>
        <div class="form-group">
          <label for="pincode">Pincode</label>
          <input type="text" name="pincode" class="form-control" id="pincode" value="{{$user->pincode}}">
        </div>
        <div class="form-group">
          <label for="state">State</label>
          <input type="text" name="state" class="form-control" id="state" value="{{$user->state}}">
        </div>
        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" name="country" class="form-control" id="country" value="{{$user->country}}">
        </div>
        <div class="form-group">
          <label for="utype">User Type</label>
          <select name="user_type" class="form-control" id="utype">
            <option value="user" @if($user->user_type == 'user') selected @endif>User</option>
            <option value="admin" @if($user->user_type == 'admin') selected @endif>Admin</option>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select name="active" class="form-control" id="active">
            <option value="1" @if($user->active == 1) selected @endif>Active</option>
            <option value="0" @if($user->active == 0) selected @endif>InActive</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection