@extends('layouts.user')

@section('content')
<div class="container">
    <div id="app" class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title ?? 'Dashboard' }}</div>

                <div class="card-body" style="min-height: 600px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('users.learn.main')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('headers')
<link rel="stylesheet" href="{{url('/')}}/css/prism_patched.min.css">
<style>
#accordionExample .card{
    margin-bottom: 0px !important;
}
#accordionExample .card-header{
    padding: 5px !important;
}
#accordionExample .card-body{
    padding: 0px;
    border-bottom: 2px solid #ccc;
}
#accordionExample .card-body .list-group{
    border-radius: 0px;
}
.scroll{
    height: 550px;
    border: 1px solid rgb(8, 140, 216);
    overflow-y: scroll;
}
.block1{
    border: 1px solid rgb(8, 140, 216);
    padding: 5px 15px;
    position: relative;
}
</style>
@endsection

@section('scripts')
<script src="{{url('/')}}/js/prism_patched.min.js"></script>
@endsection
