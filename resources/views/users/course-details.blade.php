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
                        Price:
                        @if($course->offer_price != null) 
                            <strong class="text-danger"><del>₹{{ $course->actual_price }}/-</del></strong>
                            <strong class="text-success">₹{{ $course->offer_price }}/-</strong>,
                        @else
                        <strong class="text-success">₹{{ $course->actual_price }}/-</strong>,
                        @endif
                        Duration: <strong class="text-success">{{ $course->duration }}</strong>,
                        Accessible: <strong class="text-success">{{ ucwords($course->accessible) }}</strong>
                        <button class="btn btn-warning btn-sm" onclick="checking('{{ $course->title }}', {{$course->actual_price}})">Enroll Now</button>
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
