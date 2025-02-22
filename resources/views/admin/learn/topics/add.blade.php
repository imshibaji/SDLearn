@extends('admin.learn.topics.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/learn/topic/list') }}" class="btn btn-primary">Topic List</a>
    </div>
@endsection

@section('contentarea')
<form action="{{route('admintopiccreate')}}" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Input Topic Title">
                </div>
                <div class="form-group">
                    <textarea name="details" id="editor" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cat_id">Select Catagory</label>
                    <select name="course_id" id="cat_id" class="form-control">
                        @foreach ($courses as $course)
                        <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="embed_code">Embed Video</label>
                    <textarea name="embed_code" id="embed_code" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <div class="input-group">
                        <input type="number" id="hours" name="duration[hours]" class="form-control" placeholder="hours">
                        <input type="number" id="minutes" name="duration[minutes]" class="form-control" placeholder="minutes">
                        <input type="number" id="seconds" name="duration[seconds]" class="form-control" placeholder="seconds">
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="number" id="totsec" name="duration[totsec]" readonly class="form-control" placeholder="Total Seconds">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Select Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">InActive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pstatus">Premium Status</label>
                    <select name="premium_status" id="pstatus" class="form-control">
                        <option value="free">Free</option>
                        <option value="premium">Premium</option>
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