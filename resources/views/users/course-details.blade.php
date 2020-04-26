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
                                    <h5>Topic Index</h5>
                                </li>
                                <a href="{{ route('usercdetails', $course->id) }}" class="list-group-item list-group-item-action {{ Request::is('user/course-details/'.$course->id) ? 'active' : '' }}">
                                  Overview
                                </a>
                                @foreach ($topics as $ta)
                                    @if($ta->status == 'active')
                                        <a href="{{ url('/') }}/user/course-details/{{$course->id}}/{{$ta->id}}" class="list-group-item list-group-item-action {{ Request::is('user/course-details/'.$course->id.'/'.$ta->id) ? 'active' : '' }}">{{ $ta->title }}</a>
                                    @endIf
                                @endforeach
                            </div>
                            {{-- End Menu Index --}}
                        </div>
                        {{-- End Left --}}

                        {{-- Start Right --}}
                        <div class="col-md-8">
                            <div id="course_content">
                                @if ($topic)
                                        <h1 class="text-center">{{$topic->title}}</h1>
                                        <div class="py-3">{!! $topic->embed_code !!}</div>
                                        @include('users.learn.contents')
                                @else
                                    <h1 class="text-center">{{ $course->title }}</h1>
                                    <div class="my-2">
                                        {!! $course->details !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('headers')
<link rel="stylesheet" href="{{url('/')}}/css/prism_patched.min.css">
@endsection

@section('scripts')
<script src="{{url('/')}}/js/prism_patched.min.js"></script>
@endsection