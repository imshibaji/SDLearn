{{-- <div class="container"> --}}
    @if(count($user->reffers)>0)
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
        </tr>
        @foreach ($user->reffers as $ref)
            <tr>
                <td>{{$ref->fname}} {{$ref->lname}}</td>
                <td>{{$ref->email}}</td>
                <td>{{$ref->mobile}}</td>
            </tr>
        @endforeach
    </table>
    @else
        <h4 class="text-center">No Refferes</h4>
    @endif
{{-- </div> --}}