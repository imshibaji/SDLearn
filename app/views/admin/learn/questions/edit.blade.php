@extends('admin.learn.topics.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/learn/question/list') }}" class="btn btn-primary">Question List</a>
    </div>
@endsection

@section('contentarea')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea name="desc" id="editor" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td class="row">
                            <div class="col">
                                <input type="number" id="hours" name="hours" class="form-control" placeholder="hours">
                            </div>
                            <div class="col">
                                <input type="number" id="minutes" name="minutes" class="form-control" placeholder="minutes">
                            </div>
                            <div class="col">
                                <input type="number" id="seconds" name="seconds" class="form-control" placeholder="seconds">
                            </div>
                            <div class="col">
                                <input type="number" id="totsec" name="totsec" readonly class="form-control" placeholder="total seconds">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Course Name</td>
                        <td>
                            <select name="cname" class="form-control">
                                <option value="1">Website Design</option>
                                <option value="2">JavaScript</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Topic Name</td>
                        <td>
                            <select name="tname" class="form-control">
                                <option value="1">Introduction</option>
                                <option value="2">Setup Environment</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">InActive</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" class="btn btn-success" value="Submit"></td>
                    </tr>
                </table>
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