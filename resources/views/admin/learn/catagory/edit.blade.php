@extends('admin.learn.catagory.layout')

@section('quickbtn')
    <div class="col text-right">
        <a href="{{ url('admin/learn/catagory/list') }}" class="btn btn-primary">Catagory List</a>
    </div>
@endsection

@section('contentarea')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
            <form action="{{route('admincatagoryeupdate')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$catagory->id}}">
                
                <table class="table">
                    <tr>
                        <td>Title</td>
                        <td><input type="text" id="title" name="title" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Details</td>
                        <td colspan="3"><input type="text" id="details" name="details" class="form-control"></td>
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

$('#title').keyup(() => {
    var name = $("#title").val();
    name = name.toLowerCase();
    
    var slag = name.replace(/ /g, '_');
    $('#slag').val(slag);
});
</script>
@endsection