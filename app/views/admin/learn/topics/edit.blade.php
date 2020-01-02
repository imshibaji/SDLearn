@extends('admin.learn.topics.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/learn/topic/list') }}" class="btn btn-primary">Topic List</a>
    </div>
@endsection

@section('contentarea')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <form action="{{route('admintopicupdate')}}" method="POST">
                    @csrf
                    <input type="hidden" name="tid" class="form-control" value="{{ $topic->id }}">
                <table class="table">
                    <tr>
                        <td>Title</td>
                    <td><input type="text" name="title" class="form-control" value="{{ $topic->title }}"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="details" id="editor" class="form-control">{{ $topic->details }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        @php
                            $dur = json_decode($topic->duration, true);
                        @endphp
                        <td class="row">
                            <div class="col">
                                <input type="number" id="hours" name="duration[hours]" class="form-control" placeholder="hours" value="{{ $dur['hours'] }}">
                            </div>
                            <div class="col">
                                <input type="number" id="minutes" name="duration[minutes]" class="form-control" placeholder="minutes" value="{{ $dur['minutes'] }}">
                            </div>
                            <div class="col">
                                <input type="number" id="seconds" name="duration[seconds]" class="form-control" placeholder="seconds" value="{{ $dur['seconds'] }}">
                            </div>
                            <div class="col">
                                <input type="number" id="totsec" name="duration[totsec]" readonly class="form-control" placeholder="total seconds" value="{{ $dur['totsec'] }}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Course Name</td>
                        <td>
                            <select name="course_id" class="form-control">
                                @foreach ($courses as $course)
                                <option value="{{$course->id}}" >{{$course->title}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" class="form-control">
                                <option value="active" @if($topic->status == 'active') selected @endIf>Active</option>
                                <option value="inactive" @if($topic->status == 'inactive') selected @endIf>InActive</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Premium Status</td>
                        <td>
                            <select name="premium_status" class="form-control">
                                <option value="free" @if($topic->premium_status == 'free') selected @endIf>Free</option>
                                <option value="premium" @if($topic->premium_status == 'premium') selected @endIf>Premium</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" class="btn btn-success" value="Submit"></td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
window.onload = function(){
    CKEDITOR.replace('editor');
}
$('#hours, #minutes, #seconds').keyup(()=>{
    var hours = $('#hours').val();
    var minutes = $('#minutes').val();
    var seconds = $('#seconds').val();

    var totsec = (hours*3600)+(minutes*60)+(seconds*1) || '';
    $('#totsec').val(totsec);
});
</script>
@endsection