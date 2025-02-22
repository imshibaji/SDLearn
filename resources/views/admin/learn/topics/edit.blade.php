@extends('admin.learn.topics.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/learn/topic/list') }}" class="btn btn-primary">Topic List</a>
    </div>
@endsection

@section('contentarea')
<form action="{{route('admintopicupdate')}}" method="POST">
    @csrf
    <input type="hidden" name="tid" class="form-control" value="{{ $topic->id }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Input Topic Title" value="{{ $topic->title }}">
                </div>
                <div class="form-group">
                    <textarea name="details" id="editor" class="form-control">{{ $topic->details }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cat_id">Select Catagory</label>
                    <select name="course_id" id="cat_id" class="form-control">
                        @foreach ($courses as $course)
                            <option value="{{$course->id}}" @if($course->id === $topic->course->id) selected @endif>{{$course->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="embed_code">Embed Video</label>
                    <textarea name="embed_code" id="embed_code" class="form-control">{{ $topic->embed_code }}</textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    @php
                        $dur = json_decode($topic->duration, true);
                    @endphp
                    <div class="input-group">
                        <input type="number" id="hours" name="duration[hours]" class="form-control" placeholder="hours" value="{{ $dur['hours'] }}">
                        <input type="number" id="minutes" name="duration[minutes]" class="form-control" placeholder="minutes" value="{{ $dur['minutes'] }}">
                        <input type="number" id="seconds" name="duration[seconds]" class="form-control" placeholder="seconds" value="{{ $dur['seconds'] }}">
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="number" id="totsec" name="duration[totsec]" readonly class="form-control" placeholder="Total Seconds" value="{{ $dur['totsec'] }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Select Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active" @if($topic->status == 'active') selected @endIf>Active</option>
                        <option value="inactive" @if($topic->status == 'inactive') selected @endIf>InActive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pstatus">Premium Status</label>
                    <select name="premium_status" id="pstatus" class="form-control">
                        <option value="free" @if($topic->premium_status == 'free') selected @endIf>Free</option>
                        <option value="premium" @if($topic->premium_status == 'premium') selected @endIf>Premium</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col"><input type="submit" class="btn btn-success btn-block" value="Submit"></div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
window.onload = function(){
    CKEDITOR.replace('embed_code', {
      height: 80,
      // Define the toolbar groups as it is a more accessible solution.
      toolbarGroups: [
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        }
      ],
    });
    CKEDITOR.replace('editor', {
      height: 365,
      baseFloatZIndex: 10005,
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Cut,Copy,Paste,PasteText,PasteFromWord'
    });
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