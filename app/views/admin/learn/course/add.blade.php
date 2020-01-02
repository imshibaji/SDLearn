@extends('admin.learn.course.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/learn/course/list') }}" class="btn btn-primary">Course List</a>
    </div>
@endsection

@section('contentarea')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
            <form action="{{route('admincoursecreate')}}" method="POST">
                @csrf
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" id="title" name="title" class="form-control"></td>
                        <td>CID</td>
                        <td><input type="text" id="courseid" name="courseid" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Slag</td>
                        <td colspan="3"><input type="text" id="slag" name="slag" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Keywords</td>
                        <td colspan="3"><input type="text" id="meta_keys" name="meta_keys" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Details</td>
                        <td colspan="3"><input type="text" id="meta_desc" name="meta_desc" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td colspan="3"><textarea name="details" id="editor" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td colspan="3" class="row">
                            <div class="col">
                                <input type="number" id="hours" name="duration[hours]" class="form-control" placeholder="hours">
                            </div>
                            <div class="col">
                                <input type="number" id="minutes" name="duration[minutes]" class="form-control" placeholder="minutes">
                            </div>
                            <div class="col">
                                <input type="number" id="seconds" name="duration[seconds]" class="form-control" placeholder="seconds">
                            </div>
                            <div class="col">
                                <input type="number" id="totsec" name="duration[totsec]" readonly class="form-control" placeholder="total seconds">
                            </div>
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
                        <td>Premium Status</td>
                        <td>
                            <select name="premium_status" class="form-control">
                                <option value="free">Free</option>
                                <option value="premium">Premium</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td colspan="3"><input type="text" id="price" name="price" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3"><input type="submit" class="btn btn-success" value="Submit"></td>
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

$('#title').keyup(() => {
    var name = $("#title").val();
    name = name.toLowerCase();
    
    var slag = name.replace(/ /g, '_');
    $('#slag').val(slag);
});
</script>
@endsection