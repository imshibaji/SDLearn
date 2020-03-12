@extends('layouts.user')

@section('content')
<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Course List</div>

                <div class="card-body" style="min-height: 600px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="container">
                        <div class="row">
                            @foreach ($courses as $course)
                            <div class="col-12 col-sm-6 col-md-3 block p-2">
                                <h4 class="text-center m-0">{{ $course->title }}</h4>
                                <div class="py-2">
                                    <div class="text-justify py-2">
                                        {{$course->meta_desc}}.
                                    </div>
                                    <div class="text-justify p-2">
                                        Duration: {{ $course->duration }}<br/>
                                        Price: 
                                        @if($course->offer_price != null) 
                                            <strong class="text-danger"><del>₹{{ $course->actual_price }}/-</del></strong>
                                            <strong class="text-success">₹{{ $course->offer_price }}/-</strong>
                                        @else
                                            <strong class="text-success">₹{{ $course->actual_price }}/-</strong>
                                        @endif<br/>
                                        Accessible: <strong class="text-success">{{ ucwords($course->accessible) }}</strong>
                                    </div>
                                </div>
                                <div class="text-center px-4">
                                    <a href="{{ route('usercdetails', $course->id) }}" class="btn btn-primary">Learn More</a>
                                    <button class="btn btn-warning" onclick="checking('{{$course->title}}', {{$course->actual_price}})">Enroll Now</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.modal')
@endsection

@section('headers')
<style>
.block{
    margin: 0px;
}
</style>
@endsection
