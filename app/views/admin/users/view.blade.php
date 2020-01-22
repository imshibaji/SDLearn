@extends('admin.users.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/user/list') }}" class="btn btn-primary">User List</a>
    </div>
@endsection

@section('usercontent') 
<h1>{{ $user->fname }} {{ $user->lname }}</h1>
<p>Email: {{ $user->email }}, Mobile: {{ $user->mobile }}, Skype: {{ $user->skype }}</p>
<p>Address: {{ $user->address }},{{ $user->city }}, {{ $user->state }}, {{ $user->country }}. Pincode: {{ $user->pincode }}</p>
<p>User Type: {{ $user->user_type }}, Active: {{ $user->active }}</p>
<p>Join At: {{ $user->created_at }}, Last Updated: {{ $user->updated_at }}</p>

<h3>{{ $user->reffered }}</h3>
<div>{{ $user->reffers }}</div>

<div class="row">
    <div class="col">
    <div class="accordion" id="courses">
        @foreach ($courses as $course)
        <div class="card">
            <div class="card-header" id="heading{{ $course->id }}">
                <h2 class="mb-0 row">
                    <div class="col">
                        <button class="btn btn-link" type="button" data-toggle="collapse" aria-expanded="true" data-target="#collapse{{ $course->id }}" aria-controls="collapse{{ $course->id }}">
                            {{ $course->title }}
                            <span class="badge badge-success">Assigned</span>
                        </button>
                    </div>
                    <div class="col text-right">
                        <button class="btn text-success btn-link btn-sm">
                            Assign
                        </button>
                        <button class="btn text-danger btn-link btn-sm">
                            UnAssign
                        </button>
                    </div>
                </h2>
            </div>
        
            <div id="collapse{{ $course->id }}" class="collapse" aria-labelledby="heading{{ $course->id }}" data-parent="#courses">
                <div class="card-body">
                        @foreach ($course->topics as $topic)
                            @if($topic->status == 'active')
                            <div class="list-group list-group-item list-group-item-action">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn btn-link">
                                            {{ $topic->title}}
                                        </a>
                                        <span class="badge badge-primary">Not Assigned</span>
                                        <span class="badge badge-secondary">2 Comments</span>
                                        <span class="badge badge-warning">Answered</span>
                                    </div> 
                                    <div class="col text-right">
                                        <button class="btn btn-outline-success btn-sm">
                                            Assign
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm">
                                            UnAssign
                                        </button>
                                        <button class="btn btn-outline-info btn-sm">
                                            Tasks / Answers
                                        </button>
                                        <button class="btn btn-outline-dark btn-sm">
                                            Comments
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</div>
@endsection

@section('headers')
<style>
#courses .card{
    margin-bottom: 0px !important;
}
#courses .card .card-header{
    padding: 5px;
}
#courses .card .card-body{
    padding: 0px;
}
</style>   
@endsection