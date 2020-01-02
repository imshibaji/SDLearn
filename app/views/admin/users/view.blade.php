@extends('admin.users.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/user/list') }}" class="btn btn-primary">User List</a>
    </div>
@endsection

@section('usercontent') 
<h1>User Details</h1>

{{ $user }}

@endsection