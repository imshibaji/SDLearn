@extends('admin.learn.course.layout')


@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/learn/course/list') }}" class="btn btn-primary">Course List</a>
    </div>
@endsection


@section('contentarea')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{$course->title}}</h1>
            <div>{!! $course->details !!}</div>
        </div>
    </div>
</div>
    <table class="table">
        <tr>
            <th>Topic Name</th>
            <th>Description</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($course->topics as $topic)
            <tr>
                <td>{{$topic->title}}</td>
                <td>{{ substr($topic->details, 0, 60) }}</td>
                <td>
                    @php
                        $dur = json_decode($topic->duration, true);
                    @endphp
                    {{ $dur['totsec'] }}
                </td>
                <td>{{$topic->status}}</td>
                <td>
                    <a href="{{url('/')}}/admin/learn/topic/view/{{$topic->id}}" class="btn btn-info">View</a>
                    <a href="{{url('/')}}/admin/learn/topic/edit/{{$topic->id}}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" onclick="remove('{{ $topic->id }}')">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('scripts')
<script>
function remove(id){
    if(confirm('Are you sure? Topic Id:'+id)){
        $.post('{{url('/')}}/admin/learn/topic/delete/'+id, {_token: '<?php echo csrf_token() ?>'}, (res)=>{
            console.log(res);
            if(res.out){
                location.reload();
            }
        });
    }
}
</script>
@endsection