@extends('layouts.user')

@section('content')
<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Course Details</div>

                <div class="card-body" style="min-height: 600px">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-center pt-5">{{ $course->title }}</h1>
                    <div class="text-center">
                        Price: <strong class="text-success">₹{{ $course->price }}/-</strong>
                        Premium Status: <strong class="text-success">{{ ucwords($course->premium_status) }}</strong>
                        <button class="btn btn-warning btn-sm" onclick="checking('{{ $course->title }}', {{$course->price}})">Enroll Now</button>
                    </div>
                    <div class="row my-5 justify-content-center">
                        <div class="col-md-8 col-sm-10 col-12 text-justify">
                            {!! $course->details !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.modal')
@endsection
