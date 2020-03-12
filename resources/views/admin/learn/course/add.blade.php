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
                        <td>Catagory Name and ID</td>
                        <td>
                            <select id="catagory_id" name="catagory_id" class="form-control" >
                                <option value="0">None</option>
                                @foreach ($catagories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                            </select>
                        </td>
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
                        <td colspan="3">
                            <input type="text" id="duration" name="duration" class="form-control" placeholder="Duration By Month">
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
                        <td class="text-left text-md-right">Premium Status</td>
                        <td>
                            <select name="accessible" class="form-control">
                                <option value="free">Free</option>
                                <option value="premium">Premium</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="text" id="actual_price" name="actual_price" class="form-control"  placeholder="Actual Price">
                        </td>
                        <td class="text-left text-md-right">Offer Price</td>
                        <td colspan="3">
                            <input type="text" id="offer_price" name="offer_price" class="form-control"  placeholder="Offer Price">
                        </td>
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