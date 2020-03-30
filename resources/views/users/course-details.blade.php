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

                    <div class="row">
                        <div class="col-md-4">
                            <div class="list-group pb-2">
                                <li class="list-group-item">
                                    <h5>Course Index</h5>
                                </li>
                                <a href="{{ route('usercdetails', $course->id) }}" class="list-group-item list-group-item-action active">
                                  Overview
                                </a>
                                @foreach ($topics as $ta)
                                    @if($ta->status == 'active')
                                        <a href="{{ url('/') }}/user/course-details/{{$course->id}}?tid={{$ta->id}}" class="list-group-item list-group-item-action">{{ $ta->title }}</a>
                                    @endIf
                                @endforeach

                                {{-- <a href="#" class="list-group-item list-group-item-action">Index</a>
                                <a href="#" class="list-group-item list-group-item-action">Setup</a>
                                <a href="#" class="list-group-item list-group-item-action">Html Codes</a> --}}
                            </div>
                            {{-- End Menu Index --}}

                            {{-- FeedBack --}}
                            <div class="card my-3" id="comment_section">
                                <div class="card-body">
                                    <h5 class="text-center">Feedback Section</h5>
                                    <div class="form-group">
                                        <label for="Title">Title</label>
                                        <input type="text" class="form-control" id="Title" placeholder="Short Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="Message">Message</label>
                                        <textarea class="form-control" id="Message" placeholder="Comment in Detail"></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-outline-success btn-block" value="Submit" />
                                </div>
                            </div>
                            {{-- End Feedback --}}
                        </div>
                        {{-- End Left --}}

                        <div class="col-md-8">
                            {{-- Course Details --}}
                            <h1 class="text-center">{{ $course->title }}</h1>
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

                            {{-- Course Details --}}
                            <div class="my-5">
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


@section('headers')
<style>
.sticky {
  position: fixed;
  top: 80px;
  width: 326px;
}
</style>
@endsection

@section('scripts')
<script>
window.onscroll = function() {myFunction()};

var comment = document.getElementById("comment_section");

var sticky = comment.offsetTop;

function myFunction() {
    if(window.innerWidth > 500){
        if (window.pageYOffset > sticky) {
            comment.classList.add("sticky");
        } else {
            comment.classList.remove("sticky");
        }
    }
}
</script>
@endsection